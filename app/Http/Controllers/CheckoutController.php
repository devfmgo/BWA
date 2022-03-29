<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {

        //Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));
        //Proses checkout
        $code = 'STORE-' . mt_rand(0000, 9999);
        $carts = Cart::with('product', 'user')
            ->where('users_id', Auth::user()->id)->get();

        //Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);
        // looping transaksi 
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000, 9999);
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING ',
                'resi' => '',
                'code' => $trx
            ]);
        }
        // Delete cart Data 
        Cart::with('product', 'user')
            ->where('users_id', Auth::user()->id)
            ->delete();
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // create array to send midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enable_payment' => [
                'gopay', 'permata_va'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        // set configuration midtrans 
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // intance midtrans notfication 
        $notification = new Notification();

        // assign ke variabel 
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cek transakti berdsarkan id 
        $transaction = Transaction::find($order_id);

        // Handle notification status
        if ($status == 'capture') {
            if ($type = 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 'PENDING';
                } else {
                    $transaction->status = 'SUCCESS';
                }
            }
        } elseif ($status == 'settelment') {
            $transaction->status = 'SUCCESS';
        } elseif ($status == 'deny') {
            $transaction->status = 'CANCELED';
        } elseif ($status == 'expire') {
            $transaction->status = 'EXPIRED';
        } elseif ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }
        //  Simpan transaksi

        $transaction->save();
    }
}

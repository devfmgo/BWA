<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::with('user');
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                <div  class="btn-group">
                <div  class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aksi</a>
                <div class="dropdown-menu" aria-labelledby="aksi">
                <a href= "' . route('transaction.edit', $item->id) . '" class= "dropdown-item">Edit</a>
                <form action = "' . route('transaction.destroy', $item->id) . '" method = "post" onsubmit=" return confirm(`Yakin akan di hapus ?`);">
                ' . method_field('delete') . csrf_field() . '
                <button type = "submit" class = "dropdown-item text-danger">Hapus</button>
                </form>
                </div>
                </div>
                </div>
                ';
                })->editColumn('created_at', function ($request) {
                    return $request->created_at->format('d F Y'); // human readable format
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::find($id);
        return view('pages.admin.transaction.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        Transaction::find($id)->update($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('transaction.index');
    }
}

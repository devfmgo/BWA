<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductGalleryRequest;


class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery:: with('product');

            return Datatables:: of($query)
            ->addColumn('action',function($item){
                return '
                <div class = "btn-group">
                <div class = "dropdown">
                <a   class = "btn btn-primary dropdown-toggle" href = "#" role = "button" id = "aksi" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                Aksi</a>
                <div  class  = "dropdown-menu" aria-labelledby= "aksi">
                <form action = "'.route('product-gallery.destroy',$item->id).'" method = "post" onsubmit = " return confirm(`Yakin akan di hapus ?`);">
                '.method_field('delete').csrf_field().'
                <button type = "submit" class = "dropdown-item text-danger">Hapus</button>
                </form>
                </div>
                </div>
                </div>
                ';
            })
            ->editColumn('photos', function($item){
                return $item->photos ? '<img src="'.Storage:: url($item->photos).'" style="max-height:80px;">': '';
            })
            ->rawColumns(['action','photos'])
            ->make();
        }
        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.product-gallery.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
                    $data   = $request->all();
              $data['photos'] = $request->file('photos')->store('assets/product','public');
        ProductGallery:: create($data);
        return redirect()->route('product-gallery.index');
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
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGallery:: find($id)->delete();
        return redirect()->route('product-gallery.index');
    }
}

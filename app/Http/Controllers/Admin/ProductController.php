<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = Product::with('user', 'category');
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                <div  class="btn-group">
                <div  class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aksi</a>
                <div class="dropdown-menu" aria-labelledby="aksi">
                <a href= "' . route('product.edit', $item->id) . '" class= "dropdown-item">Edit</a>
                <form action = "' . route('product.destroy', $item->id) . '" method = "post" onsubmit=" return confirm(`Yakin akan di hapus ?`);">
                ' . method_field('delete') . csrf_field() . '
                <button type = "submit" class = "dropdown-item text-danger">Hapus</button>
                </form>
                </div>
                </div>
                </div>
                ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.product.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Product::create($data);
        return redirect()->route('product.index');
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
        $item = Product::find($id);
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.product.edit', compact('item', 'users', 'categories'));
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
        $data['slug'] = Str::slug($request->name);
        Product::find($id)->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index');
    }
}

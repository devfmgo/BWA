@extends('layouts.dashboard')
@section('title')
Store Dashboard Products Detail
@endsection

@section('content')
<!-- Section Content  -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Shirup Marjan </h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('dashboard-products-update',$product->id )}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value={{Auth::user()->id}}>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" id="" class="form-control"
                                                value="{{$product->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number" name="" id="" class="form-control"
                                                value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="categories_id" id="" class="form-control">
                                                @foreach ($categories as $category)
                                                <option value="" disabled>Selected Category</option>
                                                <option value="{{$category->id}}" {{$product->categories_id ===
                                                    $category->id ? "selected":""
                                                    }}></option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" id="editor" cols="30" rows="10"
                                                class="form-control">{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success btn-block text-center">Create
                                            Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($product->galleries as $gallery)
                                <div class="col-md-4 mt-2">
                                    <div class="gallery-container">
                                        <a href="{{route('dashboard-products-gallery-delete',$gallery->id)}}"
                                            class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="">
                                        </a>
                                        <img src="{{Storage::url($gallery->photos ?? '')}}" alt="" class="w-100">

                                    </div>
                                </div>
                                @endforeach


                                <div class="col-12">
                                    <form action="{{route('dashboard-products-gallery-upload')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{$product->id}}">
                                        <input type="file" name="photos" id="file" style="display: none;"
                                            onchange="form.submit()">
                                        <button class="btn btn-secondary btn-block mt-2" type="button"
                                            onclick="thisFileUpload()">Add
                                            Photo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
<script>
    $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  CKEDITOR.replace('editor');
</script>
@endpush
@extends('layouts.dashboard')
@section('title')
Store Dashboard Setting
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Setting </h2>
            <p class="dashboard-subtitle">Make Store that profitable !</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <form action="{{route('dashboard-settings-redirect','dashboard-settings-store')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <form action="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Store Name</label>
                                                <input type="text" name="store_name" id="" class="form-control"
                                                    value="{{$user->store_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="" disabled>Selected Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{$user->categories_id ===
                                                        $category->id ? "selected":""}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Store">Store</label>
                                                <p class="text-muted">Apakah anda ingin membuka toko ?</p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="store_status"
                                                        id="openStoreTrue" value="1" {{$user->store_status == 1 ?
                                                    'checked':''}} />
                                                    <label for="openStoreTrue" class="custom-control-label">
                                                        Buka</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="store_status"
                                                        id="openStoreFalse" value="0" {{$user->store_status == 0 ||
                                                    $user->store_status== NULL ? 'checked':''}}/>
                                                    <label for="openStoreFalse" class="custom-control-label">
                                                        Sementara Tutup</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">Save Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
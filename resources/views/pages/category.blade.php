@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementCategories = 0; @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2 " data-aos="fade-up" data-aos-delay="{{$incrementCategories+=100}}">
                    <a href="{{route('categories-detail',$category->slug)}}" class="component-categories d-block"
                        style="{{$category->slug == $slug ? " border:3px solid #218838;" : "" }} ">
                        <div class=" categories-image">
                        <img src="{{Storage::url($category->photo)}}" alt="" class="w-100">
                </div>
                <p class="categories-text">
                    {{$category->name}}
                </p>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos-delay="100">
                No Categories Found
            </div>
            @endforelse
        </div>
</div>
</section>
<section class="store-new-products mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5 class="text-capitalize">
                    @if (!empty($slug))
                    {{$slug}}
                    @else
                    All Product
                    @endif
                </h5>
                <hr>
            </div>
        </div>
        <div class="row">
            @php $incrementProduct = 0; @endphp
            @forelse ($products as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$incrementProduct+=100}}">
                <a href="{{route('detail',$product->slug)}}" class="component-products d-block">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                            @if ($product->galleries)
                            background-image:url('{{Storage::url($product->galleries->first()->photos)}}');
                            @else
                            background-color:#eee;
                            @endif ">
                        </div>
                    </div>

                    <div class="products-text">
                        {{$product->name}}
                    </div>
                    <div class="products-price">
                        Rp {{ number_format($product->price,0, ',', '.') }}
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos-delay="100">Product NotFound</div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                {{$products->links()}}
            </div>
        </div>

    </div>
</section>
</div>
@endsection
@extends('frontend.layout.layout')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('/') }}{{ $product->image }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $product->productName }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="mb-0">{{ $categoryname }}</p>

                    <p><strong class="text-primary h4">${{ number_format($product->price, 2) }} </strong></p>
                    <div class="mb-1 d-flex">
                        <label for="option-sm" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-sm" name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Small</span>
                        </label>
                        <label for="option-md" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-md" name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Medium</span>
                        </label>
                        <label for="option-lg" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-lg" name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Large</span>
                        </label>
                        <label for="option-xl" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra
                                Large</span>
                        </label>
                    </div>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>
                    <p><a href="{{ route('cart') }}" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

                </div>
            </div>
        </div>
    </div>

    @if (!@empty($products) && $products->count()>0)

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($products as $item)
                            <div class="item">
                                <div class="block-4 text-center">

                                    <figure class="block-4-image">
                                        <img src="{{ asset('/') }}{{ $item->image }}" alt="Image placeholder"
                                            class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{ route('productdetail', $item->id) }}">{{ $item->productName }}</a>
                                        </h3>
                                        <p class="mb-0">{{ $item->description }}</p>
                                        <p class="mb-0">{{ $categoryname }}</p>
                                        <p class="text-primary font-weight-bold">{{ $item->price }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

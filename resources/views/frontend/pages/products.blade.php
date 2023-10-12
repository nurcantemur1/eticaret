@extends('frontend.layout.layout')
@section('content')
    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Shop All</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">

                                        @foreach ($categories->where('sub_category',null) as $item)
                                                <a class="dropdown-item"
                                                    href="{{ route($item->slug) }}">{{ $item->name }}</a>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#" data-list="sortedList">Name, A to Z</a>
                                        <a class="dropdown-item" href="#" data-list="reverseList">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-list="lowtoHigh">Price, low to high</a>
                                        <a class="dropdown-item" href="#" data-list="hightoLow">Price, high to low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @if ($products->count() > 0)
                            @foreach ($products as $item)
                                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-4-image">
                                            <a href="{{ route('productdetail', $item->id) }}">
                                                <img src="{{ asset('/') }}{{ $item->image }}" alt="Image placeholder"
                                                    class="img-fluid"></a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a
                                                    href="{{ route('productdetail', $item->id) }}">{{ $item->productName }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $item->description }}</p>
                                            <p class="mb-0">{{ $item->size }}</p>
                                            <p class="mb-0">{{ $item->color }}</p>
                                            <p class="text-primary font-weight-bold">{{ $item->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            {{ $products->withQueryString()->links('pagination::custom') }}

                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categories->where('sub_category',null) as $item)
                            <li class="mb-1"><a href={{ route($item->slug) }} class="d-flex"><span>{{ $item->name }}
                                Collection</span>

                                @if ($item->sub_category == $item->id)
                                    <span class="text-black ml-auto"> {{ $item->sub_category->count() }}</span>
                                @endif

                                </a></li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        {{-- <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                disabled="" />
                        </div> --}}
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                disabled="" />
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                            @foreach ($sizeall as $item)
                                <label for="s_sm" class="d-flex">
                                    <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span
                                        class="text-black">{{ $item }}
                                        (2,319)
                                    </span>
                                </label>
                            @endforeach

                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                            @foreach ($colorall as $item)
                                <a href="#" class="d-flex color-item align-items-center">
                                    <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span
                                        class="text-black">{{ $item }}(2,429)</span>
                                </a>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($categories->where('sub_category',null) as $item)
                                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                        <a class="block-2-item" href={{ route($item->slug) }}>
                                            <figure class="image">
                                                <img src="{{ asset('/') }}{{ $item->image }}" alt=""
                                                    class="img-fluid">
                                            </figure>
                                            <div class="text">
                                                <h4><span class="text-uppercase">{{ $item->name }} Collection</span>
                                                </h4>


                                            </div>
                                        </a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('customjs')
    <script>
        var minprice = "{{ $minprice }}";
        var maxprice = "{{ $maxprice }}";
    </script>
@endsection

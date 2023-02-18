@extends('frontend.master')
@section('title','Landing Page')

@section('content')
<!-- Banner -->
<section id="Banner">
    <div class="container">
        <div class="bg-banner">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <h1>Modern <br>
                        Furnitures Brands <br>
                        <span>Up To 50% off</span>
                    </h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="btn btn-warning">Lihat Details</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="./assets/Banner.png" alt="Banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Banner -->

<!-- Awal Product Katagori -->
<section id="Product-Category">
    <div class="bg-category mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Product <span>Category</span></h1>
                </div>
            </div>
            <div class="row mt-4 text-center">
                @foreach ($category as $item)
                <div class="col-lg-2">
                    <img src="{{asset('img/' .$item-> icon)}}">
                    <h5>{{$item -> category_name}}</h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Akhir Product Category -->

<!-- Awal Product Katagori -->
<section id="Category-Promo">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Product <span>Promo</span></h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <img src="./assets/Category-Promo.png" alt="">
            </div>
            <div class="col-lg-4">
                <img src="./assets/Category-Promo.png" alt="">
            </div>
            <div class="col-lg-4">
                <img src="./assets/Category-Promo.png" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Akhir Product Category -->

<!-- Product Terlaris -->
<section id="Product-Terlaris">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Product <span>Terlaris</span></h1>
                <div class="row mt-4 ">
                    @foreach($product as $item)
                    <div class="col-lg-3">
                        <div class="bg-isi">
                            <div class="row text-center">
                                <div class="col">
                                    <img src="{{asset('img/'. $item->image)}}">
                                    <h3>{{$item -> product_name}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-lg-6 text-center">
                                        <h6>IDR <span>{{$item-> product_price}}</span></h6>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <a href="{{url('/home/'.$item -> id)}}>" <div class="btn btn-warning">Lihat
                                            Details
                                    </div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Akhir Product Terlaris -->

<!-- Awal Flash Deal -->
<section id="Flash-Deals">
    <div class="bg-FlashDeals mt-5">
        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <h1>Flash <span>Deals</span></h1>
                </div>
            </div>
            <div class="row text">
                <div class="col-lg-4 ">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo1 7.png" alt="Promo1">
                                <h3>Sepatu Tsubasa Ozora</h3>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <div class="btn btn-warning">Lihat
                                        Details</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo2 3.png" alt="Promo1">
                                <h3>Baju Sultan Andara</h3>
                            </div>
                        </div>
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>1.950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <div class="btn btn-warning">Lihat
                                        Details</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo3 2.png" alt="Promo1">
                            </div>
                            <h3>Camera Canon Super Jernih</h3>
                        </div>
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>1.950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <div class="btn btn-warning">Lihat
                                        Details</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Flash Deal -->
@endsection
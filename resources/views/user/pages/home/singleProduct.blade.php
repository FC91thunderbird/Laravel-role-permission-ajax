@extends('user')

@section('content')
<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Single Product Type</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Single Product</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border">
                                    <img class="zoompro" src="{{ asset('product/'. $product->image) }}" data-zoom-image="{{ asset('product/'. $product->image) }}" alt="Hiraola's Product Image" />
                                </div>
                                <div id="gallery" class="sp-img_slider">
                                    <a class="active" data-image="{{ asset('product/'. $product->image) }}" data-zoom-image="{{ asset('product/'. $product->image) }}">
                                        <img src="{{ asset('product/'. $product->image) }}" alt="Hiraola's Product Image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">{{ $product->title }}</a></h5>
                                </div>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                    </ul>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <strong>Buy Price: Rs: <del> {{ $product->buy_price }} </del></strong>
                                        <li>Sell Price: <a href="javascript:void(0)"><span>Rs. {{ $product->sell_price }}</span></a></li>
                                        <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                        <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                        <li>Reward Points: <a href="javascript:void(0)">600</a></li>
                                        <li>Availability: <a href="javascript:void(0)">{{ $product->sku }}</a></li>
                                        {{ $product->description }}
                                    </ul>
                                </div>
                                <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><a class="qty-cart_btn" href="cart.html">Add To Cart</a></li>
                                        <li><a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a class="qty-compare_btn" href="compare.html" data-bs-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    </ul>
                                </div>
                                <div class="hiraola-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)">Ring</a>,
                                    <a href="javascript:void(0)">Necklaces</a>,
                                    <a href="javascript:void(0)">Braid</a>
                                </div>
                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
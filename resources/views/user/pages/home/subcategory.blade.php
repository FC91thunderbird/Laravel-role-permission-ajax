@extends('user')

@section('content')
<div class="hiraola-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h5>Category: {{$category->name}} </h5>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="shop-product-wrap grid gridview-4 row">
                    @foreach($subcategories as $sub)
                    <div class="col-lg-4">
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="{{ url('products/'.$sub->slug ) }}">
                                        <img class="primary-img" src="{{ asset('subcategory/'. $sub->image) }}" alt="{{ $sub->name }}">
                                    </a>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="{{ url('products/'.$sub->slug ) }}">{{ $sub->name }}</a></h6>
                                    </div>
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

<div class="hiraola-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4> Latest Product </h4>
                </div>
                <div class="shop-product-wrap grid gridview-4 row">
                @foreach($products as $product)
                    <div class="col-lg-3">
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="{{ url('single_product/'. $product->slug) }}">
                                        <img class="primary-img" src="{{ asset('product/'. $product->image) }}" alt="Hiraola's Product Image">
                                    </a>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a>
                                            </li>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h5><a class="product-name" href="{{ url('single_product/'. $product->slug) }}">{{ ucfirst($product->title) }}</a></h5>
                                        <h6>Category: {{ ucfirst($product->category->name) }}</h6>
                                        <h6>Sub-Category: {{ ucfirst($product->subcategory->name) }}</h6>
                                        <div class="price-box">
                                            <span class="new-price">Rs: {{ $product->sell_price }}</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
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
                                    </div>
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
@endsection
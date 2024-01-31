<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Category List</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    @foreach($categories as $category)
                    <div class="slide-item">
                        <div class="single_product">
                            <div class="product-img">
                                <a href="{{ url('subcategory/'. $category->slug ) }}">
                                    <img class="primary-img" src="{{ asset('category/'. $category->image) }}" alt="{{$category->name}}">
                                </a>
                                <span class="sticker">New</span>
                                <h4>{{ $category->name }}</h4>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
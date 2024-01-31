<div class="hiraola-slider_area-2 hiraola-slider_area-3 color-white">
    <div class="main-slider">
    @foreach($banners as $banner)
        <div class="single-slide animation-style-01 bg-6" style="background-image: url('{{ asset('banner/'.$banner->image) }}')">

            <div class="container">
                <div class="slider-content @if($banner->id % 2 !=0) ? 'slider-content-1' :'slider-content-2' @endif">
                    <h2>{{ $banner->name }}</h2>
                    <div class="hiraola-btn-ps_center slide-btn">
                        <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                    </div>
                </div>
                <div class="slider-progress"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
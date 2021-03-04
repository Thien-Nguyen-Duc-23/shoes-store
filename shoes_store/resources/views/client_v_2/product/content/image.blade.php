<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
    <div class="relative product-image-block ">
      <div class="large-image">
        @php
          $imageProductDetail = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$productDetailBySlug->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$productDetailBySlug->image) : asset('admin_lte/dist/img/default-50x50.gif');
        @endphp
        <a href="{{ $imageProductDetail }}" data-rel="prettyPhoto[product-gallery]">
          <img id="zoom_01" src="{{ $imageProductDetail }}" alt="{{ $productDetailBySlug->name ?? null }}">
        </a>
        <div class="hidden">
            @if (!$productDetailBySlug->shoesImages->isEmpty())
                @foreach ($productDetailBySlug->shoesImages as $productImgae)
                    @php
                      $productImgae = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) : asset('admin_lte/dist/img/default-50x50.gif');
                    @endphp
                    <div class="item">
                        <a href="{{ $productImgae }}" data-image="{{ $productImgae }}" data-zoom-image="{{ $productImgae }}" data-rel="prettyPhoto[product-gallery]">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
      <div id="gallery_01"  class="swiper-container more-views" data-margin="10" data-items="4" data-direction="vertical" >
        <div class="swiper-wrapper">
            @if (!$productDetailBySlug->shoesImages->isEmpty())
                @foreach ($productDetailBySlug->shoesImages as $productImgae)
                    @php
                      $productImgae = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) : asset('admin_lte/dist/img/default-50x50.gif');
                    @endphp
                    <div class="swiper-slide">
                        <a href="{{ $productImgae }}" class="thumb-link" title="" data-rel="{{ $productImgae }}">
                        <img src="{{ $productImgae }}" alt="{{ $productDetailBySlug->name ?? null }}">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-button-next hidden-lg">
          <i class="fa fa-angle-down"></i>
        </div>
        <div class="swiper-button-prev hidden-lg">
          <i class="fa fa-angle-up"></i>
        </div>
      </div>
      <div class="swiper-button-next fixlg hidden-xs hidden-sm hidden-md">
        <i class="fa fa-angle-down"></i>
      </div>
      <div class="swiper-button-prev fixlg hidden-xs hidden-sm hidden-md">
        <i class="fa fa-angle-up"></i>
      </div>
    </div>
</div>

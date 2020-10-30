@extends('client.layout.app')

@section('content-client')
  <div class="site-content-wrapper" style="margin-top: 0px;">
    <div class="archive-header site-secondary-font">
      <div class="row small-collapse">
        <div class="small-12 columns">
          <div class="archive-header-inner">
            <div class="archive-title-wrapper">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="delimiter">/
                    </span> Liên hệ
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="margin-top-0">
        <div class="container">
          <div class="row">
            <div class="section_maps col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="title_head margin-bottom-20 page-header-cart">
                <h1 class="title-head-contact">
                  Liên hệ
                </h1>
              </div>
              <div class="box-maps">
                <div class="iFrameMap">
                  <div class="google-map">
                    <div id="contact_map" class="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.10948741641!2d106.77228711406941!3d10.87927649225178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d88700604cad:0x165d7fa455b0a8!2sHomies SG!5e0!3m2!1svi!2s!4v1551690947084" width="600" height="450" frameborder="0" style="border:0" allowfullscreen="">
                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
      
    <div class="hover_overlay_content">
    </div>
  </div>    
@endsection

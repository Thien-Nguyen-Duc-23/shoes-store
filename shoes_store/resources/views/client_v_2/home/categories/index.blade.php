@if (!$categories->isEmpty()) 
  <section class="awe-section-2">	
    <div class="adv_bottom">
      <div class="container">
        <div class="row">
          @foreach ($categories as $category)
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="adv_bottom_inner">
                <figure>
                  <a href="ao.html" title="Banner 1">
                    @php
                      $imageCategory = \Storage::disk('public')->exists(\App\Models\Categories::DIRECTORY.'/'.$category->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Categories::DIRECTORY.'/'.$category->image) : asset('admin_lte/dist/img/default-50x50.gif');
                    @endphp
                    <img class="img-responsive" src="{{ $imageCategory }}" alt="Banner 1">
                  </a>
                </figure>					
              </div>	
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endif

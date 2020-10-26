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
                    </span> Tin Tức
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="blog_highlighted_posts animated-blog-articles js_animated">
      <div class="row">
        <div class="blog_highlighted_posts_container">
          <div class="row">
            @if (!$threeNews->isEmpty())
              <div class="small-12 medium-8 large-8 columns">
                <div class="blog_highlighted_posts_left">
                  @foreach ($threeNews as $index => $news)
                    <article id="post-76" class="post-76 post type-post status-publish format-standard has-post-thumbnail hentry category-fashion category-style-guide visible animation_ready animated">
                      <div class="entry-thumbnail">
                        <a href="{{ route('news_detail', $news->slug) }}">
                          @php
                            $itemImage = \Storage::disk('public')->exists(\App\Models\News::DIRECTORY.'/'.$news->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$news->image) : asset('admin_lte/dist/img/default-50x50.gif');
                          @endphp
                          <img style="width:1200px; height:675px" src="{{ $itemImage }}" class="attachment-large size-large wp-post-image" alt="" loading="lazy" sizes="(max-width: 1200px) 100vw, 1200px">			
                        </a>
                      </div>
                      <div class="entry-content-wrap">
                        <header class="entry-header">
                          <div class="entry-meta">
                            <a href="{{ route('news_detail', $news->slug) }}" rel="bookmark">
                              <time class="entry-date published" datetime="2018-02-14T11:56:48+00:00">{{ \Carbon\Carbon::parse($news->created_at)->toFormattedDateString() ?? '' }}
                              </time>
                            </a>				
                          </div>
                          <h3 class="entry-title">
                            <a href="{{ route('news_detail', $news->slug) }}">{{ $news->title ?? '' }}
                            </a>
                          </h3>
                        </header>
                        <div class="entry-content">
                          <div>
                            <p>{{ $news->sort_description ?? '' }}</p>
                          </div>
                        </div>
                        <a class="entry-content__readmore site-secondary-font" href="{{ route('news_detail', $news->slug) }}">Read More
                        </a>
                      </div>
                    </article>
                    @break
                  @endforeach
                </div>
              </div>
              <div class="small-12 medium-4 large-4 columns">
                <div class="blog_highlighted_posts_right">
                  @foreach ($threeNews as $index => $news)
                    @if ($index != 0)
                      <article id="post-74" class="post-74 post type-post status-publish format-standard has-post-thumbnail hentry category-culture category-fashion category-style-guide visible animation_ready animated">
                        <div class="entry-thumbnail">
                          <a href="{{ route('news_detail', $news->slug) }}">
                            @php
                              $itemImage = \Storage::disk('public')->exists(\App\Models\News::DIRECTORY.'/'.$news->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$news->image) : asset('admin_lte/dist/img/default-50x50.gif');
                            @endphp
                            <img style="width:1200px; height:675px" src="{{ $itemImage }}" class="attachment-large size-large wp-post-image" alt="" loading="lazy" sizes="(max-width: 1200px) 100vw, 1200px">			
                          </a>
                        </div>
                        <div class="entry-content-wrap">
                          <header class="entry-header">
                            <div class="entry-meta">
                              <a href="{{ route('news_detail', $news->slug) }}" rel="bookmark">
                                <time class="entry-date published" datetime="2018-02-14T11:54:58+00:00">{{ \Carbon\Carbon::parse($news->created_at)->toFormattedDateString() ?? ''}}
                                </time>
                              </a>				
                            </div>
                            <h3 class="entry-title">
                              <a href="{{ route('news_detail', $news->slug) }}">{{ $news->title ?? '' }}</a>
                            </h3>
                          </header>
                          <div class="entry-content">
                            <div>
                              <p>{{ $news->sort_description ?? '' }}</p>
                            </div>
                          </div>
                          <a class="entry-content__readmore site-secondary-font" href="{{ route('news_detail', $news->slug) }}">Read More
                          </a>
                        </div>
                      </article>
                    @endif
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @if (!$getNews->isEmpty())
      <div class="row small-collapse">
        <div class="small-12 columns">
          <div class="site-content">
            <div class="blog-listing">
              <div class="row">
                <div class="small-12 large-9 columns site-main-content-wrapper">
                  <div class="site-main-content">
                    <div class="blog-articles animated-blog-articles js_animated">
                      @foreach ($getNews as $getNew)
                        <article id="post-70" class="post-70 post type-post status-publish format-standard has-post-thumbnail hentry category-fashion category-style-guide visible animation_ready animated">
                          <div class="entry-thumbnail">
                            <a href="{{ route('news_detail', $getNew->slug) }}">
                              @php
                                $itemImage = \Storage::disk('public')->exists(\App\Models\News::DIRECTORY.'/'.$news->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$news->image) : asset('admin_lte/dist/img/default-50x50.gif');
                              @endphp
                              <img width="1200" height="675" src="{{ $itemImage }}" class="attachment-large size-large wp-post-image" alt="" loading="lazy" sizes="(max-width: 1200px) 100vw, 1200px">			
                            </a>
                          </div>
                          <div class="entry-content-wrap">
                            <header class="entry-header">
                              <div class="entry-meta">
                                <a href="{{ route('news_detail', $getNew->slug) }}" rel="bookmark">
                                  <time class="entry-date published" datetime="2018-02-14T11:47:23+00:00">{{ \Carbon\Carbon::parse($news->created_at)->toFormattedDateString() ?? ''}}
                                  </time>
                                </a>				
                              </div>
                              <h2 class="entry-title">
                                <a href="{{ route('news_detail', $getNew->slug) }}">{{ $news->title ?? '' }}</a>
                              </h2>
                            </header>
                            <div class="entry-content">
                              <div>
                                <p>{{ $news->sort_description ?? '' }}</p>
                              </div>
                            </div>
                            <a class="entry-content__readmore site-secondary-font" href="{{ route('news_detail', $getNew->slug) }}">Read More
                            </a>
                          </div>
                        </article>
                      @endforeach
                    </div>
                    {{-- <div class="pagination-container">
                      <div class="posts_ajax_button disabled" data-processing="0">
                      </div>
                    </div> --}}
                    <nav class="navigation posts-navigation" role="navigation" aria-label="Posts">
                      <h2 class="screen-reader-text">Posts navigation
                      </h2>
                      <div class="nav-links">
                        <div class="nav-next">
                          <a href="#" class="nav-links__item nav-links__item--next site-secondary-font">Newer posts
                          </a>
                        </div>
                      </div>
                    </nav> 
                  </div>
                </div>	
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="hover_overlay_content">
    </div>
  </div>    
@endsection

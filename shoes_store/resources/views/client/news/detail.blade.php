@extends('client.layout.app')

@section('content-client')
    @if(!empty($newsDetail))
        <div class="site-content-wrapper" style="margin-top: 0px;">
            <div class="row small-collapse">
                <div class="small-12 columns">
                    <div class="site-content">
                        <div class="row">
                        <div class="large-8 columns">
                            <div class="single_post_header">
                            <div class="entry-categories site-secondary-font">
                                <div class="archive-title-wrapper">
                                    <nav class="woocommerce-breadcrumb">
                                        <a href="{{ route('home') }}">Trang chủ</a>
                                        <span class="delimiter">/
                                        <a href="{{ route('news') }}">Tin Tức</a>
                                        <span class="delimiter">/ {{ $newsDetail->title ?? '' }}
                                        </span> 
                                    </nav>
                                </div>				
                            </div>
                            <h1 class="entry-title">{{ $newsDetail->title ?? '' }}
                            </h1>					
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="small-12 large-12 columns site-main-content-wrapper">
                            <div class="site-main-content">
                            <article id="post-76" class="post-76 post type-post status-publish format-standard has-post-thumbnail hentry category-fashion category-style-guide">
                                <header class="entry-header">
                                    @php
                                        $imageDetail = \Storage::disk('public')->exists(\App\Models\News::DIRECTORY.'/'.$newsDetail->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$newsDetail->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                    @endphp
                                    <img width="1200" height="675" src="{{ $imageDetail }}" class="attachment-large size-large wp-post-image" alt="" loading="lazy" sizes="(max-width: 1200px) 100vw, 1200px">
                                </header>
                                <!-- .entry-header -->
                                <div class="row">
                                    <div class="small-12 small-centered medium-12 large-12 columns">
                                        <div class="entry-content">
                                        <div class="entry-meta site-secondary-font">
                                            <div class="entry-meta__item entry-meta-author">
                                                <a class="author-all-posts" href="#">GetBowtied</a>
                                                <span>on </span>
                                                <a href="https://thehanger.wp-theme.design/seven-ways-to-make-a-boring-wardrobe-more-stylish-than-ever/" rel="bookmark">
                                                    <time class="entry-date published">{{ \Carbon\Carbon::parse($newsDetail->created_at)->toFormattedDateString() ?? ''}}</time>
                                                </a>
                                            </div>

                                        </div>
                                        <p>{{ $newsDetail->sort_description ?? '' }}</p>
                                        <p>
                                            <span id="more-76"></span>
                                        </p>
                                        {!! $newsDetail->long_description ?? '' !!}
                                        <div class="entry-tags">
                                            <div class="entry-meta__item entry-meta__item--tags site-secondary-font"></div>
                                        </div>
                                    </div>
                                        <!-- .entry-content -->
                                    </div>
                                </div>
                            </article>
                            <!-- #post-## -->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (!$relateNews->isEmpty())
                <div class="single_related_post_container">
                    <div class="row">
                        <div class="single_related_posts">
                            <h2 class="entry-title">Bài viết liên quan
                            </h2>
                            <div class="row">
                                    @foreach ($relateNews as $relateNew)
                                        <div class="small-12 medium-6 large-3  columns related-post with-image">
                                            <a class="related_post_image" href="{{ route('news_detail', $relateNew->slug) }}"> 
                                                @php
                                                    $imageRelateNew = \Storage::disk('public')->exists(\App\Models\News::DIRECTORY.'/'.$relateNew->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$relateNew->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                                @endphp
                                                <img width="300" height="169" src="{{ $imageRelateNew }}" class="attachment-medium size-medium wp-post-image" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px">
                                                <img width="150" height="150" src="{{ $imageRelateNew }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy"  sizes="(max-width: 150px) 100vw, 150px">
                                            </a>
                                            <div class="related_post_content">
                                                <span class="date">{{ \Carbon\Carbon::parse($relateNew->created_at)->toFormattedDateString() ?? ''}}</span>
                                                <h2 class="related_post_title">
                                                    <a href="{{ route('news_detail', $relateNew->slug) }}">{{ $relateNew->title ?? '' }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="hover_overlay_content"></div>
        </div>
    @endif
@endsection

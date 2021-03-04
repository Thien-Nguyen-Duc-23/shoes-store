@extends('client_v_2.layout.app')

@section('content-client')
  <!-- include banner top -->
  @includeIf('client_v_2.home.banner.index_top')
  <!-- end include banner top -->

  <!-- include categories -->
  @includeIf('client_v_2.home.categories.index')
  <!-- end include categories -->

  <!-- include service -->
  @includeIf('client_v_2.home.service.index')
  <!-- end include service -->

  <!-- include new product-->
  @includeIf('client_v_2.home.product.new_product')
  <!-- end include new product -->

  <!-- include sale product-->
  @includeIf('client_v_2.home.product.sale_product')
  <!-- end include sale product -->

  <!-- include banner news -->
  @includeIf('client_v_2.home.banner.index_news')
  <!-- end include banner news -->

  <!-- include social -->
  @includeIf('client_v_2.home.social.index')
  <!-- end include social -->
@endsection

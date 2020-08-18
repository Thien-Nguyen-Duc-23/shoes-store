@extends('admin.layout.admin')

@section('title', 'Order Edit')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           <i class="fa fa-file-text-o" aria-hidden="true"></i> Edit Order #{{ $order->id }}
           <small></small>
        </h1>
        <div class="more_info"></div>
    </section>
    <section class="content">
        @include('flash::message')
        <div class="row box-search">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <!-- form start -->
                    @includeIf('admin.order.form')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection



@extends('admin.layout.admin')

@section('title', 'Customer Detail')
@section('content')
<div class="content-wrapper">
    <section class="content">
        @include('flash::message')
        <div class="row box-search">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <!-- form start -->
                    @includeIf('admin.customer.form')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

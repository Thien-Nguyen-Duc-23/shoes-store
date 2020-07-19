@extends('admin.layout.admin')

@section('title', 'Color Edit')
@section('content')
<div class="content-wrapper">
    <section class="content">
        {{-- @include('flash::message') --}}
        <div class="row box-search">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <!-- form start -->
                    @includeIf('admin.color.form')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

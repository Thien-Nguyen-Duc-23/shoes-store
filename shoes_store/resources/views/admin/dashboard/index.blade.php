@extends('admin.layout.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

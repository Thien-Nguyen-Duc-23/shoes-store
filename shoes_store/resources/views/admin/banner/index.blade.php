@extends('admin.layout.admin')
@section('title', 'Banners List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("banner.index"), 'class' => 'form-horizontal']) !!}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            {!! Form::label('title', 'ID:', ['class'=> 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('id', request('id'), ['class' => 'form-control name']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            {!! Form::label('title', 'Name', ['class'=> 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('name', request('name'), ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        <!-- /.box-footer -->
                        {!! Form::close () !!}
                    </div>
                </div>
            </div>
            <div class="row box-result">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Listing</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-hover table-bordered" per-page="" current-page="">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">URL</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Updated_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td class="text-center">{{ $banner->id }}</td>
                                            <td class="text-center">{{ $banner->name }}</td>
                                            <td class="text-center">
                                                <div class="product-img">
                                                    @php
                                                        $bannerImage = \Storage::disk('public')->exists(\App\Models\Banners::DIRECTORY.'/'.$banner->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Banners::DIRECTORY.'/'.$banner->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                                    @endphp
                                                    <img style="width: 50px; height: 50px;" src="{{ $bannerImage }}" alt="Product Image">
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $banner->url }}</td>
                                            <td class="text-center">
                                                @if ($banner->status === config('constants.active'))
                                                    <span class="label label-success">{{ config('constants.status')[config('constants.active')] }}<span>
                                                @else
                                                    <span class="label label-danger">{{ config('constants.status')[config('constants.disable')] }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($banner->created_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($banner->updated_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a style="display: inline-block;" href="{{ route('banner.show', $banner->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    {!! Form::open(['url' => route('banner.destroy', $banner->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $banner->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix float-right">
                            <div style="float: right;">
                                {!! $banners->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

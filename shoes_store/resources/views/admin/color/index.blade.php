@extends('admin.layout.admin')
@section('title', 'Color List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Colors</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("color.index"), 'class' => 'form-horizontal']) !!}
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
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Updated_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($colors as $color)
                                        <tr>
                                            <td class="text-center">{{ $color->id }}</td>
                                            <td class="text-center">{{ $color->name }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($color->created_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($color->updated_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('color.edit', $color->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    {!! Form::open(['url' => route('color.destroy', $color->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $color->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
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
                                {!! $colors->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('admin.layout.admin')
@section('title', 'Categories List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("category.index"), 'class' => 'form-horizontal']) !!}
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
                                        <th class="text-center">Parent</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Updated_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $category->id }}</td>
                                            <td class="text-center">{{ $category->name }}</td>
                                            <td class="text-center">
                                                @if ($category->parent_id == 0 || $category == null)
                                                    <span class="label label-success">Parent</span>
                                                @else
                                                    <span class="label label-primary">Children</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="product-img">
                                                    @php
                                                        $categoryImage = \Storage::disk('public')->exists(\App\Models\Categories::DIRECTORY.'/'.$category->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Categories::DIRECTORY.'/'.$category->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                                    @endphp
                                                    <img style="width: 50px; height: 50px;" src="{{ $categoryImage }}" alt="Product Image">
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $category->description }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($category->created_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($category->updated_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a style="display: inline-block;" href="{{ route('category.show', $category->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    {!! Form::open(['url' => route('category.destroy', $category->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $category->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
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
                                {!! $categories->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

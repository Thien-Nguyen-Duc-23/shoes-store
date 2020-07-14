@extends('admin.layout.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            {{-- @include('flash::message') --}}
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Sizes</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => '', 'class' => 'form-horizontal']) !!}
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($admins as $val) --}}
                                    <tr>
                                        <td class="">1</td>
                                        <td class="text-sllipsis ">XL</td>
                                        <td class="text-center">ddd</td>
                                        <td class="text-center">dddd</td>
                                        <td class="text-center pull-right-container">
                                            <a href="{{ route('size.edit', 1) }}" class="btn btn-info btn-sm">Edit</a>
                                            {!! Form::open(['url' => route('size.destroy', 1),'method' => 'DELETE', 'class' => 'form-delete']) !!}
                                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="1" data-table="notifications">Delete</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix float-right">
                            {{-- {!! $admins->appends(request()->query())->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

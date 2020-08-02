@extends('admin.layout.admin')
@section('title', 'Shoes List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Shoes</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("shoes.index"), 'class' => 'form-horizontal']) !!}
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
                                        <th class="text-center">Image</th>
                                        <th class="text-center">SKU</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Price Cost</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Sale</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shoes as $sh)
                                        <tr>
                                            <td class="text-center">{{ $sh->id }}</td>
                                            <td class="text-center">
                                                <div class="product-img">
                                                    @php
                                                        $shImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$sh->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$sh->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                                    @endphp
                                                    <img style="width: 50px; height: 50px;" src="{{ $shImage }}" alt="Product Image">
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $sh->sku }}</td>
                                            <td class="text-center">{{ $sh->name }}</td>
                                            <td class="text-center">{{ $sh->price_cost }}</td>
                                            <td class="text-center">{{ $sh->price }}</td>
                                            <td class="text-center">{{ $sh->is_sale }}</td>
                                            <td class="text-center">{{ $sh->status }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('shoes.edit', $sh->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a style="display: inline-block;" href="{{ route('shoes.show', $sh->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    {!! Form::open(['url' => route('shoes.destroy', $sh->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $sh->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
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
                                {!! $shoes->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

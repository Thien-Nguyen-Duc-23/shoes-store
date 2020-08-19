@extends('admin.layout.admin')
@section('title', 'Customers List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Customers</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("customer.index"), 'class' => 'form-horizontal']) !!}
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('status', config('constants.status'), request('status'), ['class' => 'form-control select2 input-radius plan_id', 'placeholder' => 'Please Select']) !!}
                                                @if ($errors->has('status'))
                                                    <span class="text-danger invalid-feedback">{{ $errors->first('status') }}</span>
                                                @endif
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
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td class="text-center">{{ $customer->id }}</td>
                                            <td class="text-center">{{ $customer->name }}</td>
                                            <td class="text-center">{{ $customer->email }}</td>
                                            <td class="text-center">
                                                <div class="product-img">
                                                    @php
                                                        $customerImage = \Storage::disk('public')->exists(\App\Models\User::DIRECTORY.'/'.$customer->image_path) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\User::DIRECTORY.'/'.$customer->image_path) : asset('admin_lte/dist/img/default-50x50.gif');
                                                    @endphp
                                                    <img style="width: 50px; height: 50px;" src="{{ $customerImage }}" alt="Product Image">
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $customer->phone }}</td>
                                            <td class="text-center">{{ $customer->address }}</td>
                                            <td class="text-center">
                                                @if ($customer->status == \App\Models\User::ACTIVE)
                                                    <span class="label label-success">{{ config('constants.status')[\App\Models\User::ACTIVE] }}</span>
                                                @else
                                                    <span class="label label-danger">{{ config('constants.status')[\App\Models\User::DEACTIVATE] }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($customer->created_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('customer.edit', $customer->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a style="display: inline-block;" href="{{ route('customer.show', $customer->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    {!! Form::open(['url' => route('customer.destroy', $customer->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $customer->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
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
                                {!! $customers->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $(".select2").select2({
                placeholder: " Please select ",
                closeOnSelect : true,
                allowClear: true,
            });
        });
    </script>
@endpush

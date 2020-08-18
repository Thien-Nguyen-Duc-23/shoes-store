@extends('admin.layout.admin')
@section('title', 'Order List')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('flash::message')
            <div class="row box-search">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter List Of Orders</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method' => 'GET', 'url' => route("order.index"), 'class' => 'form-horizontal']) !!}
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
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Dicount</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Shipping Status</th>
                                        <th class="text-center">Order Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $order->id }}</td>
                                            <td class="text-center">
                                                @if(isset($order->users))
                                                    <a href="{{ route('customer.show', $order->users->id) }}">{{ $order->users->email ?? null }}</a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $order->orderDetails->sum('quantity') }}</td>
                                            <td class="text-center">{{ $order->price_cost }}</td>
                                            <td class="text-center">{{ $order->amount }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($order->created_at)->toDateTimeString() ?? '' }}</td>
                                            <td class="text-center">
                                                @switch($order->shipping_status)
                                                    @case(\App\Models\Orders::NotSent)
                                                        <span class="label label-warning">{{ config('constants.shipping_status')[\App\Models\Orders::NotSent] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Sending)
                                                        <span class="label label-primary">{{ config('constants.shipping_status')[\App\Models\Orders::Sending] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::ShippingDone)
                                                        <span class="label label-success">{{ config('constants.shipping_status')[\App\Models\Orders::ShippingDone] }}</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                @switch($order->order_status)
                                                    @case(\App\Models\Orders::NewOrder)
                                                        <span class="label label-success">{{ config('constants.order_status')[\App\Models\Orders::NewOrder] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Processing)
                                                        <span class="label label-primary">{{ config('constants.order_status')[\App\Models\Orders::Processing] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Hold)
                                                        <span class="label label-default">{{ config('constants.order_status')[\App\Models\Orders::Hold] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Canceled)
                                                        <span class="label label-warning">{{ config('constants.order_status')[\App\Models\Orders::Canceled] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Done)
                                                        <span class="label label-info">{{ config('constants.order_status')[\App\Models\Orders::Done] }}</span>
                                                        @break
                                                    @case(\App\Models\Orders::Failed)
                                                        <span class="label label-danger">{{ config('constants.order_status')[\App\Models\Orders::Failed] }}</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                <div>
                                                    <a style="display: inline-block;" href="{{ route('order.edit', $order->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a style="display: inline-block;" href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    {!! Form::open(['url' => route('order.destroy', $order->id),'method' => 'DELETE', 'class' => 'form-delete', 'style' => 'display: inline-block;']) !!}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $order->id}}" data-table="notifications" style="display: inline-block;">Delete</button>
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
                                {!! $orders->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

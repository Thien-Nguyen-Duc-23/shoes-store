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
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" placeholder="Please input email" value="{{ request('email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger invalid-feedback">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Order Status</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('order_status', config('constants.order_status'), request('order_status'), ['class' => 'form-control select2 input-radius student_id', 'placeholder' => 'Please Select']) !!}
                                                @if ($errors->has('order_status'))
                                                    <span class="text-danger invalid-feedback">{{ $errors->first('order_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Shipping Status</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('shipping_status', config('constants.shipping_status'), request('shipping_status'), ['class' => 'form-control select2 input-radius plan_id', 'placeholder' => 'Please Select']) !!}
                                                @if ($errors->has('shipping_status'))
                                                    <span class="text-danger invalid-feedback">{{ $errors->first('shipping_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Date Order</label>
                                            <div class="col-sm-8">
                                                <div class='input-group {{ $errors->has('date_order') ? 'is-invalid' : '' }}'>
                                                    <div class="input-group-addon open-reservationtime">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control reservationtime" id="search_term"
                                                        name="date_order" value="{{ request('date_order') }}" readonly style="background-color: #ffffff">
                                                </div>
                                                @if ($errors->has('date_order'))
                                                    <span class="text-danger invalid-feedback">{{ $errors->first('date_order') }}</span>
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
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Dicount</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Date Order</th>
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

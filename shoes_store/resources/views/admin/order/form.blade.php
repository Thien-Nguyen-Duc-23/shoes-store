@push('styles')
<style>
    .select2-container {
        min-width: 100%;
    }
</style>
@endpush
@php
    $routeName = Request::route()->getName();
    $route = route('order.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "order.edit":
            $route = route('order.update', $order->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "order.show":
            $route = route('order.show', $order->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    @include('admin.overlay_loading.overlay_loading')
    @include('flash::message')
    <div class="box-body content-body">
        <div class="row" id="order-body">
            <div class="col-sm-6">
                <div class="box-header with-border">
                    <h3 class="box-title">Information Customer</h3>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="td-title">Select customer:</td>
                            <td>
                                {{ Form::select('id_user', $listUsers,  $check ? (isset($order->users) ? $order->users->id : null) : null, ['class' => 'form-control select2 select-id-user input-radius', 'style: withd:100%', $check ? 'disabled' : '']) }}
                                @if ($errors->has('id_user'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('id_user') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td-title">Name:</td>
                            <td>
                                {{-- <input class="form-control input-radius username" id="username" name="name" value="{{ old('name') }} {{ $isDetail ? 'readonly' : '' }}"> --}}
                                {!! Form::text('name', $check ? (isset($order->users) ? $order->users->name : null) : null, ['class' => 'form-control input-radius username '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                                @if ($errors->has('name'))
                                    <span class="text-danger invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td-title">Email:</td>
                            <td>
                                {!! Form::text('email', $check ? (isset($order->users) ? $order->users->email : null) : null, ['class' => 'form-control user-email input-radius'.($errors->has('email') ? 'text-danger' : ''), $check ? 'readonly' : '']) !!}
                                @if ($errors->has('email'))
                                    <span class="text-danger invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td-title">Phone:</td>
                            <td>
                                {!! Form::text('phone', $check ? (isset($order->users) ? $order->users->phone : null) : null, ['class' => 'form-control user-phone input-radius'.($errors->has('phone') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                                @if ($errors->has('phone'))
                                    <span class="text-danger invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td-title">City:</td>
                            <td>
                                {!! Form::text('city', $check ? (isset($order->users) ? $order->users->city : null) : null, ['class' => 'form-control user-city input-radius'.($errors->has('city') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                                @if ($errors->has('city'))
                                    <span class="text-danger invalid-feedback">{{ $errors->first('city') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td-title">Address:</td>
                            <td>
                                {!! Form::text('address', $check ? (isset($order->users) ? $order->users->address : null) : null, ['class' => 'form-control user-address input-radius'.($errors->has('address') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                                @if ($errors->has('address'))
                                    <span class="text-danger invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="box-header with-border">
                    <h3 class="box-title">Order Status</h3>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="td-title">Order status:</td>
                            <td>
                                {{ Form::select('order_status', config('constants.order_status'),  $check ? $order->order_status : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                                @if ($errors->has('order_status'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('order_status') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Shipping status:</td>
                            <td>
                                {{ Form::select('shipping_status', config('constants.shipping_status'),  $check ? $order->shipping_status : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                                @if ($errors->has('shipping_status'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('shipping_status') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Payment status:</td>
                            <td>
                                {{ Form::select('payment_status', config('constants.payment_status'),  $check ? $order->payment_status : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                                @if ($errors->has('payment_status'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('payment_status') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Shipping method:</td>
                            <td>
                                {{ Form::select('shipping_method', config('constants.shipping_method'),  $check ? $order->shipping_method : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                                @if ($errors->has('shipping_method'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('shipping_method') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Payment method:</td>
                            <td>
                                {{ Form::select('payment_method', config('constants.payment_method'),  $check ? $order->payment_method : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                                @if ($errors->has('payment_method'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('payment_method') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Information Products</h3>
                </div>
                <div class="box collapsed-box">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th class="product_price">Price</th>
                                <th class="product_qty">Quantity</th>
                                <th class="product_total">Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="container-list-product-shoes">
                                @include('admin.order.list_product_shoes.list_product', ['order' => $order, 'check' => $check])
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="box collapsed-box">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <input hidden name="amount" value="" class="amount-total">
                                <td class="td-title-normal">Sub Total:</td>
                                <td style="text-align:right" class="data-subtotal">{{ $check ? $order->orderDetails->sum('price') : 0 }}</td>
                            </tr>
                            <tr>
                                <td>Shipping Standard:</td>
                                <td style="text-align:right">
                                    <a href="#" class="updatePrice data-shipping editable editable-click" data-name="shipping" data-type="text" data-pk="1876" data-title="Shipping price">20000
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Discount(-):</td>
                                <td style="text-align:right">
                                    <a href="#" class="updatePrice data-discount editable editable-click" data-name="discount" data-type="text" data-pk="1877" data-title="Discount">0
                                    </a>
                                </td>
                            </tr>
                            <tr style="background:#f5f3f3;font-weight: bold;">
                                <td>Total:</td>
                                 <td style="text-align:right" class="data-total">{{ $check ? $order->orderDetails->sum('price') + 20000 : 20000  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box collapsed-box">
                    <table class="table box table-bordered">
                        <tbody>
                            <tr>
                                <td class="td-title">Order note:</td>
                                <td>
                                    {!! Form::text('note', $check ? $order->note : null, ['class' => 'form-control input-radius note '.($errors->has('note') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                                    @if ($errors->has('note'))
                                        <span class="text-danger invalid-feedback">{{ $errors->first('note') }}</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order history</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding box-primary">
                        <table class="table table-bordered" id="history">
                            <tbody>
                                <tr>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Time</th>
                                </tr>
                                    @if($check)
                                        @foreach ($orderHistories as $orderHistory)
                                            <tr>
                                                <td class="text-center">{{ $order->orderDetails->sum('quantity') }}</td>
                                                <td class="text-center">
                                                    <div class="history">{{ $order->orderDetails->sum('price') }}</div>
                                                </td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($orderHistory->date_order)->toDateTimeString() ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <button type="submit" id="submit-form" class="btn btn-primary">Save</button>
    </div>
    <!-- /.box-footer -->
{!! Form::close () !!}

@push('scripts')
    <script>
        // select item shoes
        function selectProduct(element)
        {
            node = element.closest('tr');
            var id = parseInt(node.find('option:selected').eq(0).val());
            if(id == 0 || isNaN(id)) {
                node.find('.add_sku').val('');
                node.find('.add_qty').eq(0).val('');
                node.find('.add_price').eq(0).val('');
                node.find('.add_total').eq(0).val('');
            } else {
                $.ajax({
                    url : '{{ route('order.get_product_shoes') }}',
                    type : "get",
                    dateType:"application/json; charset=utf-8",
                    data : {
                        id : id,
                    },
                    beforeSend: function(){
                        $('#overlay').show();
                    },
                    success: function(returnedData) {
                        if (returnedData.success === true) {
                            node.find('.add_sku').val(returnedData.shoes.sku);
                            if (returnedData.shoes.is_sale === 1) {
                                node.find('.add_price').eq(0).val(returnedData.shoes.price_sale * 1);
                                node.find('.add_total').eq(0).val(returnedData.shoes.price_sale * 1);
                            } else {
                                node.find('.add_price').eq(0).val(returnedData.shoes.price * 1);
                                node.find('.add_total').eq(0).val(returnedData.shoes.price * 1);
                            }
                            node.find('.add_qty').eq(0).val(1);
                            getTotalPrice();
                        } else {
                            callError(returnedData.message);
                        }

                        $('#overlay').hide();
                    }
                });
            }
        }

        // get total
        function getTotalPrice()
        {
            var checkTrueOrFail = '{{ $check ? true : false }}';
            if (checkTrueOrFail) {
                var sum = parseFloat('{{ $check ? $order->orderDetails->sum('price') : 0 }}');
            } else {
                var sum = 0;
            }

            $('.add_total').each(function() {
                sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
            });

            $('.data-subtotal').text(sum);
            $('.data-total').text(sum + 20000);
            $('.amount-total').val(sum + 20000);
        }
        
        // change Quantity
        function update_total(e)
        {
            node = e.closest('tr');
            var qty = node.find('.add_qty').eq(0).val();
            var price = node.find('.add_price').eq(0).val();
            node.find('.add_total').eq(0).val(qty*price);
            
            getTotalPrice();
        }
        
        // call function error
        function callError(message)
        {
            swal(message, {
                icon: "error",
                buttons: false,
                timer: 3000,
                dangerMode: true,
            });
        }

        // call function Success
        function callSuccess(message)
        {
            swal(message, {
                icon: "success",
                buttons: false,
                timer: 3000,
                dangerMode: true,
            });
        }

        // call function load product after delete or update
        function callAjaxGetProductShoesHtml() {
            var id = '{{ $check ? $order->id : null }}';
            if (!isNaN(id)) {
                $.ajax({
                    url: '{{ route('order.get_list_product_shoes_HTML') }}',
                    method: 'get',
                    dataType: 'html',
                    data: {
                        id: id,
                    }
                }).done(function (response) {
                    console.log(response);
                    $('#container-list-product-shoes').html(response);
                });
            }
        }

        $(document).ready(function () {
            // setup ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            let content = $('.content-body');

            // select customer
            $('.select-id-user').on('change', function(e) {
                e.preventDefault();
                let id = this.value;
                if(id == 0 || isNaN(id)) {
                    $('.username').val('');
                    $('.user-email').val('');
                    $('.user-phone').val('');
                    $('.user-city').val('');
                    $('.user-address').val('');

                    $('.username').prop('disabled', false);
                    $('.user-email').prop('disabled', false);
                    $('.user-phone').prop('disabled', false);
                    $('.user-city').prop('disabled', false);
                    $('.user-address').prop('disabled', false);
                } else {
                    $.ajax({
                        url : '{{ route('order.get_infor_user') }}',
                        type : "get",
                        dateType:"application/json; charset=utf-8",
                        data : {
                            id : id,
                        },
                        beforeSend: function(){
                            $('#overlay').show();
                        },
                        success: function(returnedData) {
                            if (returnedData.success === true) {
                                // document.getElementById("username").value = returnedData.user.name;
                                $('.username').val(returnedData.user.name);
                                $('.user-email').val(returnedData.user.email);
                                $('.user-phone').val(returnedData.user.phone);
                                $('.user-city').val(returnedData.user.city);
                                $('.user-address').val(returnedData.user.address);

                                $('.username').prop('disabled', true);
                                $('.user-email').prop('disabled', true);
                                $('.user-phone').prop('disabled', true);
                                $('.user-city').prop('disabled', true);
                                $('.user-address').prop('disabled', true);
                            } else {
                                callError(returnedData.message);
                            }
                            
                            $('#overlay').hide();
                        }
                    });
                }
            });

            // init select2
            $(".js-select2").select2({
                placeholder: " Please select ",
                closeOnSelect : false
            });

            // event add product shoes
            $('#add-item-button').click(function() {
                let listShoes = {!! json_encode($listShoes) !!},
                    select = '<option value="" selected>Please select</option>';

                    //reset before submit
                    $('.handle-responses').html('');

                    //render form submit
                    $.each(listShoes, function (key, value) {
                        select += '<option value="'+key+'">'+value+'</option>';
                    });

                var html = '<tr>';
                        html += '<td class="text-center">';
                            html += '<select onChange="selectProduct($(this));" class="add_id form-control select2" style="width: 100% !important;" name="add_id[]" id="add_id">';
                                html += select;
                            html += '</select>';
                        html +='</td>'
                        html +='<td>'
                            html +='<input type="text" disabled class="add_sku form-control"  value="">'
                        html +='</td>'
                        html +='<td>'
                            html +='<input onChange="update_total($(this));" type="number" min="0" class="add_price form-control" name="add_price[]" value="0">'
                        html +='</td>'
                        html +='<td>'
                            html +='<input onChange="update_total($(this));" type="number" min="0" class="add_qty form-control" name="add_qty[]" value="0">'
                        html +='</td>'
                        html +='<td>'
                            html +='<input type="number" disabled class="add_total form-control" value="0">'
                        html +='</td>'
                        html +='<td>'
                            html +='<button onClick="$(this).parent().parent().remove();" class="btn btn-danger btn-md btn-flat" data-title="Delete">'
                                html +='<i class="fa fa-times" aria-hidden="true"></i>'
                            html +='</button>'
                        html +='</td>'
                    html += '</tr>';

                $('#add-item').before(html);
                $('.select2').select2();
            });

            // btn delete point
            content.on('click', '.delete-product-shoes', function () {
                var isDetail = '{{ $isDetail ? true : false }}';
                if (!isDetail) {
                    var idOrderDetail = $(this).closest("tr").attr('id');
                    swal({
                        title: "Delete this product! Are you sure?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        closeOnClickOutside: false,
                    }).then((willQuickLeave) => {
                        if (willQuickLeave ) {
                            $.ajax({
                                url: '{{ route('order.delete_product_shoes') }}',
                                method: 'post',
                                data: {
                                    idOrderDetail: idOrderDetail
                                },
                                beforeSend: function(){
                                    $('#overlay').show();
                                },
                                success: function(res) {
                                    if (res.success === false) {
                                        callError(res.message);
                                        $('#overlay').hide();
                                    } else {
                                        callAjaxGetProductShoesHtml();
                                        getTotalPrice();
                                        callSuccess(res.message);
                                        $('#overlay').hide();
                                    }
                                },
                                error: function() {
                                    callError('Something wrong, please try again!');
                                    $('#overlay').hide();
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush

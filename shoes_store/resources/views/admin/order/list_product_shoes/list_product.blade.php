
@if($check && !$order->orderDetails->isEmpty())
    @foreach ($order->orderDetails as $orderDetail)
        <tr id="{{ $orderDetail->id }}">
            <td>{{ optional($orderDetail->shoes)->name ?? null }}</td>
            <td>{{ optional($orderDetail->shoes)->sku ?? null }}</td>
            <td class="product_price"><a href="#" class="edit-item-detail editable editable-click" data-title="Price">{{ $orderDetail->price ?? null }}</a></td>
            <td class="product_qty">x <a href="#" class="edit-item-detail editable editable-click" data-title="Quantity">{{ $orderDetail->quantity ?? null }}</a></td>
            <td class="product_total">{{ $orderDetail->price*$orderDetail->quantity ?? null }}</td>
            <td>
                <span class="btn btn-danger btn-xs delete-product-shoes" {{ $isDetail ? 'disabled' : '' }}><i class="fa fa-trash" aria-hidden="true"></i></span>
            </td>
        </tr>
    @endforeach
@endif

<tr id="add-item" class="not-print">
    <td colspan="6">
        <button type="button" class="btn btn-sm btn-flat btn-success" id="add-item-button" title="Add product" {{ $isDetail ? 'disabled' : '' }}><i class="fa fa-plus"></i> Add product</button>
    </td>
</tr>

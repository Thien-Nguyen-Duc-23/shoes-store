<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateRangePicker;

class OrderSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $orderStatus = array_keys(config('constants.order_status'));
        $shippingStatus = array_keys(config('constants.shipping_status'));

        return [
            'email' => 'nullable|max:255|email',
            'order_status'  => 'nullable|in:'.implode(',', $orderStatus),
            'shipping_status'  => 'nullable|in:'.implode(',', $shippingStatus),
            'date_order' => [
                'nullable',
                new DateRangePicker()
            ],
        ];
    }
}

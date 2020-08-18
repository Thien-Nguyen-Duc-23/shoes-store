<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
        $paymentStatus = array_keys(config('constants.payment_status'));
        $shippingMethod = array_keys(config('constants.shipping_method'));
        $paymentMethod = array_keys(config('constants.payment_method'));

        return [
            'name'  => 'required_if:id_user,null|max:255',
            'email' => 'required_if:id_user,null|max:255|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone' => 'required_if:id_user,null|string|max:30|regex:/^[0-9]{10,15}$/i',
            'city'  => 'required_if:id_user,null|max:255',
            'address'   => 'required_if:id_user,null|max:255',
            'note'  => 'nullable|max:1000',
            'order_status'  => 'required|in:'.implode(',', $orderStatus),
            'shipping_status'  => 'required|in:'.implode(',', $shippingStatus),
            'payment_status'  => 'required|in:'.implode(',', $paymentStatus),
            'shipping_method'  => 'required|in:'.implode(',', $shippingMethod),
            'payment_method'  => 'required|in:'.implode(',', $paymentMethod),
        ];
    }
}

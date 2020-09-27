<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\OrderDetails;

class CartController extends Controller
{
    public function index()
    {
        return view('client.cart.index');
    }

    public function checkout()
    {
        return view('client.cart.checkout');
    }

    public function processCheckout(Request $request)
    {
        \DB::beginTransaction();
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            $dataUser = [
                'name'          => $request->billingName,
                'email'         => $request->email,
                'address'       => $request->billingAddress,
                'city'          => 'waiting',
                'phone'         => $request->billingPhone,
            ];
    
            $user = User::create($dataUser);
        }

        if (empty($user)) {
            \DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Some thing wrong! Please try again!!!']);
        }
                    
        $dataOrder = [
            'user_id' => $user->id,
            'amount' => $request->totalQuantilyInCart,
            'date_order' => Carbon::now()->format('Y-m-d H:i:s'),
            'note' => $request->note ?? null,
            'order_status' => $request->order_status ?? 1,
            'shipping_status' => $request->shipping_status ?? 1,
            'payment_status' => $request->payment_status ?? 1,
            'shipping_method' => $request->shipping_method ?? 1,
            'payment_method' => $request->payment_method ?? 1,
        ];
        $order = Orders::create($dataOrder);

        if (empty($order)) {
            \DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Some thing wrong! Please try again!!!']);
        }

        foreach ($request->orderDetail as $value) {
            $dataOrderDetail = [
                'order_id' => $order->id,
                'shoes_id' => (int) $value['idProduct'],
                'quantity' => (int) $value['quantilyProduct'],
                'price' => (float) $value['priceProduct'],
            ];
            OrderDetails::create($dataOrderDetail);
        }

        \DB::commit();
        return response()->json(['success' => true, 'message' => 'Created Successfully!']);
    }
}

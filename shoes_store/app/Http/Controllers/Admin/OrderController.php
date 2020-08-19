<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\OrderCreateRequest;
use App\Http\Requests\Admin\Order\OrderEditRequest;
use App\Http\Requests\Admin\Order\OrderSearchRequest;
use App\Models\Shoes;
use App\Models\Orders;
use App\Models\User;
use App\Models\OrderDetails;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderSearchRequest $request)
    {
        $orders = new Orders;
        if ($request->email) {
            $orders = $orders->whereHas('users', function ($query) use ($request) {
                $query->where('email',  'like', '%' . $request->email . '%');
            });
        }
        if ($request->order_status) {
            $orders = $orders->where('order_status', $request->order_status);
        }
        if ($request->shipping_status) {
            $orders = $orders->where('shipping_status', $request->shipping_status);
        }
        if ($request->date_order) {
            $dates = explode(' - ', $request->date_order);
            $start_date = Carbon::parse($dates[0])->format('Y-m-d');
            $end_date = Carbon::parse($dates[1])->format('Y-m-d');

            $orders = $orders->whereDate('date_order', '>=', $start_date)
                ->whereDate('date_order', '<=', $end_date);
        }

        $orders = $orders->with('users', 'orderDetails')->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listShoes = Shoes::pluck('name', 'id')->toArray();
        $listUsers = User::pluck('email', 'id')->prepend('Please select', '')->toArray();

        return view('admin.order.create', compact('listShoes','listUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        \DB::beginTransaction();
        try {
            if (empty($request->add_id) || empty($request->add_price) || empty($request->add_qty)) {
                flash('Please add a product')->warning();
                return back()->withInput();
            }

            if (isset($request->id_user)) {
                $user = User::find($request->id_user);
            } else {
                $dataUser = [
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'address'       => $request->address,
                    'city'          => $request->city,
                    'phone'         => $request->phone,
                ];

                $user = User::create($dataUser);
            }

            if (empty($user)) {
                \DB::rollBack();
                flash('Not find customer!')->warning();
                return back()->withInput();
            }
            
            $dataOrder = [
                'user_id' => $user->id,
                'amount' => $request->amount,
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
                flash('Some thing wrong! Please try again!!!')->warning();
                return back()->withInput();
            }

            foreach ($request->add_id as $key => $value) {
                $dataOrderDetail = [
                    'order_id' => $order->id,
                    'shoes_id' => $value,
                    'quantity' => $request->add_qty[$key],
                    'price' => $request->add_price[$key],
                ];
                OrderDetails::create($dataOrderDetail);
            }
            
            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Insert error'])->error();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::with('users', 'orderDetails')
            ->where('id', $id)
            ->first();
        if (empty($order)) {
            flash('Not find order!')->warning();
            return redirect()->back();
        }
        
        $listShoes = Shoes::pluck('name', 'id')->toArray();
        $listUsers = User::pluck('email', 'id')->prepend('Please select', '')->toArray();
        $orderHistories = Orders::with('orderDetails')
            ->where('user_id', $order->user_id)
            ->orderBy('date_order', 'DESC')
            ->get();

        return view('admin.order.show', compact('order', 'listShoes', 'listUsers', 'orderHistories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::with('users', 'orderDetails')
            ->where('id', $id)
            ->first();
        if (empty($order)) {
            flash('Not find order!')->warning();
            return redirect()->back();
        }
        
        $listShoes = Shoes::pluck('name', 'id')->toArray();
        $listUsers = User::pluck('email', 'id')->prepend('Please select', '')->toArray();
        $orderHistories = Orders::with('orderDetails')
            ->where('user_id', $order->user_id)
            ->orderBy('date_order', 'DESC')
            ->get();

        return view('admin.order.edit', compact('order', 'listShoes', 'listUsers', 'orderHistories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderEditRequest $request, $id)
    {
        \DB::beginTransaction();
        try {
            // find order
            $order = Orders::find($id);
            if (empty($order)) {
                flash('error', ['name' => 'Not find order'])->error();
                return back()->withInput();
            }

            // check empty value
            if ($order->orderDetails->isEmpty() && (empty($request->add_price) || empty($request->add_qty))) {
                flash('Please add a product')->warning();
                return back()->withInput();
            }

            // find customer and update
            $user = User::find($order->user_id);
            if (empty($user)) {
                \DB::rollBack();
                flash('Not find customer!')->warning();
                return back()->withInput();
            }

            $dataUser = [
                'name'          => $request->name,
                'address'       => $request->address,
                'city'          => $request->city,
                'phone'         => $request->phone,
            ];

            $user = $user->update($dataUser);
            
            // update order
            $dataOrder = [
                'amount' => $request->amount ?? $order->amount,
                'note' => $request->note ?? null,
                'order_status' => $request->order_status ?? $order->order_status,
                'shipping_status' => $request->shipping_status ?? $order->shipping_status,
                'payment_status' => $request->payment_status ?? $order->payment_status,
                'shipping_method' => $request->shipping_method ?? $order->shipping_method,
                'payment_method' => $request->payment_method ?? $order->payment_method,
            ];
            $idOrder = $order->id;
            $order = $order->update($dataOrder);

            // create order detail
            if (!empty($request->add_id)) {
                foreach ($request->add_id as $key => $value) {
                    $dataOrderDetail = [
                        'order_id' => $idOrder,
                        'shoes_id' => $value,
                        'quantity' => $request->add_qty[$key],
                        'price' => $request->add_price[$key],
                    ];
                    OrderDetails::create($dataOrderDetail);
                }
            }

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Update error'])->error();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $order = Orders::find($id);
            if (empty($order)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Not find order'])->error();
                return back();
            }

            OrderDetails::where('order_id', $order->id)->delete();
            $order->delete();

            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }

    public function getProductShoes(Request $request)
    {
        $shoesId = $request->id ?? null;
        $shoes = Shoes::find($shoesId);

        if (!empty($shoes)) {
            return response()->json(['success' => true, 'shoes' => $shoes]);
        } else {
            return response()->json(['success' => false, 'message' => 'No shoes found']);
        }
    }

    public function getInforCustomer(Request $request)
    {
        $userId = $request->id ?? null;
        $user = User::find($userId);

        if (!empty($user)) {
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'No user found']);
        }
    }

    public function deleteProductShoes(Request $request)
    {
        \DB::beginTransaction();
        try {
            $id = $request->idOrderDetail ?? null;
            $orderDetail = OrderDetails::find($id);

            if (!empty($orderDetail)) {
                $orderDetail->delete();
                \DB::commit();
                return response()->json(['success' => true, 'message' => 'Delete successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'No order detail found']);
            }   
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Some thing wrong! Please try again !!!']);
        }
    }

    public function getListProductShoesHTML(Request $request)
    {
        $order = Orders::with('users', 'orderDetails')
            ->where('id', $request->id)
            ->first();
        $check = true;
        $isDetail = false;

        return view('admin.order.list_product_shoes.list_product', compact('order', 'check', 'isDetail'));
    }
}

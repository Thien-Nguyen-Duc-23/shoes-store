<?php

namespace App\Http\Controllers\Client_V_2\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    protected $customer;
    protected $orderRepository;
    protected $orderDetailRepository;
    /**
    *
    * @return void
    */
    public function __construct(
        CustomerRepositoryInterface $customer,
        OrderRepositoryInterface $orderRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
      $this->customer = $customer;
      $this->orderRepository = $orderRepository;
      $this->orderDetailRepository = $orderDetailRepository;
    }
    
    public function index(Request $request)
    {
        return view('client_v_2.cart.checkout.index');
    }

    public function create(Request $request)
    {
        \DB::beginTransaction();
        try {
            $user = $this->customer->findByEmail($request->email);
            if (empty($user)) {
                $dataUser = [
                    'name'          => $request->billingName,
                    'email'         => $request->email,
                    'address'       => $request->billingAddress,
                    'city'          => 'waiting',
                    'phone'         => $request->billingPhone,
                ];
        
                $user = $this->customer->create($dataUser);
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
            $order = $this->orderRepository->create($dataOrder);
    
            if (empty($order)) {
                \DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Some thing wrong! Please try again!!!']);
            }

            if (!empty($request->orderDetail)) {
                $dataOrderDetail = array();
                foreach ($request->orderDetail as $value) {
                    array_push($dataOrderDetail, [
                        'order_id' => $order->id,
                        'shoes_id' => (int) $value['idProduct'],
                        'quantity' => (int) $value['quantilyProduct'],
                        'price' => (float) $value['priceProduct'],
                    ]);
                }

                if (!empty($dataOrderDetail)) {
                    $this->orderDetailRepository->createMultipleDada($dataOrderDetail);
                }
            }

            \DB::commit();
            return response()->json(['success' => true, 'message' => 'Created Successfully!']);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return back()->withError($exception->getMessage())->withInput();
        }
        dd($request->all());
    }
}

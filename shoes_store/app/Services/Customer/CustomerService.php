<?php
namespace App\Services\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;

class CustomerService
{
    protected $customer;

    // inject CustomerRepositoryInterface in construct
    public function __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }

    // create function create account
    public function storeAccount(Request $request)
    {
        \DB::beginTransaction();
        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'gender'        => $request->gender ?? null,
            'birthday'      => \Carbon\Carbon::parse($request->birthday)->format('Y-m-d') ?? null,
            'image_path'    => $request->hasFile('image_path') ?? null,
            'address'       => $request->address ?? null,
            'status'        => $request->status ?? 1,
            'city'          => $request->city ?? 'waiting',
            'phone'         => $request->phone,
            'zip'           => $request->zip ?? null,
        ];

        $resultAccount = $this->customer->create($data);
        if ($resultAccount) {
            \DB::commit();
            return $resultAccount;
        } else {
            \DB::rollBack();
            return false;
        }
    }

    //check Login Client
    public function loginClient(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('client')->attempt($credentials)) {
            if (Auth::guard('client')->user()->status == 1) {
                return redirect()->intended();
            } else {
                Auth::guard('client')->logout();
                return redirect()->back()->with(['flag' => 'danger', 'message' => 'You do not have this access!!!']);
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Email or password is invalid!!!']);
        }
    }
}

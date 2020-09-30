<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use App\Http\Requests\Client\Customer\RegisterRequest;
use App\Http\Requests\Client\Customer\LoginRequest;
use Exception;
use Auth;

class AuthClientController extends Controller
{
    protected $customer;

    //inject CustomerService
    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer;
    }

    public function indexLogin()
    {
        return view('client.auth.login');
    }

    public function indexRegister()
    {
        return view('client.auth.register');
    }

    public function registerCustomer(RegisterRequest $request)
    {
        try {
            $result = $this->customer->storeAccount($request);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
        if ($result) {
            return redirect()->back()->with(['flag' => 'success', 'message' => 'Đăng ký tài khoản thành công !!!']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng ký tài khoản thất bại !!!']);
        }
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            $this->customer->loginClient($request);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->back()->withInput();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\Customer\CustomerCreateRequest;
use App\Http\Requests\Admin\Customer\CustomerEditRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = new User;
        if ($request->id) {
            $customers = $customers->where('id', $request->id);
        }
        if ($request->name) {
            $customers = $customers->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->status) {
            $customers = $customers->where('status', $request->status);
        }

        $customers = $customers->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.customer.index', compact('customers'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCreateRequest $request)
    {
        \DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasFile('image_path')) {
                $filename = $this->uploadImage(User::DIRECTORY, $request->file('image_path'));
            }

            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'gender'        => $request->gender,
                'birthday'      => \Carbon\Carbon::parse($request->birthday)->format('Y-m-d'),
                'image_path'    => $filename,
                'address'       => $request->address,
                'status'        => $request->status,
                'city'          => $request->city,
                'phone'         => $request->phone,
                'zip'           => $request->zip,
            ];

            User::create($data);

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Insert error'])->error();
            return back();
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
        $customer = User::find($id);
        if (empty($customer)) {
            flash('Not find customer!')->warning();
            return redirect()->back();
        }

        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        if (empty($customer)) {
            flash('Not find customer!')->warning();
            return redirect()->back();
        }

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerEditRequest $request, $id)
    {
        \DB::beginTransaction();
        try {
            $customer = User::find($id);
            if (empty($customer)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Update error'])->error();
                return back();
            }

            $filename = null;
            if ($request->hasFile('image_path')) {
                $filename = $this->uploadImage(User::DIRECTORY, $request->file('image_path'), $customer->image_path);
            }

            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'gender'        => $request->gender,
                'birthday'      => \Carbon\Carbon::parse($request->birthday)->format('Y-m-d'),
                'image_path'    => $filename ?? $customer->image_path,
                'address'       => $request->address,
                'status'        => $request->status,
                'city'          => $request->city,
                'phone'         => $request->phone,
                'zip'           => $request->zip,
            ];

            $customer = $customer->update($data);

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Update error'])->error();
            return back();
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
        \DB::beginTransaction();
        try {
            $customer = User::find($id);
            if (empty($customer)) {
                flash('Not find customer!')->warning();
                return redirect()->back();
            }

            $customer->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}

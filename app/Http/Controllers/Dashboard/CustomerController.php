<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomerRequest;
use App\Repositories\Contract\BrandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    protected $brandRepo;

    public function __construct(BrandRepositoryInterface $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::get();

        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('customers');
        }

     //   $data['type'] = 'client';
        $data['password'] = Hash::make($request->input('password')); // Hashing the password

       // $customer = $this->brandRepo->create($data);
        $customer = User::create($data);

        if ($customer) {
            return redirect()->route('admin.clients.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $customer = User::findOrFail($id);

    if ($customer) {
        return view('dashboard.customers.edit', compact('customer'));
    } else {
        return view('dashboard.error');
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
{
    $customer = User::findOrFail($id);

    $data = $request->except('_token', '_method');

    if ($request->hasFile('image')) {
        Storage::delete($customer->image);
        $data['image'] = $request->file('image')->store('customers');
    } else {
        $data['image'] = $customer->image;
    }

    if (!empty($request->input('password'))) {
        $data['password'] = Hash::make($request->input('password'));
    } else {
        unset($data['password']);
    }

    $customer->update($data);

    if ($customer) {
        return redirect()->route('admin.clients.index')->with('success', __('models.update_success'));
    } else {
        return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل');
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
        User::where('id',$id)->delete();

        // if ($customer->image) {
        //     Storage::delete($customer->image);
        // }

        // $customer->delete();

        return redirect()->back()->with('success', __('models.deleted_success'));


    }
}

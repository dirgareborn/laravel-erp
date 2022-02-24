<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        return view("customers.index", [ "customers" => $customers]);
    }

    public function create()
    {
        return view("customers.create");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($request->is_active == true){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        Customer::create($input);
        return redirect()->route("customer.index");
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view("customers.edit", [ "customer" => $customer]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $input = $request->all();
        if($request->is_active == true){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $customer->update($input);
        return redirect()->route("customer.index");
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route("customer.index");
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view("customers.show", [ "customer" => $customer]);
    }





}

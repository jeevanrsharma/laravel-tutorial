<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;
use \App\Company;

class CustomersController extends Controller
{
	public function index(){

		// $customers_array = ['Jeevan', 'sneha',];
		$activeCustomers = Customer::active()->get();
		$inActiveCustomers = Customer::inActive()->get();
		$companies = Company::all();

		// dd($activeCustomers);

		// $customers_array = Customer::all();

		// dd($customers_array);

		return view('internals.customers',compact('activeCustomers', 'inActiveCustomers', 'companies') );
	}

	public function store(){
		// dd(request('in_name'));

		$data = request()->validate([
			'name'=> 'required|min:3',
			'email'=>'required|email',
			'active'=>'required',
			'company_id'=> 'required'
		]);

		Customer::create($data); // mass data assignment

		// $customer->save();

		return back();

	}

}

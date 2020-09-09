<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;
use \App\Company;

class CustomersController extends Controller
{
	public function index(){

		// $customers_array = ['Jeevan', 'sneha',];
		// $activeCustomers = Customer::active()->get();
		// $inActiveCustomers = Customer::inActive()->get();
		// $companies = Company::all();
			$customers = Customer::all();
		// dd($activeCustomers);

		// $customers_array = Customer::all();

		// dd($customers_array);
		return view('customers.index',compact('customers') );

		// return view('customers.index',compact('activeCustomers', 'inActiveCustomers', 'companies') );
	}

	public function create(){
		$companies = Company::all();
		$customer = new Customer();

		return view ('customers.create', compact('companies', 'customer'));
	}
	public function store(){
		// dd(request('in_name'));
		Customer::create($this->validateRequest()); // mass data assignment

		// $customer->save();

		return redirect('customers');

	}

		
	public function show(Customer $customer){ // bcz of route model binding does it automatically instead $customer = Customer::where('id', $customer)->firstOrFail();

		// $customer = Customer::find($customer);
		// $customer = Customer::where('id', $customer)->firstOrFail();
		// dd($customer);
		return view('customers.show', compact('customer'));
	}
	
	public function edit(Customer $customer){
		$companies = Company::all();

		return view('customers.edit', compact('customer', 'companies'));
	}

	public function update(Customer $customer){

		$customer->update($this->validateRequest());

		return redirect('customers/'.$customer->id);

	}

	public function destroy(Customer $customer){
		$customer->delete();

		return redirect('customers');
	}

	public function validateRequest(){
		return request()->validate([
			'name'=> 'required|min:3',
			'email'=>'required|email',
			'active'=>'required',
			'company_id'=> 'required'
		]);
	}
}

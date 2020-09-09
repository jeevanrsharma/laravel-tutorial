@extends('layout')

@section('title', 'Customer List')


@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customers</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form action="customers" method="POST">
			<div class="form-group pb-2">
				<label for="name">Name: </label>
				<input class="form-control" type="text" name="name" value="{{ old('name') }}">
				<div>{{ $errors->first('in_name') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="email">Email: </label>
				<input class="form-control" type="text" name="email" value="{{ old('email') }}">
				<div>{{ $errors->first('in_email') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="email">Status: </label>

				<select name="active" id="active" class="form-control">
					<option value="" disabled> Select </option>
					<option value="1">Active</option>
					<option value="0">In Active</option>

				</select>
			</div>

			<div class="form-group pb-4">
				<label for="company_id">Company: </label>
				<select name="company_id" id="company_id" class="form-control">
					@foreach ($companies as $company)
						<option value = "{{ $company->id }}"> {{ $company->name }}</option>
					@endforeach
				</select>
			</div>


			<button type="submit" class="btn btn-primary"> Add Customer </button>
			@csrf
		</form>
	</div>
</div>


<hr>

<div class="row">
	<div class="col-6">
		<h1>Active Customers</h1>
		@foreach ($activeCustomers as $customer) 
		<li>{{ $customer->name }} <span class="text-muted">{{ $customer->company->name }}</span></li>
		@endforeach
	</div>
	<div class="col-6">
		<h1>In active Customers</h1>
		@foreach ($inActiveCustomers as $customer) 
		<li>{{ $customer->name }} <span>{{ $customer->company->name }}</span></li>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-12">
		<h1>Companies</h1>
		@foreach($companies as $company) 
		<h2>{{ $company->name }}</h2>

		<ul>
			@foreach($company->customers as $customer)
			<li>
				{{ $customer->name }}
			</li>
			@endforeach
		</ul>
		@endforeach
	</div>
</div>

@endsection
@extends('layout')

@section('title', 'Edit Details for'. $customer->name)


@section('content')

<div class="row">
	<div class="col-12">
		<h1>Edit Detials for {{$customer->name}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form action="/customers/{{$customer->id}}" method="POST">
			@method('PATCH') 
			@include('customers.form')

			<button type="submit" class="btn btn-primary"> Add Customer </button>
		</form>
	</div>
</div>
@endsection
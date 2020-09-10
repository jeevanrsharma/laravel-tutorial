@extends('layout')

@section('title', 'Contact us')

@section('content')

@if( !session()->has('message'))

<form action="/contact" method="post">
<div class="form-group pb-2">
				<label for="name">Name: </label>
				<input class="form-control" type="text" name="name" value="{{ old('name') }}">
				<div>{{ $errors->first('name') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="email">Email: </label>
				<input class="form-control" type="text" name="email" value="{{ old('email') }}">
				<div>{{ $errors->first('email') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="message">Message: </label>
				<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
				<div>{{ $errors->first('message') }}</div>
			</div>

			<button type="submit" class="btn btn-primary"> Send Message </button>
			@csrf
</form>

@endif

@endsection
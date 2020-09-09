			<div class="form-group pb-2">
				<label for="name">Name: </label>
				<input class="form-control" type="text" name="name" value="{{ old('name') ?? $customer->name }}">
				<div>{{ $errors->first('name') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="email">Email: </label>
				<input class="form-control" type="text" name="email" value="{{ old('email') ?? $customer->email }}">
				<div>{{ $errors->first('email') }}</div>
			</div>

			<div class="form-group pb-4">
				<label for="email">Status: </label>

				<select name="active" id="active" class="form-control">
					<option value="" disabled> Select </option>

					@foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
						<option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}> {{$activeOptionValue}} </option>
					@endforeach

					

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
			@csrf


<div class="form-group">
	{!! Form::label('check_in', 'Check In :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::date('check_in', null, ['class' => 'form-control']) !!}

		@if ($errors->has('check_in'))
			    <span class="text-danger">
					<strong>{{ $errors->first('check_in') }}</strong>
			    </span>
		@endif
	</div>
</div>

<div class="form-group">
	{!! Form::label('check_out', 'Check Out :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::date('check_out', null, ['class' => 'form-control']) !!}

		@if ($errors->has('check_out'))
			    <span class="text-danger">
					<strong>{{ $errors->first('check_out') }}</strong>
			    </span>
		@endif
	</div>
</div>

<div class="form-group">
	{!! Form::label('promotion_id', 'Promotion Code :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::select('promotion_id', $promotions, null, ['class' => 'form-control']) !!}
		<!--$promotions la mang gom value va ten-->
	</div>
</div>

<div class="form-group">
	{!! Form::label('status', 'Status :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('status', null, ['class' => 'form-control']) !!}

		@if ($errors->has('status'))
			<span class="text-danger">
				<strong>{{ $errors->first('status') }}</strong>
			</span>
		@endif
	</div>			
</div>

<div class="form-group">
	{!! Form::label('code', 'Code :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('code', null, ['class' => 'form-control']) !!}

		@if ($errors->has('code'))
			<span class="text-danger">
				<strong>{{ $errors->first('code') }}</strong>
			</span>
		@endif
	</div>		
</div>

<div class="form-group">
	{!! Form::label('total', 'Total :', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('total', null, ['class' => 'form-control']) !!}

		@if ($errors->has('total'))
			<span class="text-danger">
				<strong>{{ $errors->first('total') }}</strong>
			</span>
		@endif
	</div>			
</div>

<div class="col-md-8 col-md-offset-4">
	{!! Form::submit('Update Booking', ['class' => 'btn btn-primary']) !!}
</div>
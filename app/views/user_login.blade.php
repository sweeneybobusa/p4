@extends('_master')

@section('title')
	Log in
@stop

@section('content')
		<h6 class="subheader">What do you mean you're not a member? <a href='/signup'>Sign up</a> and see all the great things we have to offer!</h6>
		{{ Form::open(array('url' => '/login')) }}
				
		<div class='form-group'>
			{{ Form::label('email', 'Email') }} 
			{{ Form::email('email') }}
		</div>

		<div class='form-group'>
			{{ Form::label('password', 'Password') }} 
			{{ Form::password('password') }}
		</div>
	

		{{ Form::submit('log me in already!', array('class' => 'small radius button')) }}
	
	{{ Form::close() }}
	
@stop

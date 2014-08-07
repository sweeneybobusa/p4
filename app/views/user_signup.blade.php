@extends('_master')

@section('title')
	Sign up
@stop

@section('content')
	
	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach
	<h6 class="subheader">Already a member? What'cha doing here? Go on and <a href='/login'>Log in</a>  already.</h6>
		{{ Form::open(array('url' => '/signup')) }}
				
		<div class='form-group'>
			{{ Form::label('nickname', 'Nickname (What you want us to call you)') }}
			{{ Form::text('nickname') }}
		<div>
		<div class='form-group'>
			{{ Form::label('email', 'Email (required, must be unique)') }}
			{{ Form::email('email') }}
		<div>
		<div class='form-group'>
			{{ Form::label('password', 'Password (required, min 6 characters)') }}
			{{ Form::password('password') }}
		<div>
		{{ Form::honeypot('my_name', 'my_time') }}
		
		{{ Form::submit('Go on, sign me up!', array('class' => 'small radius button')) }}
	
	{{ Form::close() }}

@stop

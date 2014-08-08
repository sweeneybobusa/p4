@extends('_master')

@section('title')
	Create a new song tag
@stop

@section('breadcrumbs')&nbsp;|&nbsp;Create @stop


@section('content')
	{{ Form::open(array('action' => 'TagController@store')) }}
		<div>
			{{ Form::label('name','Add a new song tag') }} 
			{{ Form::text('name') }}
		</div>
		<br>
		{{ Form::submit('Add this to the song tags, already!', array('class' => 'small radius button')) }}
	{{ Form::close() }}
	
@stop
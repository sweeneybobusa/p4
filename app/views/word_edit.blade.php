@extends('_master')


@section('title')
	Edit word
@stop

@section('content')

	{{ Form::model($word, ['method' => 'post', 'action' => ['wordController@postEdit', $word->id]]) }}
	
		<h2>Update: {{ $word->dance_term }}</h2>
	
		<div class='form-group'>
			{{ Form::label('dance_term', 'Dance term') }}
			{{ Form::text('dance_term') }}
		</div>
		
		
		<div class='form-group'>
			{{ Form::label('abbreviation', 'Abbreviation') }}
			{{ Form::text('abbreviation') }}
		</div>
		
		<div class='form-group'>
			{{ Form::label('definition', 'Definition') }}
			{{ Form::text('definition') }}
		</div>
		
		{{ Form::submit('Save') }}
	
	{{ Form::close() }}

@stop
@extends('_master')

@section('title')
	Add a new word
@stop

@section('content')

	{{ Form::open(array('action' => 'WordController@store')) }}


		<div class='form-group'>
			{{ Form::label('dance_term', 'Dance term') }} 
			{{ Form::text('dance_term') }}
		</div>

		<div class='form-group'>
			{{ Form::label('abbreviation', 'Abbreviation') }} 
			{{ Form::text('abbreviation') }}
		</div>

		<div class='form-group'>
			{{ Form::label('definition','Definition') }} 
			{{ Form::text('definition') }}
		</div>
		
		{{ Form::submit('OMG, this is the best word evah!', array('class' => 'small radius button')) }}

	{{ Form::close() }}


@stop

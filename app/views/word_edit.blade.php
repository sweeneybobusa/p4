@extends('_master')


@section('title')
	Edit: {{ $word->dance_term }}
@stop

@section('content')
	{{ Form::model($word, ['method' => 'put', 'action' => ['WordController@update', $word->id]]) }}
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
		<input name="_method" type="hidden" value="PUT">
		
		{{ Form::submit('Now this is what this should mean!', array('class' => 'small radius button', 'title' => 'Now this is what this should mean!')) }}
	
	{{ Form::close() }}

@stop
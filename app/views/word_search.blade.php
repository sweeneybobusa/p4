@extends('_master')

@section('title')
	Dance glossary Search
@stop


@section('content')
		{{ Form::open(array('action' => 'WordController@index', 'method' => 'GET')) }}
			{{ Form::label('query','Search for a word:') }}
			{{ Form::text('query') }}
			{{ Form::submit('What the heck is this word?', array('class' => 'small radius button')) }}
		{{ Form::close() }}
@stop

@extends('_master')

@section('title') 
Searching the Songs
@stop

@section('content')
	{{ Form::open(array('action' => 'SongController@getIndex', 'method' => 'GET')) }}
		{{ Form::label('query','Search for a song:') }}
		{{ Form::text('query') }}
		{{ Form::submit('Show me the song', array('class' => 'small radius button')) }}
		{{ Form::close() }}

@stop
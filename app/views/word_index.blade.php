@extends('_master')


@section('title')
	Dance word glossary
@stop

@section('content')
<div class="row">
<div class="large-7 medium-5 columns">
	<?php $items_returned = count($words); ?>
	@if ($query != "")
		<h3>You sure do like them words.</h3>
		<p>You searched for <strong>{{{ $query }}}</strong> {{$message}} {{ $items_returned }} words/definitions.</p>			
	@else
		<h3>Take a gander at the {{ $items_returned }} words and abbreviations.</h3>
	@endif
	
	@foreach($words as $dance_term => $word)
		
		<p><strong>{{ $word['dance_term'] }}
		@if($word['abbreviation'] != "")
			({{ $word['abbreviation'] }})
		@endif
		&mdash;</strong>
		{{ $word['definition'] }}
		@if(Auth::check())
			{{ Form::open(['method' => 'DELETE', 'action' => ['WordController@destroy', $word->id]]) }}
			<a href="/word/{{ $word['id'] }}/edit" class="radius warning label" title="Edit {{ $word['dance_term'] }}" alt="Edit {{ $word['dance_term'] }}">Edit {{ $word['dance_term'] }}</a>&nbsp;<a href='javascript:void(0)' onClick='parentNode.submit();return false;' class="radius alert label" title="Delete {{ $word['dance_term'] }}" alt="Delete {{ $word['dance_term'] }} ">Delete {{ $word['dance_term'] }}</a>{{ Form::close() }}
		@endif
		</p>
	
	@endforeach
</div>
<div class="large-1 medium-2 columns"></div>
<div class="panel large-3 medium-4 columns end">
	<h5>Glossary Lookup</h5>
	@if(Auth::check())<a href='/word/create' class="radius success label" title='Add a word' alt="Add a word">Add a word</a>@endif
	{{ Form::open(array('action' => 'WordController@index', 'method' => 'GET')) }}
		 {{ Form::label('query','Search for a word:') }}
		 {{ Form::text('query') }}
		 {{ Form::submit('Find me a word?', array('class' => 'small radius button')) }}
	{{ Form::close() }}
			
	@if(Auth::check())
	<br><br>
		<h5>Song Search</h5>
		{{ Form::open(array('action' => 'SongController@getIndex', 'method' => 'GET')) }}
			{{ Form::label('query','Look for an artist or song.') }}
			{{ Form::text('query') }}
			{{ Form::submit('Show me the song', array('class' => 'small radius button')) }}
		{{ Form::close() }}
	@endif
</div>
</div>
@stop
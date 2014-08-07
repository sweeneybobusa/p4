@extends('_master')


@section('title')
	Dance terms and abbreviations
@stop

@section('content')

	@if(Auth::check())
		<div><h6 class="subheader">
		<a href='/word/create'>Add</a> a term/definition</h6>
		</div>
	@endif
	
	@if ($query != "")
		<p>You searched for <strong>{{{ $query }}}</strong></p>
		
		@if(count($words) == 0)
			<p>No matches found</p>
		@endif

	@endif
	
	
	@foreach($words as $dance_term => $word)
		
		<p><strong>{{ $word['dance_term'] }}
			@if($word['abbreviation'] != "")
				({{ $word['abbreviation'] }})
			@endif
			&mdash;</strong>
			{{ $word['definition'] }}
			@if(Auth::check())
				<a href='/word/edit/{{ $word['id'] }}'>Edit</a>&nbsp;|&nbsp;<a href="/word/delete/{{ $word['id'] }}">Delete</a>
			@endif
		</p>
	
	@endforeach

@stop
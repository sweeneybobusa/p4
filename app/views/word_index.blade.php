@extends('_master')


@section('title')
	Dance terms and abbreviations
@stop

@section('content')

	<h2>Dance Terms</h2>

	<div>
		<a href='/word/create'>+ Add a term/definition</a>
	</div>


	@if(trim($query) != "")
		<p>You searched for <strong>{{{ $query }}}</strong></p>
		
		@if(count($words) == 0)
			<p>No matches found</p>
		@endif
		
	@endif
		
	@foreach($words as $dance_term => $word)
		
		<section>
			<h2>{{ $word['dance_term'] }}</h2>
			<p>{{ $word['abbreviation'] }} <br>{{ $word['definition'] }}</p>
		</section>
	
	@endforeach

@stop
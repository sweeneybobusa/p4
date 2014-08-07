@extends('_master')

@section('title')
	Dance glossary Search
@stop


@section('content')

	<label for='query'>Search:</label>
	<input type='text' id='query' name='query'>
	<button id='search' class='small radius button'>Go on and figure out that there word.</button><br><br>
	<div id='results'></div>

@stop

@section('footer')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/js/search.js"></script>
@stop
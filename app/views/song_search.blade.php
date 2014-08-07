@extends('_master')

@section('title') 
Searching the Songs
@stop

@section('content')

	<label for='query'>Search:</label>
	<input type='text' id='query' name='query' >
	<button id='search-html' class="radius">Search</button><br><br>
	<div id='results'></div>

@stop

@section('footer')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/js/search.js"></script>
@stop
@extends('_master')


@section('title')
	Song tags
@stop



@section('content')

	<a href='/tag/create' class='radius label'>Add a new tag</a>
	
	
	@foreach($tags as $tag)
	
		<div>
		<h5>{{ $tag->name }} </h5>
			{{ Form::open(['method' => 'DELETE', 'action' => ['TagController@destroy', $tag->id]]) }}
			<a href='/tag/{{ $tag->id }}' class="radius label">About</a>
			<a href='/tag/{{ $tag->id }}/edit' class="radius label">Edit</a>
			<a href='javascript:void(0)' onClick='parentNode.submit();return false;' class="radius label">Delete</a>{{ Form::close() }}
		<br>
		</div>
	
	@endforeach

@stop
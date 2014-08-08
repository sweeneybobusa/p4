@extends('_master')


@section('title')
	Song tags
@stop



@section('content')
	<a href='/tag/create' class='radius success label'>Add a tag</a>
	@foreach($tags as $tag)
		<div>
		<h5>{{ $tag->name }} </h5>
			{{ Form::open(['method' => 'DELETE', 'action' => ['TagController@destroy', $tag->id]]) }}
			<a href='/tag/{{ $tag->id }}' class="radius label">About {{ $tag->name }}</a>
			<a href='/tag/{{ $tag->id }}/edit' class="radius warning label">Edit {{ $tag->name }}</a>
			<a href='javascript:void(0)' onClick='parentNode.submit();return false;' class="radius alert label">Delete {{ $tag->name }}</a>{{ Form::close() }}
		<br>
		</div>
	
	@endforeach

@stop
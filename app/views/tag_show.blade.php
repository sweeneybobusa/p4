@extends('_master')


@section('title')
	About: {{ $tag->name }}
@stop


@section('content')
<a href='/tag/create' class='radius label'>Add a new tag</a>

<p><strong>{{ $tag->name }}</strong> was created on {{ $tag->created_at }} and last updated on {{ $tag->updated_at }}.
{{ Form::open(['method' => 'DELETE', 'action' => ['TagController@destroy', $tag->id]]) }}
<a href='/tag/{{ $tag->id }}/edit' class="radius label">Edit</a>
<a href='javascript:void(0)' onClick='parentNode.submit();return false;' class="radius label">Delete</a>{{ Form::close() }}
</p>
	
@stop
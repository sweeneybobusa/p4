@extends('_master')


@section('title')
	Edit {{ $tag->name }} song tag
@stop

@section('breadcrumbs')&nbsp;|&nbsp;Edit @stop

@section('content')
	{{ Form::model($tag, ['method' => 'put', 'action' => ['TagController@update', $tag->id]]) }}
	<?php $edit_message = "Edit " . $tag->name; ?> 
		<div class='form-group'>
			{{ Form::label('name', $edit_message) }}
			{{ Form::text('name') }}
		</div>
		<input name="_method" type="hidden" value="PUT">
		<a href="/tag" title="Abort: I don't want to edit {{ $tag->name }}"	class="radius alert label">Abort: I don't want to edit {{ $tag->name }}</a>
		{{ Form::submit('Update this already!', array('class' => 'small radius button')) }}
	{{ Form::close() }}
@stop
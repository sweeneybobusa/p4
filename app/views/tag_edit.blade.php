@extends('_master')


@section('title')
	Edit {{ $tag->name }} song tag
@stop

@section('breadcrumbs')&nbsp;|&nbsp;<a href="/tag">Tag</a>&nbsp;|&nbsp;Edit @stop

@section('content')

	{{ Form::model($tag, ['method' => 'put', 'action' => ['TagController@update', $tag->id]]) }}
	<?php $edit_message = "Edit " . $tag->name; ?> 
		<div class='form-group'>
			{{ Form::label('name', $edit_message) }}
			{{ Form::text('name') }}
		</div>
		
		{{ Form::submit('Update this already!', array('class' => 'small radius button')) }}
	
	{{ Form::close() }}

@stop
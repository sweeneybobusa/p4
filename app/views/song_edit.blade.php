@extends('_master')


@section('title')
	Edit song
@stop



@section('content')

	{{ Form::model($song, ['method' => 'post', 'action' => ['songController@postEdit', $song->id]]) }}
	
		<h2>Update: {{ $song->name }}</h2>
	
		<div class='form-group'>
			{{ Form::label('song_title', 'Song Title') }} 
			{{ Form::text('song_title') }}
		</div>

		<div class='form-group'>
			{{ Form::label('artist_id', 'Artist') }}
			{{ Form::select('artist_id', $artists, $song->artist_id); }}
		</div>

		<div class='form-group'>
			{{ Form::label('year', 'Year song was published (YYYY)') }} 
			{{ Form::text('year') }}
		</div>

		<div class='form-group'>
			{{ Form::label('bpm','Beats per minute (bpm)') }} 
			{{ Form::text('bpm') }}
		</div>

		<div class='form-group'>
			{{ Form::label('music_link','iTunes url') }} 
			{{ Form::text('music_link') }}
		</div>

		<div class='form-group'>
			{{ Form::label('video_url','Music video url') }} 
			{{ Form::text('video_url') }}
		</div>
		
		{{ Form::submit('Save') }}
	
	{{ Form::close() }}

@stop
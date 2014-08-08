@extends('_master')


@section('title')
	Update song {{$song->song_title}}
@stop
@section('breadcrumbs')&nbsp;|&nbsp;Update @stop
@section('content')

	{{ Form::model($song, ['method' => 'post', 'action' => ['SongController@postEdit', $song->id]]) }}
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
			{{ Form::label('album', 'Album') }} 
			{{ Form::text('album') }}
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
		
		{{ Form::submit('Now, this is what I&rsquo;m talkin&rsquo; about', array('class' => 'small radius button')) }}
	
	{{ Form::close() }}

@stop
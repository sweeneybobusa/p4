@extends('_master')


@section('title')
	All your Songs
@stop

@section('content')

	<h2>songs</h2>

	<div>
		View as:
		<a href='/song/?format=json' target='_blank'>JSON</a> | 
		<a href='/song/?format=pdf' target='_blank'>PDF</a>
	</div>
	
	<div>
		<a href='/song/create'>+ Add a song</a>
	</div>


	@if(trim($query) != "")
		<p>You searched for <strong>{{{ $query }}}</strong></p>
		
		@if(count($songs) == 0)
			<p>No matches found</p>
		@endif
		
	@endif
		
	@foreach($songs as $song_title => $song)
		
		<section>
			<img class='cover' src='{{ $song['cover'] }}'>
			
			<h2>{{ $song['song_title'] }}</h2>
			
			<p>			
			{{ $song['artist']->artist_name }} {{ $song['year'] }}
			</p>

			<p>
				@foreach($song['tags'] as $tag) 
					{{ $tag->dance_tag }}
				@endforeach
			</p>
			
			<a href='{{ $song['music_link'] }}'>Purchase this song...</a><br>
			
			<a href='{{ $song['video_url'] }}'>Music video...</a><br>
			
			<a href='/song/edit/{{ $song->id }}'>Edit</a>
		</section>
	
	@endforeach

@stop
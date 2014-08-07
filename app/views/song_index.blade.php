@extends('_master')


@section('title')
	The songs
@stop


@section('content')

	<div>
		<a href='/song/create' class="radius label">Add a song</a>
	</div>


	@if(trim($query) != "")
		<p>You searched for <strong>{{{ $query }}}</strong></p>
		
		@if(count($songs) == 0)
			<p>No matches found</p>
		@endif
		
	@endif
		
	@foreach($songs as $song_title => $song)
		
		<section>
			<h3>{{ $song['song_title'] }}</h3>
			<p>By {{ $song['artist']->artist_name }} from <em>{{ $song['album'] }}</em> ({{ $song['year'] }}) and is {{ $song['bpm'] }} <abbr title="Beats per minute">bpm</abbr>. </p>
			@foreach($song['tags'] as $tag)
				<a href="/tag/{{ $tag->id }}" class="radius label">{{ $tag->name }}</a>
			@endforeach
			<a href='{{ $song['music_link'] }}' class="radius label">Buy {{ $song['song_title'] }}</a> <a href='{{ $song['video_url'] }}' class="radius label">Music Video</a> 
				<a href='/song/edit/{{ $song->id }}' class="radius label">Edit</a></p>
		</section>
	
	@endforeach

@stop
<section>
	
	<h3>{{ $song['song_title'] }}</h3>
	
	<p>{{ $song['bpm'] }} <abbr title="Beats per minute">bpm</abbr>	{{ $song['artist']->name }} {{ $song['year'] }} {{  $song['album'] }}</p>

	<p>
		@foreach($song['tags'] as $tag) 
			{{ $tag->name }}
		@endforeach
	</p>
	
	<p><a href='{{ $song['music_link'] }}'>Purchase this song...</a><br>
	   <a href='{{ $song['video_url'] }}'>Music video...</a><br>
	   <a href='/song/edit/{{ $song->id }}'>Edit</a></p>
</section>

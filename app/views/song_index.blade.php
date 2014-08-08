@extends('_master')


@section('title')
	The songs
@stop


@section('content')
<div class="row">
	<div class="large-7 medium-5 columns">

	@if(trim($query) != "")
		<h3>I plumbed the depths of my back room and found you some songs.</h3>
		<p><strong>Yer search fur {{{ $query }}}</strong>.</p>
		
		@if(count($songs) == 0)
			<p>But I just could&rsquo;t find you none that matched. So I gave you these instead.</p>
		@else
			<p>Here&rsquo;s what I found under my couch:</p>
		@endif
		
	@endif
		
	@foreach($songs as $song_title => $song)
		
		<section>
			<h3>{{ $song['song_title'] }}</h3>
			<p>By {{ $song['artist']->artist_name }} from <em>{{ $song['album'] }}</em> ({{ $song['year'] }}) and is {{ $song['bpm'] }} <abbr title="Beats per minute">bpm</abbr>. </p>
			@foreach($song['tags'] as $tag)
				<a href="/tag/{{ $tag->id }}" class="radius secondary label">{{ $tag->name }}</a>
			@endforeach
			<a href='{{ $song['music_link'] }}' class="radius label">Buy {{ $song['song_title'] }}</a> <a href='{{ $song['video_url'] }}' class="radius label">Music Video</a> 
				<a href='/song/edit/{{ $song->id }}' class="radius warning label">Edit</a></p>
		</section>
	
	@endforeach
	</div>
	<div class="large-1 medium-2 columns"></div>
	<div class="panel large-3 medium-4 columns end">
		<h5>Song Search</h5>
		<a href='/song/create' class="radius success label">Add a song</a>
		{{ Form::open(array('action' => 'SongController@getIndex', 'method' => 'GET')) }}
			{{ Form::label('query','Look for an artist or song.') }}
			{{ Form::text('query') }}
			{{ Form::submit('Show me the song', array('class' => 'small radius button')) }}
		{{ Form::close() }}
		<br><br>
		<h5>Glossary Lookup</h5>
		<a href='/word/create' class="radius success label" title='Add a word' alt="Add a word">Add a word</a>
		{{ Form::open(array('action' => 'WordController@index', 'method' => 'GET')) }}
			{{ Form::label('query','Search for a word:') }}
		 	{{ Form::text('query') }}
		 	{{ Form::submit('Find me a word?', array('class' => 'small radius button')) }}
		{{ Form::close() }}
	</div>
</div>
@stop
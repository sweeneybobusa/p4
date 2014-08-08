@extends('_master')

@section('title') Welcome, you dancing fool! @stop
		

@section('content')
	<div class="row">
		@if(Auth::check())
					<div class="panel large-5 medium-6 columns">
					
						<h4>Song search</h4>
						{{ Form::open(array('action' => 'SongController@getIndex', 'method' => 'GET')) }}
							{{ Form::label('query','Look for an artist or song.') }}
							{{ Form::text('query') }}
							{{ Form::submit('Find me a song!', array('class' => 'small radius button')) }}
						{{ Form::close() }}
					</div>
				@else
					
					<div class="panel large-6 medium-5 columns">
						<h4>Well, How do you do?</h4>
						<p><strong>Already a member?</strong><br><a href='/login' class="mall radius button" title="Login right here!">Log right on in!</a></p>
						<p><strong>Not one yet?</strong><br><a href='/signup' class="small radius button" title="sign on up!">Sign on up!</a></p>	
					</div>		
				@endif
					
					<div class="panel large-6 medium-6 columns end">
					<h4>Dance glossary search</h4>
					{{ Form::open(array('action' => 'WordController@index', 'method' => 'GET')) }}
						{{ Form::label('query','Look for a word or abbreviation') }}
						{{ Form::text('query') }}
						{{ Form::submit('Git me a word?', array('class' => 'small radius button')) }}
					{{ Form::close() }}
					</div>
	</div>
	
@stop
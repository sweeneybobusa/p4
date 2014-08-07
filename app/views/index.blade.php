@extends('_master')

@section('title') Welcome you dancing fool! @stop
		

@section('content')
	<div class="row">
		@if(Auth::check())
					<div class="panel large-3 medium-5 columns">
					<h4>Dances database search</h4>
						<a href='/song/search' class="radius label">Songs</a> </li>
					</div>
				@else
					<div class="panel large-3 medium-5 columns">
						<p>Already a member? <a href='/login' class="radius label">Login</a> to get more options<br><br>
						No? <a href='/signup' class="radius label">Sign on up</a>!</p>	
					</div>		
				@endif
					<div class="large-2 medium-1 columns"></div>
					<div class="panel large-8 medium-6 columns">
					<h4>Dance Term Lookup</h4>
					
					{{ Form::open(array('action' => 'WordController@index', 'method' => 'GET')) }}
						{{ Form::label('query','Search for a word:') }}
						{{ Form::text('query') }}
						{{ Form::submit('What the heck is this word?', array('class' => 'small radius button')) }}
					{{ Form::close() }}
					</div>
	</div>
	
@stop
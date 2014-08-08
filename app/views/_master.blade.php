<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8" />
	<title>Dancing Fool - @yield('title','whoops-no title')</title>
	<link rel="stylesheet" href="{{ URL::asset('/stylesheets/app.css') }}" />
	<link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
	@yield('head')
</head>
<body>
	<!--outer wrapper -->
	<div class="row wrapper" >
		@if(Session::get('flash_message'))
			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
		@endif

		<!--header-->
      	<header class="large-10 large-centered columns">
        	<h1>@yield('title','Just a Dancing Fool')</h1>
      	</header>
      	
      	<!--content-->
      	<section class="content large-10 large-centered columns">
      		@if(Auth::check())
				<?php $auth_message="&nbsp;|&nbsp;<a href='/song'>Song</a>&nbsp;|&nbsp;<a href='/tag'>Tag</a>&nbsp;&nbsp;&nbsp;&nbsp;(Hey, " . Auth::user()->nickname . ", don't ferget ta <a href='/logout'>log out</a> when yer thru!) "; ?>
			@else
				<?php $auth_message="&nbsp;|&nbsp;(Already a member? <a href='/login'>Login</a> | No? <a href='/signup'>Sign up</a> to see more stuff.</em>"; ?>		
			@endif

      			<p><a href="/">Home</a>&nbsp;|&nbsp;<a href="/word">Word</a>@yield('breadcrumbs'){{ $auth_message }}<br>
		

			@yield('content','<p>Lookey here: a blank page!</p>')
      	</section>
		
		{{-- footer --}}
		<footer class="large-10 large-centered columns end">
				<p><small>&copy; copyright 2014 Bob Sweeney</small></p>
			@yield('footer')
				
		</footer>
		
 	</div>
 	
    <script src="{{ URL::asset('/bower_components/modernizr/modernizr.js') }}"  type='text/javascript'></script>
	<script src="{{ URL::asset('/bower_components/jquery/dist/jquery.min.js') }}"  type='text/javascript'></script>
    <script src="{{ URL::asset('/bower_components/foundation/js/foundation.min.js') }}"  type='text/javascript'></script>
    <script src="{{ URL::asset('/js/app.js') }}" type='text/javascript' ></script>

    </body>
</html>

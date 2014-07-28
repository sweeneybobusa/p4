<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8" />
	<title>@yield('title','Dancing Fool')</title>
	<link rel="stylesheet" href="{{ URL::asset('/stylesheets/app.css') }}" />
	<link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
	<script src="{{ URL::asset('/bower_components/modernizr/modernizr.js') }}"  type='text/javascript'></script>
</head>
<body>
	<!--outer wrapper -->
	<div class="row wrapper" >
		@yield('navigation')
		
		<!--header-->
      	<header class="large-10 large-centered columns">
        	<h1>@yield('title','Dancing Fool')</h1>
      	</header>
      	
      	<!--content-->
      	<section class="content large-10 large-centered columns">
			@yield('content','<p>Lookey here: a blank page!</p>')
      	</section>
		
		{{-- footer --}}
		<footer class="large-10 large-centered columns end">
				<p><small>&copy; copyright 2014 Bob Sweeney</small></p>
				
		</footer>
		
 	</div>
 	
    <script src="{{ URL::asset('/bower_components/jquery/dist/jquery.min.js') }}"  type='text/javascript' ></script>
    <script src="{{ URL::asset('/bower_components/foundation/js/foundation.min.js') }}"  type='text/javascript'></script>
    <script src="{{ URL::asset('js/app.js') }}" type='text/javascript' ></script>

    </body>
</html>

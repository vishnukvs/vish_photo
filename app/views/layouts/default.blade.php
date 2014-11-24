<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>My Childhood Memories</title>
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/styles.css'); }}
	<body>
		@include('layouts.header')
		<div class="container">
			@yield('content')
		</div>
		@include('layouts.footer')
		<!-- JavaScripts fires from here-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		{{ HTML::script('js/bootstrap.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</body>
	</html>
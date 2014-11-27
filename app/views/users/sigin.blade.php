@extends('layouts.default')
@section('content')
<div class="container"> 
	{{ Form::open(array('url'=>'sessions/','class'=>'form-horizontal','id'=>'users_form'))}}
	<div class="form-group">
		{{ Form::label('Email',null,array('class'=>'col-sm-2 control-label'))}}
		<div class="col-md-3"> 
			{{ Form::email('email',null,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('Password',null,array('class'=>'col-sm-2 control-label'))}}
		<div class="col-md-3">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2 ">
			{{ Form::submit('Sign in',array('class'=>'btn btn-primary btn-lg active'))}}
				<br>
				<div class="col-sm-offset-6 col-sm-2">
				<a href="/signup" class="btn btn-lg btn-primary">Sign up</a><br/>
		</div>
		</div>
	</div>
	{{ Form::close()}}
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-2">
		<a href="fbauth" class="btn btn-lg btn-primary">Facebook login</a><br/>
			<br />
		<a href="twitterAuth" class="btn btn-lg btn-primary">Twitter login</a>
	</div>
</div>
@stop

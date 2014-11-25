@extends('layouts.default')
@section('content')
<div class="container">
	{{ Form::open(array('url'=>url('users/'),'class'=>'form-horizontal','id'=>'users_form'))}}
	<h2 class="text-center"> Sign up</h2>
	<div class="form-group">
		{{ Form::label('FirstName',null,array('class'=>'col-sm-2 control-label'))}}
		<div class="col-md-3"> 
			{{ Form::text('firstname',null,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('LastName',null,array('class'=>'col-sm-2 control-label'))}}
		<div class="col-md-3"> 
			{{ Form::text('lastname',null,array('class'=>'form-control'))}}
		</div>
	</div>
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
			{{ Form::submit('Sign up',array('class'=>'btn btn-lg btn-success'))}}
		</div>
	</div>
	{{ Form::close()}}

</div>
@stop

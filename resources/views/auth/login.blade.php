@extends('app')

@section('content')

    <div class="login-box {{ session('app.box_header_bg') }}">

      <div class="login-logo">

        <a href="../../index2.html"><b> BRTTH</b>{{ session('app.box_header_title') }}</a>
      </div>

      <div class="login-box-body">

        <p class="login-box-msg">{{ session('app.msg') }}</p>

    	@if (count($errors) > 0)
		    <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
             </div>
		@endif

        {!! Form::open(['url' => '/auth/login']) !!}

          	<div class="form-group has-feedback">
	            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Username', 'required']) !!}
	            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          	</div>

          	<div class="form-group has-feedback">
	            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
	            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          	</div>

          	<div class="row">
	            <div class="col-xs-8">
	              <div class="checkbox icheck">
	                <label>
	                  <input type="checkbox"> Remember Me
	                </label>
	              </div>
            	</div><!-- /.col -->

	            <div class="col-xs-4">
	              {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
	            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}

        <a href="/password/email">I forgot my password</a><br>
    	<a href="/auth/register" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection


@section('script')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
@endsection
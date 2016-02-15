@extends('app')


@section('style')

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastmessage/css/jquery.toastmessage.css') }}">
@endsection

@section('content')

    <div class="register-box bg-red">

      <div class="register-logo">

        <a href="../../index2.html"><b>BRTTH</b>HHway</a>
      </div>

      <div class="register-box-body">

        <p class="login-box-msg">Register a new User</p>

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

        {!! Form::open(['url' => '/auth/register']) !!}

          	<div class="form-group has-feedback">
	            {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => 'Username', 'required']) !!}
	            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          	</div>

          	<div class="form-group has-feedback">
	            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
	            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          	</div>

          	<div class="form-group has-feedback">
	            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) !!}
	            <span class="glyphicon glyphicon-check form-control-feedback"></span>
          	</div>

          	<div class="form-group has-feedback">
	            {!! Form::select('type', 
	            [
      					'0' => 'Admin',
      					'1' => 'Employee',
      					'2' => 'Hospital'
      				], 
      				old('username'),
      				['class' => 'form-control', 'placeholder' => 'Select User Type','required']) !!} 
          	</div>

          	<div class="row">
	            <div class="col-xs-8">
	              <div class="checkbox icheck">
	                <label>
	                  <input type="checkbox"> I agree to the <a href="#">terms</a>
	                </label>
	              </div>
            	</div><!-- /.col -->

	            <div class="col-xs-4">
	              {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
	            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
@endsection


@section('script')

    <!-- Toastr -->
    <script src="{{ asset('plugins/toastmessage/js/jquery.toastmessage.js') }}"></script>

    @if (session('saved'))
      <script type="text/javascript">
        $().toastmessage('showToast', {
            text     : ' {{ session('saved') }}',
            type     : 'success',
            position : 'top-center'
        });
      </script>
    @elseif (session('deleted'))
      <script type="text/javascript">
        $().toastmessage('showToast', {
            text     : ' {{ session('deleted') }}',
            type     : 'notice',
            position : 'top-center'
        });
      </script>
    @endif

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
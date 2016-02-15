@extends('hhway.master-hhway')


@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-4.0.0/dist/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-toggle/css/bootstrap-toggle.css') }}">
@endsection


@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create New
            <small>Referral</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><i class="fa fa-files-o"></i> Referrals</li>
            <li class="active"><i class="fa fa-files-o"></i> Create</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="/hhway/referrals/create" class="btn btn-danger btn-block margin-bottom">Compose</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="/hhway/referrals"><i class="fa fa-inbox"></i> Received <span class="label label-danger pull-right">12</span></a></li>
                    <li><a href="/hhway/referrals/created"><i class="fa fa-file-text-o"></i> Created</a></li>
                    <li><a href="#"><i class="fa fa-file-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Labels</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">

              <div id="referral-form" class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">New Referral Form</h3>
                </div>

                {!! Form::open([
                    'method' => 'post',
                    'url'    => 'hhway/referrals'
                    ]) 
                !!}

                <div class="box-body">

                  <div class="content">
                    
                    <!-- Referrral init info -->
                    <div class="row">

                      <div class="col-md-9 col-xs-12">

                        <!-- Recipient -->    
                        <div class="form-group">
                          <div class="input-group">
                            
                            <span class="input-group-addon" id="basic-addon1">
                              <i class="fa fa-hospital-o"></i></span>
                            {!! Form::select('referred_to', [], null, ['class' => 'form-control select', 'id' => 'recipient', 'required']) !!} 
                          </div>
                        </div><!-- ./Recipient -->
                      </div> <!-- ./col-md-9 col-xs-9 -->

                      <div class="col-md-3 col-xs-12">
                        
                        <!-- Urgency -->
                        <div class="form-group">
                          
                          <!-- <input id="urgent_switch"  type="checkbox" data-toggle="toggle" data-on="Urgent" data-off="Non-Urgent" data-onstyle="danger" data-offstyle="default"> -->
                          <input type="checkbox" id="urgent_switch">
                          {!! Form::hidden('urgent', 0, ['id' => 'urgent_field']) !!}
                        </div>
                      </div><!-- ./col-md-9 col-xs-9 -->
                    </div><!-- ./row -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- Referral Reason -->
                        <div class="form-group">
                          {!! Form::label('referral_reason', 'Reason For Referral') !!}
                          {!! Form::textarea('referral_reason', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                        </div>
                      </div>
                    </div>
                    
                    <!-- Patient Information -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title">Patient Information</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body">
                      
                        <!-- Patient Name -->
                        <div class="row">

                          <!-- Lastname --> 
                          <div class="col-lg-4 col-md-5 col-sm-4 col-xs-12">
                            <div class="form-group">
                              {!! Form::label('last_name', 'Last Name') !!}
                              {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!} 
                            </div>
                          </div>  
                          
                          <!-- Firstname --> 
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                              {!! Form::label('first_name', 'First Name') !!}
                              {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!} 
                            </div>
                          </div>
                          
                          <!-- Middlename -->
                          <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">    
                            <div class="form-group">
                              {!! Form::label('Middle Name') !!}
                              {!! Form::text('middle_name', null, ['class' => 'form-control', 'required']) !!} 
                            </div>
                          </div>
                        </div><!-- ./Patient Name Row -->
                      
                        <!-- Patient bday, Gender, Civil Status -->
                        <div class="row">

                          <!-- bday -->    
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                              {!! Form::label('birth_date', 'Birth Date') !!}
                              {!! Form::input('date', 'birth_date', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                          </div>  
                          
                          <!-- Gender -->    
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <div>
                                  {!! Form::label('gender', 'Gender') !!}
                                </div>
                                <div class="btn-group" role="group" data-toggle="buttons">
                                  <span class="btn btn-default">
                                      <input type="radio" name="gender" value=1 required/><i class="fa fa-male"></i> Male
                                  </span>
                                  <span class="btn btn-default">
                                      <input type="radio" name="gender" value=0 required/><i class="fa fa-female"></i> Female
                                  </span>
                                </div> 
                            </div>
                          </div>
                          <!-- civil status -->
                          <div class="col-md-4 col-sm-4 col-xs-12">  
                            <div class="form-group">
                                {!! Form::label('civil_status', 'Civil Status') !!}
                                {!! Form::select('civil_status', [
                                      ''  =>  '',
                                      'Single'      => 'Single',
                                      'Married'     => 'Married',
                                      'Divorced '   => 'Divorced',
                                      'Separated '  => 'Separated',
                                      'Widowed  '   => 'Widowed '
                                        ], 
                                  null, ['class' => 'form-control', 'required']) !!} 
                            </div>
                          </div>
                        </div>

                        <!-- Address -->    
                        <div class="form-group">
                          {!! Form::label('address', 'Address') !!}
                          {!! Form::textarea('address', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                        </div>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- Medical Information -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title">Medical Information</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        
                        <!-- Complaint and History --> 
                        <div id="complaint_history">

                          <!-- Chief Complaint -->    
                          <div class="form-group">
                            {!! Form::label('chief_complaint', 'Chief Complaint') !!}
                            {!! Form::textarea('chief_complaint', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                          </div>

                          <!-- Brief History --> 
                          <div class="form-group">
                            {!! Form::label('history', 'Brief History') !!}
                            {!! Form::textarea('history', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                          </div>
                        </div>
                       
                        <!-- Exams and Operations Performed -->
                        <div id="exams_operations">

                          <!-- Exams Performed -->    
                          <div class="form-group">
                            {!! Form::label('exams_performed', 'Examination Performed') !!}
                            <div class="input-group">
                              {!! Form::select('exams_performed', [
                                      ''                => '',
                                      'Amylase'         => 'Amylase',
                                      'ANA'             => 'ANA',
                                      'aPTT'            => 'aPTT (PTT)',
                                      'AIC '            => 'AIC (Hemoglobin A1C or Glycohemoglobin)',
                                      'BMP '            => 'BMP (Basic Metabolic Panel)',
                                      'CBC '            => 'CBC (Complete Blood Count)',
                                      'CMP '            => 'CMP (Comprehensive Metabolic Panel)',
                                      'Electrolytes '   => 'Electrolytes (Electrolyte Panel)',
                                      'ESR '            => 'ESR (Sedimentation Rate)',
                                      'Flu Tests'       => 'Flu Tests',
                                      'hCG'             => 'hCG',
                                      'HIV Antibody'    => 'HIV Antibody',
                                      'Lipid Profile'   => 'Lipid Profile',
                                      'Liver Panel (Liver Function Panel)'  => 'Liver Panel (Liver Function Panel)',
                                      'Lyme Disease'    => 'Lyme Disease',
                                      'Microalbumin'    => 'Microalbumin',
                                      'Mono'            => 'Mono'
                                    ], 

                                  null, ['class' => 'form-control', 'required']) !!}
                              <span class="input-group-btn"><button class="btn btn-default" type="submit">Add</button></span>
                            </div> 
                          </div>

                          <!-- Operation Performed --> 
                          <div class="form-group">
                            {!! Form::label('operation_performed', 'Operation Performed') !!}
                            {!! Form::textarea('operation_performed', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                          </div>
                        </div>

                        <div id="diagnosis_remarks">

                          <!-- diagnosis --> 
                          <div class="form-group">
                            {!! Form::label('diagnosis', 'Diagnosis') !!}
                            {!! Form::textarea('diagnosis', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                          </div>

                          <!-- remarks --> 
                          <div class="form-group">
                            {!! Form::label('remarks', 'Remarks') !!}
                            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'size' => '10x3', 'required']) !!} 
                          </div>
                        </div>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- Patient Information -->
                    {!! Form::submit('Save', ['id' => 'btn_submit','class' => 'form-control btn btn-success btn-block']) !!}
                  </div>

                </div><!-- /.box-body -->
              {!! Form::close() !!}
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')

  <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('plugins/select2-4.0.0/dist/js/select2.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap-toggle/js/bootstrap-toggle.js') }}"></script>

  <script type="text/javascript">

    $(document).ready(function() {

        $('#referral_table').DataTable();

        $('#recipient').select2({
          placeholder: "To:",

          ajax: {
          url: "/hhway/referrals/create/get_receivers",
          dataType: 'json',
          delay: 250,
          data: function (params) {

              var queryParameters  = {
                    q   : params.term, // search term
                    page: params.page
              };

              return queryParameters;
            },
            processResults: function (data, page) {
              // parse the results into the format expected by Select2.
              // since we are using custom formatting functions we do not need to
              // alter the remote JSON data
              var hospitals = [];

              $.each(data, function(index, hospital) {

                  hospitals.push({

                      id  : hospital.id,
                      text: hospital.name

                  });
              });

              return {
                results: hospitals
              };
            },
            cache: true
          },
          templateResult: formatItem,
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 1,
        });

        function formatItem (hospital) {

          if (!hospital.id) { return hospital.name; }
          
          var $hospital = $(
            '<span class="product-img"><i class="fa fa-hospital-o"></i>  ' + hospital.text + '</span>'
          );

          return $hospital;
        };

//data-toggle="toggle" data-on="Urgent" data-off="Non-Urgent" data-onstyle="danger" data-offstyle="default"
        $('#urgent_switch').bootstrapToggle({
          on      : 'Urgent',
          off     : 'Non-Urgent',
          onstyle : 'danger',
          offstyle: 'default'
        });

        $('#urgent_switch').on('change', function(){
          console.log($(this).prop('checked'));
          if($(this).prop('checked') == true){
            $('#urgent_field').val('1');
            $('#referral-form').removeClass('box-default').addClass('box-danger box-solid');
          }else{
            $('#urgent_field').val('0');
            $('#referral-form').removeClass('box-danger box-solid').addClass('box-default');
          }
          console.log($('#urgent_field').val());
        });
    } );
  </script>
@endsection

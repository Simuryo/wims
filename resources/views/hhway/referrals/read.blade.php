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
            Read
            <small>- {{ $referral->referral_id }}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
            <li class=""><i class="fa fa-files-o"></i> Referrals</li>
            <li class="active"><i class="fa fa-files-o"> Read - {{ $referral->referral_id }}</i></li>
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

              <div class="box box-dafault ">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $referral->reason }} @if($referral->is_important)<i class="fa fa-exclamation-circle text-yellow"></i>@endif</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-print"></i></button>
                  </div>
                </div>

                {!! Form::open([
                    'method' => 'post',
                    'url'    => 'hhway/referrals'
                    ]) 
                !!}

                <div class="box-body">

                  <div class="row">
                    <div class="col-sm-6">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x text-aqua"></i>
                        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                      </span>
                      {{ $referral->name }}
                    </div>
                    <div class="col-sm-6">
                      <span class="pull-right">{{ $referral->created_at }}</span>
                    </div>                    
                  </div>
                  <div class="row">
                   <div class="content" style="margin-top: 0;margin-right: 5%;margin-left: 5%;">
                      <div class="row">
                        <div class="col-sm-3 col-xs-5 "><dt>Referral Reason:</dt></div>
                        <div class="col-sm-3 col-xs-7">{{ $referral->reason }}</div>
                        <div class="col-sm-2 col-xs-5"><dt>Diagnosis:</dt></div>
                        <div class="col-sm-4 col-xs-7">{{ $referral->diagnosis }}</div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-5"><dt>Chief Complaint:</dt></div>
                        <div class="col-sm-3 col-xs-7">{{ $referral->chief_complaint }}</div>
                        <div class="col-sm-2 col-xs-5"><dt>Remarks:</dt></div>
                        <div class="col-sm-4 col-xs-7">{{ $referral->remarks }}</div>
                      </div>
                      <div class="row">
                        <div class="content" style="min-height: 160px;padding-bottom: 0px;">
                          <div class="box box-default" style="margin-bottom: 0px;">
                            <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-user"></i> | Patient Information</h3>
                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-sm-2 col-xs-5"><dt>Last Name:</dt></div>
                                <div class="col-sm-2 col-xs-7">{{ $referral->last_name }}</div>
                                <div class="col-sm-2 col-xs-5"><dt>First Name:</dt></div>
                                <div class="col-sm-2 col-xs-7">{{ $referral->first_name }}</div>                            
                                <div class="col-sm-2 col-xs-5"><dt>Middle Name:</dt></div>                            
                                <div class="col-sm-2 col-xs-7">{{ $referral->middle_name }}</div>                            
                              </div>
                              <div class="row">
                                <div class="col-md-2 col-xs-5"><dt>Birth Date:</dt></div>
                                <div class="col-md-2 col-xs-7">{{ $referral->birth_date }}</div>
                                <div class="col-md-2 col-xs-5"><dt>Gender:</dt></div>
                                <div class="col-md-2 col-xs-7">{{ $referral->gender }}</div>                            
                                <div class="col-md-2 col-xs-5"><dt>Civil Status:</dt></div>                            
                                <div class="col-md-2 col-xs-7">{{ $referral->civil_status }}</div>                            
                              </div>
                              <div class="row">
                                <div class="col-md-2 col-xs-5"><dt>Address:</dt></div>
                                <div class="col-md-10 col-xs-7">{{ $referral->house_no.' '. $referral->street.', '.$referral->barangay.', '.$referral->municipality.', '. $referral->province}}</div>                            
                              </div>
                            </div>
                            <div class="box-footer text-center">
                              <a href="#">Edit Information</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="content" style="min-height: 160px;padding-bottom: 0px;">
                          <div class="box box-default" style="margin-bottom: 0px;">
                            <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-history"></i> | Brief History</h3>
                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-12">
                                  <p>
                                    "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                  </p>
                                </div>                          
                              </div>
                            </div>
                            <div class="box-footer text-center">
                              <a href="#">Edit Information</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="content" style="min-height: 160px;padding-bottom: 0px;">
                          <div class="box box-default" style="margin-bottom: 0px;">
                            <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-file-text-o"></i> | Laboratory / ECG X_RAY Result</h3>
                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-12 table-responsive">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>ID</th>
                                      <th>User</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                      <th>Reason</th>
                                    </tr>
                                    <tr>
                                      <td>219</td>
                                      <td>Alexander Pierce</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-warning">Pending</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                      <td>657</td>
                                      <td>Bob Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-primary">Approved</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                  </table>
                                </div>                          
                              </div>
                            </div>
                            <div class="box-footer text-center">
                              <a href="#">Edit Information</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="content" style="min-height: 160px;padding-bottom: 0px;">
                          <div class="box box-default" style="margin-bottom: 0px;">
                            <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-file-text-o"></i> | Management / Treatment Done / Medications Given</h3>
                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-12 table-responsive">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>ID</th>
                                      <th>User</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                      <th>Reason</th>
                                    </tr>
                                    <tr>
                                      <td>183</td>
                                      <td>John Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-success">Approved</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                      <td>175</td>
                                      <td>Mike Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-danger">Denied</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                  </table>
                                </div>                          
                              </div>
                            </div>
                            <div class="box-footer text-center">
                              <a href="#">Edit Information</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="content" style="min-height: 160px;padding-bottom: 0px;">
                          <div class="box box-default" style="margin-bottom: 0px;">
                            <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-file-text-o"></i> | Operation Performed</h3>
                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-12 table-responsive">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>ID</th>
                                      <th>User</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                      <th>Reason</th>
                                    </tr>
                                    <tr>
                                      <td>183</td>
                                      <td>John Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-success">Approved</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                      <td>219</td>
                                      <td>Alexander Pierce</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-warning">Pending</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                      <td>657</td>
                                      <td>Bob Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-primary">Approved</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                      <td>175</td>
                                      <td>Mike Doe</td>
                                      <td>11-7-2014</td>
                                      <td><span class="label label-danger">Denied</span></td>
                                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                  </table>
                                </div>                          
                              </div>
                            </div>
                            <div class="box-footer text-center">
                              <a href="#">Edit Information</a>
                            </div>
                          </div>
                        </div>
                      </div>                                            
                    </div>                   
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
          }else{
            $('#urgent_field').val('0');
          }
          console.log($('#urgent_field').val());
        });
    } );
  </script>
@endsection

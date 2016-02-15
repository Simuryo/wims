@extends('wims.master-wims')


@section('style')
    <!-- Datatables: AutoFill -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.1.0/css/autoFill.dataTables.min.css">
    
    <!-- Datatables: Buttons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css">
    
    <!-- Datatables: Responsive -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">
    
    <!-- Datatables: Select -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.1.0/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="">
@endsection


@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Item Categories
            <small>WIMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/wims"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="/wims/items">Item</a></li>
            <li class="active"><a href="/wims/items/category">Category</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Category Library</h3>
                  <!-- <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-success" href="/wims/items/create"><i class="fa fa-plus"></i> New Item</a>
                  </div> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="content">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-xs-offset-3 col-sm-offset-0">
                      <div class="btn-group">
                        <button type="button" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-xs-offset-0 col-sm-offset-0">
                      <div class="btn-group pull-right">
                        <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Export</button>
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-file-excel-o"></i> CSV</a></li>
                            <li><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
                            <li><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-files-o"></i> Copy</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="divider">
                  <table id="item_table" class="display responsive" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                      </tr>
                    </thead>
             
                    <tfoot>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                      </tr>
                    </tfoot>

                    </tbody> 
                  </table>
                </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <!-- New Category Form -->
              <div class="box box-success">
                <div class="box-header with-border">

                  <h3 class="box-title">New Category Form</h3>

                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                  {!! Form::open( [
                    'url'     => 'wims/items/category',
                    'method'  => 'post'
                  ])!!}
                    
                    @include('wims.item_categories._form')

                  {!! Form::close() !!}
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')

 <!-- 
  ==============================================================================================
    JS Declaration 
  ==============================================================================================-->
  <!-- Datatables: AutoFill -->
  <script src="https://cdn.datatables.net/autofill/2.1.0/js/dataTables.autoFill.min.js"></script>

  <!-- Datatables: Buttons -->
  <script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
  <!-- Datatables: Buttons - Column visibility control -->
  <script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.colVis.min.js"></script>
  <!-- Datatables: Buttons - HTML5 export buttons -->
  <script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>
  <!-- Datatables: Buttons - HTML5 export buttons |  jszip-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <!-- Datatables: Buttons - HTML5 export buttons |  pdfmake-->
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <!-- Datatables: Buttons - HTML5 export buttons |  vfs_fonts-->
  <!--<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.jss"></script>
  <!-- Datatables: Buttons - Print button -->
  <script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>

  <!-- Datatables: Responsive -->
  <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>

  <!-- Datatables: Select -->
  <script src="https://cdn.datatables.net/select/1.1.0/js/dataTables.select.min.js"></script>

   <!-- 
  ==============================================================================================
    JS Flash Sessions 
  ==============================================================================================-->
    @if (session('saved'))
      <script type="text/javascript">
        $().toastmessage('showToast', {
            text     : ' {{ session('saved') }}',
            type     : 'success',
            position : 'top-center'
        });
      </script>
    @endif

   <!-- 
  ==============================================================================================
    JS P:ugins Configurations 
  ==============================================================================================-->
  <script type="text/javascript">

    $(document).ready(function() {

    /* DT init/Config
     * --------------------------------------------------------------------------
     *  DataTable Initialization and Configuration
     * --------------------------------------------------------------------------
     * 
     * 
     */

        var table = $('#item_table').DataTable({

            processing: true,
            serverSide: true,
            ajax      : '/wims/items/category/loadData',
            columns: [

                  { data: 'code',          name: 'code'           },
                  { data: 'name',          name: 'name'           },
                  { data: 'description',   name: 'description'    }
                  
            ],

            select    : {

                  style   : 'multi'
            },

            order     : [[ 0, "desc" ]],

            paging    : false,

            scrollY   : 300,


        });

        /*
         * DT Buttons Declarations
         * Refresh - edit - delete - print - export[ csv, excel, pdf, copy]
         */
        new $.fn.dataTable.Buttons( table, {
            buttons: [
                {
                  className : 'dt_btn_refresh_data',
                  action    : function ( e, dt, node, config) {
                                  table.ajax.reload()
                                  table.button('.dt_btn_deselect_items').trigger();
                              }

                },
                {
                  className : 'dt_btn_edit_item',
                  action    : function ( e, dt, node, config) {
                                      $('#edit_item_modal').modal('toggle');
                                  }
                },
            ]
        } );

        
    });
  </script>
@endsection

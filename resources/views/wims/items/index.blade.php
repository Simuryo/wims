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
            Items
            <small>WIMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Items</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">760</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">2,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Item Library</h3>
                  <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-success" href="/wims/items/create"><i class="fa fa-plus"></i> New Item</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="content">
                  <table id="item_table" class="display responsive" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>UOM</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
             
                    <tfoot>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>UOM</th>
                        <th>Balance</th>
                      </tr>
                    </tfoot>

                    </tbody> 
                  </table>
                </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')

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
  <script src=""></script>

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

            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            ajax      : '/wims/items/loadData',
            columns: [

                  { data: 'code',          name: 'code'           },
                  { data: 'name',          name: 'name'           },
                  { data: 'description',   name: 'description'    },
                  { data: 'category_id',   name: 'category'       },
                  { data: 'uom_id',           name: 'uom'            },
                  { data: 'reorder_point', name: 'reorder_point'  }
            ],

            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            order     : [[ 0, "desc" ]],

            //paging    : false,

            //scrollY   : 400,

        });

        
    });
  </script>
@endsection

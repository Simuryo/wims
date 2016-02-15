@extends('wims.master-wims')


@section('style')

@endsection


@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Item
            <small>WIMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Items</li>
            <li class="active">Create</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">New Item</h3>
                </div><!-- /.box-header -->
                  {!! Form::open( [
                    'url'     => '/wims/items',
                    'method'  => 'post', 
                    'files'   => 'true'
                  ] ) !!}

                    @include('wims.items._form')

                  {!! Form::close() !!}

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->

          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')

  <!-- InputMask -->
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>


  <script type="text/javascript">

    $(document).ready(function() {

    /* Item Code init/config
     * --------------------------------------------------------------------------
     * Item Code configurations/masking and ajax checking.
     * --------------------------------------------------------------------------
     * 
     */

        /* Item Code Disable field
         * --------------------------------------------------------------------------
         * Disabled Item code field when form loads to force user to select 
         * the category first.
         * --------------------------------------------------------------------------
         * 
         */ 

            $('#item_code').prop('disabled', true);


        /* Item Code Masking field
         * --------------------------------------------------------------------------
         * Append an item masked based on the selected category.
         * --------------------------------------------------------------------------
         * 
         */

            $('#item_category').change(function() {

                $('#item_code').prop('disabled', false);
                
                var item_category = $(this).val();

                var item_category_mask;

                if(item_category == 'os')
                {
                    item_category_mask = "\\o\\s-9{1,4}";
                }
                else if(item_category == 'it')
                {
                    item_category_mask = "\\i\\t-9{1,4}"; 
                }
                else if(item_category == 'ms')
                {
                    item_category_mask = "\\m\\s-9{1,4}"; 
                }
                else if(item_category == 'dm')
                {
                    item_category_mask = "\\d\\m-9{1,4}"; 
                }
                else
                {
                    item_category_mask = "";
                    $('#item_code').prop('disabled', true);
                    alert("Please add me to DB T_T");
                }

                $("#item_code").inputmask("mask", {

                    'mask' : item_category_mask,
                }); 

                });

        
    });
  </script>
@endsection

<div class="box-body ">

	<div class="row">

		<!-- 1st Column Item Information -->
		<div class="col-md-4 col-sm-12 col-xs-12">

			<!-- Item Image -->	
			<div class="form-group">

                {!! Form::label('Item Image') !!}
                <!-- input id="item_image" name="item_image" type="file" class="form-control file-loading" accept="image/*" required> -->
                <!-- {!! Form::file('image', [

                	'id' 								=> 'item_image', 
                	'class' 							=> 'form-control file-loading',
                	'accept' 							=> 'image/*'
                ]) !!} -->
            </div> <!-- /.Item Image -->	
		</div><!-- /.1st Column Item Information -->


		<!-- 2nd Column Item Information -->
		<div class="col-md-4 col-sm-12 col-xs-12">

			<!-- Item Catergory -->	
			<div class="form-group">

				{!! Form::label('Item Category') !!}
				{!! Form::select('category', [
					''  =>  '',
					'os' => 'Office Supplies',
					'it' => 'IT Supplies',
					'ms' => 'Medical Supplies',
					'dm' => 'Drugs and Medicine Supplices'
				], 
				null, [
					'id' 						=> 'item_category', 
					'class' 					=> 'form-control', 
					'data-validation'			=> 'required',
					'data-validation-error-msg'	=> 'Item Category is Required'
				]) !!} 
			</div><!-- /. Item Catergory -->	

			<!-- Item Code -->
			<div class="form-group">

				{!! Form::label('Item Code') !!}
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-cube"></i></div>
					<!-- <input id="item_code" name="code" type="text" class="form-control" data-validation-url="/wims/items/search" data-validation="required server" /> -->

					{!! Form::text('code', null, [
						'id' 						=> 'item_code', 
						'class' 					=> 'form-control', 
						'data-validation'			=> 'server required',
						'data-validation-url'		=> '/wims/items/search',
						'data-validation-error-msg'	=> 'Item Code is Required'

					]) !!}
				</div><!-- /.input group -->
			</div><!-- /.Item Code -->

			<!-- Item Code Testing -->
			<div id="test4"></div>

			<!-- Item Name -->
			<div class="form-group">

				{!! Form::label('Item Name') !!}
				{!! Form::text('name', null, [
					'id' 						=> 'item_name', 
					'class' 					=> 'form-control', 
					'data-validation'			=> 'required',
					'data-validation-error-msg'	=> 'Item Name is Required'
				]) !!} 
			</div><!-- /.Item Name -->

			<!-- Reorder Point -->
			<div class="form-group" >

				{!! Form::label('reorder_point', 'Re-Order Point') !!}  
				{!! Form::input('number', 'reorder_point', null, [
					'id' 						=> 'item_reorder_point', 
					'class' 					=> 'form-control', 
					'data-validation' 			=> 'required',
					'data-validation-error-msg'	=> 'Item Re-Order Point is Required'
				]) !!}
			</div><!-- /.Reorder Point -->
		</div><!-- /.2nd Column Item Information -->

		<!-- 3rd Column Item Information -->
		<div class="col-md-4 col-sm-12 col-xs-12">

			<!-- Item Description -->    
			<div class="form-group">

				{!! Form::label('Item Description') !!}
				{!! Form::textarea('description', null, [
					'id' 						=> 'item_description', 
					'class' 					=> 'form-control', 
					'size' 						=> '10x6', 
					'data-validation'			=> 'required',
					'data-validation-error-msg'	=> 'Item Description is Required'
				]) !!} 
			</div><!-- /.Item Description -->    

			<!-- Item  Unit of Measurement-->    
			<div class="form-group">
				{!! Form::label('Unit of Measurement') !!}
				{!! Form::select('uom', [
					''  =>  '',
					'booklet' => 'Booklet',
					'bottle'  => 'Bottle',
					'box'     => 'Box',
					'jar'     => 'Jar',
					'pack'    => 'Pack',
					'pad'     => 'Pad',
					'piece'   => 'Piece',
					'ream'    => 'Ream',
					'roll'    => 'Roll',
					'set'     => 'Set',
					'tin'     => 'Tin'
					], 
				null, [
					'id' 						=> 'item_uom', 
					'class' 					=> 'form-control', 
					'data-validation'			=> 'required',
					'data-validation-error-msg'	=> 'Item Unit of Measurement is Required'
				]) !!} 
			</div><!-- /.Item  Unit of Measurement-->    
		</div><!-- /.3rd Column Item Information -->
	</div><!-- /.row -->
	<!-- Add/Cancel Form Input -->
	<div class="form-group">
	{!! Form::submit('Save', ['id' => 'btn_submit','class' => 'btn btn-block btn-success form-control']) !!}
	</div>
</div><!-- /.box-body -->



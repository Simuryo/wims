<div class="box-body ">

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">

			<!-- Item Category Code -->
			<div class="form-group">

				{!! Form::label('Category Code') !!}
				{!! Form::text('code', null, [
					'id' 						=> 'item_category_code', 
					'class' 					=> 'form-control',
					'required'
				]) !!} 
			</div><!-- /.Item Category Code -->

			<!-- Item Category Code -->
			<div class="form-group">

				{!! Form::label('Category Name') !!}
				{!! Form::text('name', null, [
					'id' 						=> 'item_category_code', 
					'class' 					=> 'form-control',
					'required'
				]) !!} 
			</div><!-- /.Item Category Code -->
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">

			<!-- Item Category Description -->    
			<div class="form-group">

				{!! Form::label('Category Description') !!}
				{!! Form::textarea('description', null, [
					'id' 						=> 'item_category_description', 
					'class' 					=> 'form-control', 
					'size' 						=> '10x6', 
					'required'
				]) !!} 
			</div><!-- /.Item Category Description -->       
		</div>
	</div><!-- /.row -->
	<!-- Add/Cancel Form Input -->
	<div class="form-group">
	{!! Form::submit('Add', ['id' => 'btn_submit','class' => 'btn btn-block btn-success form-control']) !!}
	</div>
</div><!-- /.box-body -->



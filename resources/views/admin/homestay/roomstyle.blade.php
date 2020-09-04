@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="#">Home</a>
				<i class="icon-angle-right"></i> 
			</li>
			<li>
				<i class="icon-edit"></i>
				<a href="#">Forms</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}
							@endforeach
						</div>
					@endif

					@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
					@endif
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
						<div class="control-group">
						  <label class="control-label" for="typeahead">Name:</label>
						  <div class="controls">
							<input type="text" id="typeahead" name="name">
						  </div>
						</div>  
						<!-- <div class="control-group">
						  <label class="control-label" for="description">Keyword:</label>
						  <div class="controls">
							<input type="text" id="description" name="keyword(SEO)">
						  </div>
						</div> -->
						<div class="control-group">
						  <label class="control-label" for="xaid">Sức Chứa:</label>
						  <div class="controls">
							<input type="number" id="xaid" name="capacity">
						  </div>
						</div>   
						<div class="control-group">
						  	<label class="control-label" for="status">Public BV:</label>
						  	<label class="controls radio-inline">
								<input type="radio" name="status" value="0" id="status" checked="checked">Ẩn	
							</label>	
							<label class="controls radio-inline">
								<input type="radio" name="status" value="1" id="status">Public
							</label>
						</div>
						<div class="form-actions">
						 <button type="submit" class="btn btn-primary">ADD</button>
						  <button type="reset" class="btn">Hủy</button>
						</div>
					  </fieldset>
					</form> 
					 
				</div>
			</div>
		</div>
		<div>
			<a class="btn btn-primary" href="{{url('/admin/homestay/DSroomstyle')}}"><--</a>
		
		</div>
	</div>
	
	
@endsection
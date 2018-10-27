@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
        <span class="text-capitalize">Sensor</span>
	  </h1>
	  <ol class="breadcrumb">
	  	<li></li>
	  </ol>
	</section>
@endsection



@section('content')
<div class="row">
	<div class="col-md-12">
		  
		  <div class="box">
		    <div class="box-header with-border">
			    	<!-- Single button -->
					<div class="btn-group pull-right">
					  <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <span>asdgfg</span>
					  </button>
					  <ul class="dropdown-menu">
					 <li><a href="">dfgsdfg</a></li>
					  </ul>
					</div>
					<h3 class="box-title" style="line-height: 30px;">Sensor  {{ $id}}</h3>
					<!-- <h3 class="box-title">Sensor</h3> -->
		    </div>
		    <div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
		      <!-- load the view from the application if it exists, otherwise load the one in the <!--  -->
		    </div><!-- /.box-body -->

            <div class="box-footer">
            	<p>Buttons</p>

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
	</div>
</div>
@endsection

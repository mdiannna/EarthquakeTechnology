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
	@foreach('App\Models\Sensor'::all() as $sensor)
	<div class="col-md-6 col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<!-- Single button -->
				<div class="btn-group pull-right">
					  <!-- <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <span>{{ $sensor->name }}</span>
					</button> -->
					<!--   <ul class="dropdown-menu">
					 <li><a href="">dfgsdfg</a></li>
					</ul> -->
				</div>
				<h3 class="box-title" style="line-height: 30px;">{{$sensor->name }}</h3>
				<!-- <h3 class="box-title">Sensor</h3> -->
			</div>
			<div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
				<div class="col-md-12 col-xs-12 col-lg-12">


					@foreach('App\Models\SensorData'::where('sensor_id', $sensor->id)->orderBy('created_at', 'desc')->limit(1)->get() as $sensorData)

						@if($loop->index==0)
						<strong>
							<h3 class="text-big">{{ $sensorData->val1 }} &nbsp;&nbsp;&nbsp;{{ $sensorData->val2 }} &nbsp;&nbsp;&nbsp;{{ $sensorData->val3 }}</h3>
						</strong>
						@else
						<p>{{ $sensorData->val1 }} &nbsp;&nbsp;&nbsp;{{ $sensorData->val2 }} &nbsp;&nbsp;&nbsp;{{ $sensorData->val3 }}</p>
						@endif

	                @endforeach
					<div class="container"></div>

		    			<!-- <div class="implementations-chart-container">
	                        <div id="implementations-report"></div>
	                    </div> -->
	                    <!-- <h1>Sensor 1</h1> -->
	                </div>
	            </div><!-- /.box-body -->

	            <div class="box-footer">
	            	<p>Status: Active</p>

	            </div><!-- /.box-footer-->
	       	</div><!-- /.box -->

	    <!-- </div> -->
	</div>
	@endforeach


	<div class="col-md-6 col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<!-- Single button -->
				<div class="btn-group pull-right">
					  <!-- <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <span>{{ $sensor->name }}</span>
					</button> -->
					<!--   <ul class="dropdown-menu">
					 <li><a href="">dfgsdfg</a></li>
					</ul> -->
				</div>
				<h3 class="box-title" style="line-height: 30px;">Light </h3>
				<!-- <h3 class="box-title">Sensor</h3> -->
			</div>
			<div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
				<div class="col-md-12 col-xs-12 col-lg-12">

					<img id="bec" src="img/bec/{{$intensity}}.png" class="img img-responsive">
			
	            </div><!-- /.box-body -->

	            <div class="box-footer">
	
	            </div><!-- /.box-footer-->
	       	</div><!-- /.box -->

		    <!-- </div> -->
		</div>
	</div>


	<div class="col-md-12 col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<!-- Single button -->
				<div class="btn-group pull-right">
					  <!-- <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <span>{{ $sensor->name }}</span>
					</button> -->
					<!--   <ul class="dropdown-menu">
					 <li><a href="">dfgsdfg</a></li>
					</ul> -->
				</div>
				<h3 class="box-title" style="line-height: 30px;">Energy</h3>
				<!-- <h3 class="box-title">Sensor</h3> -->
			</div>
			<div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
				<div class="col-md-12 col-xs-12 col-lg-12">

					<div id="energy_container"></div>
			
	            </div><!-- /.box-body -->

	            <div class="box-footer">
	
	            </div><!-- /.box-footer-->
	       	</div><!-- /.box -->

		    <!-- </div> -->
		</div>
	</div>


 <script type="text/javascript" src="js/echarts.min.js"></script> 
<!-- <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script> -->
<!-- <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>

 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.common.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<style type="text/css">
.container {
	width: 100%;
	height:30vh;
}

#energy_container {
	width: 100%;
	height:30vh;
}
</style>
<script>

	var data = null;
	var light = 1;
	var energy = [];


	var dom = document.getElementsByClassName("container");
	var energyDom = document.getElementById("energy_container");

	var colors = ["red", "blue", "green", "red", "blue", "orange", "green", "red", "blue", "green", "red", "blue", "green", "orange"];

	var options = [null, null, null];

	for(var i=0; i<dom.length; i++) {
		options[i] = {
			color: colors[i],
			xAxis: {
				type: 'category',
				// data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    data: [1,2,3,4,5,6,7,8,9,10]
			},
			yAxis: {
				type: 'value'
			},
			series: [{
				// data: [120 + i, 932 + i, 901, 934, 1290, 1330, 1320 + i*300, 100, 100, 100],
				data: [0,0,0,0,0,0,0,0,0,0],
				type: 'line'
			}]
		};
	};


	var optionTest = {
			color: "yellow",
			xAxis: {
				type: 'category',
				// data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    data: [1,2,3,4,5,6,7,8,9,10]
			},
			yAxis: {
				type: 'value'
			},
			series: [{
				// data: [120 + i, 932 + i, 901, 934, 1290, 1330, 1320 + i*300, 100, 100, 100],
				data: [0,0,0,0,0,0,0,0,0,0],
				type: 'line'
			}]
		};


		var optionsEnergy = {
			color: "yellow",
			xAxis: {
				type: 'category',
				// data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    data: [1,2,3,4,5,6,7,8,9,10]
			},
			yAxis: {
				type: 'value'
			},
			series: [{
				// data: [120 + i, 932 + i, 901, 934, 1290, 1330, 1320 + i*300, 100, 100, 100],
				data: [0,0,0,0,0,0,0,0,0,0],
				type: 'line'
			}]
		};


	var myCharts = [null, null, null];
	var energyChart = null;

	for(var i=0; i<dom.length; i++) {
		myCharts[i] = echarts.init(dom[i]);
		var app = {};
		// option = null;
		
	
		if (options[i] && typeof options[i] === "object") {
			myCharts[i].setOption(options[i], true);
		}

		energyChart = echarts.init(energyDom);

	}

	function getData() {
		// axios.get('http://127.0.0.1:8000/devices/values')
		axios.get("{{env('SERVER_URL')}}/devices/values")
		.then((response) => {
			data = response.data;
			for(var k=0; k<data.length; k++) {

				data[k] = data[k].reverse();
			}

		// console.log(response)
		console.log(data);
		// console.log(json_decode(data));
		// console.log(JSON.parse(data));
		})
		.catch(function (error) {
			console.log(error);
		});
	}


	function getLight() {
		axios.get("{{env('SERVER_URL')}}/light")
		.then((response) => {
			light = response.data;
			document.getElementById("bec").src="img/bec/" + light + ".png";

		// console.log(response)
		console.log(data);
		// console.log(json_decode(data));
		// console.log(JSON.parse(data));
		})
		.catch(function (error) {
			console.log(error);
		});
	}


	function getEnergy() {
		axios.get("{{env('SERVER_URL')}}/energy")
		
		// axios.get('http://127.0.0.1:8000/energy')
		.then((response) => {
			energy = response.data;
			// document.getElementById("bec").src="img/bec/" + light + ".png";

		// console.log(response)
		console.log(data);
		// console.log(json_decode(data));
		// console.log(JSON.parse(data));
		})
		.catch(function (error) {
			console.log(error);
		});
	}



	setInterval(() => {
		getData();
		getLight();
		getEnergy();

	for(var i=0; i<dom.length; i++) {
	
		if (options[i] && typeof options[i] === "object") {

			// console.log(data);

		// console.log(optionTest.series);
		// console.log(optionTest.series[0]);

		// if(optionTest.series[0]) {
		options[i].series[0].data = data[i];

		// optionTest.series[0].data = data[i];
	// }
		// myCharts[i].setOption(optionTest);
		myCharts[i].setOption(options[i]);

			// myCharts[i].setOption(options[i], true);
		}



		// Energy chart
		optionsEnergy.series[0].data = energy;
		energyChart.setOption(optionsEnergy);
	}
		
	}, 5000);
</script>
@endsection

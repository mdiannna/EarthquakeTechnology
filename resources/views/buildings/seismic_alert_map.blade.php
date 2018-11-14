@extends('layout')

@section('content')

<div class="container pt-4 pb-4">
	<section class="section pt-3 pb-3">
		<div class="text-center">
			<h1 class="text-center">Clădiri cu bulină roşie</h1>
			<h4 class="text-danger"><strong>Cât de vulnerabile sunt clădirile din Bucureşti?</strong></h4>
			<!-- <p class="pt-3">There are some simple rules that you can follow to prepare for the earthquake. Watch the video to see them</p> -->


			<p>Vezi <a href="http://seismic-alert.ro/">aici</a> harta clădirilor cu bulină din Bucureşti</p>

			<a class="btn btn-primary" href="http://seismic-alert.ro/">Vezi harta interactivă</a>

			<div class="container pt-2 col-md-12">
				<img class="img img-responsive" src="img/seismic-alert.png">
			</div>
			<!-- <div class="embed-responsive embed-responsive-16by9">
	  			<iframe class="embed-responsive-item" src="http://seismic-alert.ro/" />
				</iframe>
			</div> -->
		</div>
		<div class="pt-3">
		</div>
	</section>

</div>

</style>
@endsection

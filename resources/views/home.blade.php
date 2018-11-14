@extends('layout')

@section('content')
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1>Earthquake Awareness</h1>
            <p>Bucureştiul este capitala europeană cu cel mai mare risc seismic. Oficial, sunt peste 350 de clădiri cu risc ridicat de prăbușire în cazul unui cutremur major. Mai exact, Bucureștiul are aproximativ 6000 de apartamente expuse unui risc iminent, la care se adaugă spațiile comune, zonele comerciale, restaurantele, barurile, spațiile de lucru și birourile cuprinse în aceste clădiri.</p>
            @auth
            <a href="/" class="btn btn-custom btn-lg page-scroll">Go to dashboard</a> </div>

            @else
            <a href="{{route('alert-map')}}" class="btn btn-custom btn-lg page-scroll">Sunt în pericol!</a> </div>
            @endauth
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8">
        <h3>Codul nostru este open source. Contribuie şi tu!</a></h3>
        <!-- <p>Get started today and complete our form to request your free estimate</p> -->
      </div>
      <div class="col-xs-12 col-md-4 text-center"><a href="https://github.com/mdiannna/EarthquakeTechnology" class="btn btn-custom btn-lg page-scroll" target="_blank">Vezi Codul</a></div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="section-title">
      <h2>Senzori</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="service-media"> <img src="img/sensors/sensor1.gif" alt=" "> </div>
        <div class="service-desc">
          <h3 class="text-center">MPU6050 - Accelerometru  şi Giroscop</h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p> -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-media"> <img src="img/sensors/sensor2.gif" alt=" "> </div>
        <div class="service-desc">
          <h3 class="text-center">Senzori de temperatură şi detecţie gaz</h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-media"> <img src="img/sensors/sensor3.gif" alt=" "> </div>
        
        <div class="service-desc">
          <h3 class="text-center">Senzor de distanţă</h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p> -->
        </div>
      </div>
    </div>
    
  </div>
</div>

<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <!-- <div class="col-xs-12 col-md-6"> <img src="img/team.jpg" class="img-responsive" alt=""> </div> -->
      <div class="col-xs-12 col-md-6"> <img src="img/team4.jpg" class="img-responsive" alt=""> </div>

      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Cine suntem?</h2>
          <!-- <p>Our amazing team builds the next smart home for you. We put a lot of passion in what we do and we are having a lot of fun this weekend</p> -->
          <h3>Membrii echipei de dezvoltatori</h3>
          <div class="list-style">
            <div class="col-lg-12 col-sm-12 col-xs-12">
              <ul>
                 <li><strong>Marusic Diana</strong> [Backend şi Inteligenţă Artificială]
                <li><strong>Cotov Anastasia</strong> [Embedded Apps Engineer şi Marketing (part-time 2h)]</li>
                <li><strong>Popa Vlad</strong> [JavaScript şi Blockchain]</li>
                <li><strong>Dobre Marius</strong> [Animatii 3D]</li>
                <li><strong>Coroliova Aliona</strong> [Reserch şi business]</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
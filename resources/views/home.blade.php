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



<div class="container pt-4 pb-4">
  <section class="section pt-3 pb-3">
    <div class="text-center">
      <h1 class="text-center">Înainte de cutremur</h1>
      <h4 class="text-success"><strong>Cum te pregăteşti înainte de cutremur?</strong></h4>
      <p class="pt-3">Există câteva reguli simple să te pregăteşti de un cutremur. Vezi un video pentru a fi mai pregătit(ă)</p>
      <a href="{{route('before-earthquake')}}" class="btn btn-success btn-lg">Vezi video</a>

      <h4 class="text-danger pt-3"><strong>Clădiri cu bulină roşie</strong></h4>
      <p class="pt-3">Informează-te dacă stai într-un bloc cu grad înalt de risc seismic. Există o hartă a acestor clădiri din Buucreşti</p>
      <a href="{{route('seismic-alert-map')}}" class="btn btn-danger btn-lg">Vezi harta</a>

    </div>
  </section>

  <hr>

  <section class="section pt-3 pb-3 text-center">
    <h1 class="text-center">În timpul unui cutremur</h1>
    <h4 class="text-warning text-center"><strong>Senzori pe clădiri - alertare preventivă + eficientizare intervenţie</strong></h4>
    <p class="pt-3">Utilizăm plăcuţe Arduino, sensori accelerometri şi giroscop, sensori de gaz şi module Wi-fi pentru a colecta date despre gradul de afectare a clădirilor în timpul unui cutremur şi trimitem aceste date către echipele de intervenţie.
    </p>
    
    <a href="{{route('hardware.about')}}" class="btn btn-warning btn-lg">Vezi mai multe detalii aici</a>
    
  </section>

  <hr>

  <section class="section pt-3 pb-3">
    <h1 class="text-center">După cutremur</h1>
    <div class="pt-3 pb-3 text-center">
      <h4 class="text-danger"><strong>Harta alertelor - trimite locaţia ta pentru a ajuta echipele de intervenţie să te găsească</strong></h4>
      <a href="{{route('alert-map')}}" class="btn btn-danger btn-lg">Sunt în pericol!</a>
    </div>
    <br>

 <!--    <div class="pt-3 pb-3 text-center">
      <h4 class="text-info"><strong>Using AI to prioritize alerts for intervention teams </strong></h4>
      <p>We use IBM Natural Language Understanding to prioritize alerts for intervention teams based on sentiment and emotion analysis, tracking mostly the negative sentiment and emotions of fear during the earthquake </p>
      <a href="{{route('alert-info')}}" class="btn btn-info text-center"> View alerts</a>
    </div> -->

<!--     <div class="pt-3 pb-3 text-center">
      <h4 class="text-primary"><strong>Intelligent Assistant to ease communication and determine needs</strong></h4>
      <p>IBM Watson Conversation AI provides a more natural way for people affected by the earthquake to send their needs to the intervention teams</p>

      <a href="{{route('watson-ai')}}" class="btn btn-primary text-center"> Start chat</a>
    </div>

 -->    <div class="pt-3 pb-3 text-center">
      <h4 class="text-warning"><strong>Urmărim cele mai recente cutremure</strong></h4>
      <p>Vezi lista celor mai recente cutremure în România şi în lume</p>
      <p>Sursa: <i>http://www.seismicportal.eu</i></p>
      <div class="row text-center">
        <!-- <div class="col-md-6 md-offset-3"> -->
          <div class="col-md-3 offset-md-3 md-offset-3 pt-1 pb-1">
            <a href="{{route('earthquakes.all')}}" class="btn btn-warning text-center"> Cutremure recente</a>
          </div>
          <div class="col-md-3 pt-1 pb-1">
            <a href="{{route('earthquakes.romania')}}" class="btn btn-warning text-center"> Cutremure recente în Romania</a>
          </div>
        </div>        
      <!-- </div> -->
    </div>
    
  </section>

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
                <li><strong>Cotov Anastasia</strong> [Embedded Apps]</li>
                <li><strong>Popa Vlad</strong> [Full stack şi Blockchain]</li>
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
@extends('layouts.app')

@section('styling')
<link rel='stylesheet' href='/css/all.css'>
<link rel="stylesheet" href="/css/myc.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
@endsection

@section('content')
<nav class="main-menu">
  <input id="mbtn" class="mbtn" type="checkbox"/>
  <label class="mico" for="mbtn">
    <span class="nico">-</span>
  </label>
  <img src="../img/tlg.png" alt="logo">
  <div class="dl"></div>
  <ul class="menu">
    <li>
      <a href="../home">
        <i class="fas fa-ice-cream fa-2x"></i>
        <span class="nav-text">Home</span>
      </a>
    </li>
    <li >
      <a href="../rec">
        <i class="fas fa-bacon fa-2x"></i>
        <span class="nav-text">Recipes</span>
      </a>
    </li>
    <li >
      <a href="../myc">
        <i class="fas fa-drumstick-bite fa-2x active"></i>
        <span class="nav-text activeB">Community</span>
      </a>
    </li>
    <li>
      <a href="../cb">
        <i class="fas fa-candy-cane fa-2x"></i>
        <span class="nav-text">My Cookbooks</span>
      </a>
    </li>
    <li>
      <a href="../shopl">
        <i class="fas fa-carrot fa-2x"></i>
        <span class="nav-text">Shopping List</span>
      </a>
    </li>
    <li>
      <a href="../art">
        <i class="fas fa-pepper-hot fa-2x"></i>
        <span class="nav-text">Articles</span>
      </a>
    </li>
  </ul>
  <ul class="logout menu">
    <li>
      <a href="../contact">
        <i class="fas fa-hamburger fa-2x"></i>
        <span class="nav-text">Contact Us</span>
      </a>
    </li>
    <li>
      <a href="../usrpref">
        <i class="fas fa-hotdog fa-2x"></i>
        <span class="nav-text">Preferences</span>
      </a>
    </li>
    <li>
      <a href="../logout">
        <i class="fas fa-lemon fa-2x"></i>
        <span class="nav-text">Logout</span>
      </a>
    </li>
  </ul>
</nav>
<main class="area">
  <section>
    <div class="create-wrapper">
      <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
      <div class="create">
        <a href="/myc/create">Create<br>Recipe</a>
      </div>
    </div>
    <div class="jcarousel-wrapper">
      <div class="jcarousel" data-jcarousel="true">
        <ul id="myrec">
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 1" class="img-thumbnail img-responsive"></li>
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 2" class="img-thumbnail img-responsive"></li>
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 3" class="img-thumbnail img-responsive"></li>
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 4" class="img-thumbnail img-responsive"></li>
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 5" class="img-thumbnail img-responsive"></li>
          <li><img src="https://www.fillmurray.com/g/300/150" alt="Image 6" class="img-thumbnail img-responsive"></li>
        </ul>
      </div>
      <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
    </div>
  </section>
  <section>

  </section>
</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://sorgalla.com/jcarousel/dist/jquery.jcarousel.min.js'>
</script><script  src="/js/scroller.js"></script>
@endsection

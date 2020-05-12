@extends('layouts.app')

@section('styling')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel='stylesheet' href='/css/all.css'>
<link rel="stylesheet" href="/css/indrec.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
@endsection

@section('content')
<nav class="main-menu">
  <input id="mbtn" class="mbtn" type="checkbox"/>
  <label class="mico" for="mbtn">
    <span class="nico">-</span>
  </label>
  <img src="/img/tlg.png" alt="logo">
  <div class="dl"></div>
  <ul class="menu">
    <li>
      <a href="../home">
        <i class="fas fa-ice-cream fa-2x"></i>
        <span class="nav-text">Home</span>
      </a>
    </li>
    <li>
      <a href="../rec">
        <i class="fas fa-bacon fa-2x active"></i>
        <span class="nav-text activeB">Recipes</span>
      </a>
    </li>
    <li>
      <a href="../myc">
        <i class="fas fa-drumstick-bite fa-2x"></i>
        <span class="nav-text">Community</span>
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
  <section id="rec_grid">

  </section>
  <section id="sim">
    <h1>Save and try for next time?</h1>
    <div id="sim_grid">

    </div>
  </section>
</main>
<script type="text/javascript">
  const cID = parseInt("<?php echo Auth::user()->id;?>");
  const rid = parseInt(<?php echo $rid ?>);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/indrec.js"></script>
@endsection

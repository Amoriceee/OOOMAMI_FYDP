@extends('layouts.app')

@section('styling')
<link rel='stylesheet' href='/css/all.css'>
<link rel="stylesheet" href="/css/art.css">
<link rel="stylesheet" href="/css/navbar.css">
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
        <i class="fas fa-pepper-hot fa-2x active"></i>
        <span class="nav-text activeB">Articles</span>
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
  <section class="grid-container">
    <div class="sbt">
      <a href="/art/1">
        <div class="sbt-tag">
          <h2>FOOD</h2>
        </div>
        <div class="sbt-img">
        </div>
        <div class="sbt-des">
          <h3>WHAT TYPE OF ACID ARE YOU</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/2">
        <div class="bt-img imgl"/>
        </div>
        <div class="bt-des">
          <h3>AVOCADO DOH DOH</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/3">
        <div class="bt-img imgc">
        </div>
        <div class="bt-des">
          <h3>TO CONE OR NOT TO CONE</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/4">
        <div class="bt-img imgr">
        </div>
        <div class="bt-des">
          <h3>BANANANANANANA</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/5">
        <div class="bt-img imglt"/>
        </div>
        <div class="bt-des">
          <h3>PAPYAYAYAYAYAYA</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/6">
        <div class="bt-img imgct">
        </div>
        <div class="bt-des">
          <h3>SPONGEBOBS  HOME</h3>
        </div>
      </a>
    </div>
    <div class="bt">
      <a href="/art/7">
        <div class="bt-img imgrt">
        </div>
        <div class="bt-des">
          <h3>SWEET OR SOUR</h3>
        </div>
      </a>
    </div>
  </section>
  <section class="grid-container-second">
    <div class="fbt">
      <div class="sbt-tag">
        <h2>LIFESTYLE</h2>
      </div>
      <a href="/art/8">
        <button type="button">SPICE</button>
      </a>
    </div>
    <div class="bbt">
      <div class="sbt-tag">
        <h2>CULTURE</h2>
      </div>
      <a href="/art/9">
        <h3>COFFEE OR COVFEFE??</h3>
      </a>
    </div>
  </section>
</main>
@endsection

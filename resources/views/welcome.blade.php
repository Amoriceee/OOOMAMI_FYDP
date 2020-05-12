@extends('layouts.app')

@section('styling')
  <link rel='stylesheet' href='/css/all.css'>
  <link rel='stylesheet' href='/css/animate.css'>
  <link rel="stylesheet" href="/css/welcome.css">
  <link rel="stylesheet" href="/css/glide.core.min.css">
@endsection

@section('content')
<header>
  <section id="sectionA">
    <div class="fl wow fadeIn">
      <img src="/img/nlg.png" class="fl" alt="logo"/>
    </div>
    <div class="mt wow fadeIn">
      <h1>THE OOO-MAMI EXPERIENCE</h1>
      <h2>& COMPLETLY FREE</h2>
      <p>From recipe recommendations just for you, to handy tools and helpful videos, OOO-MAMI has everything you need to improve life in the kitchen!</p>
    </div>
    <div class="lb wow fadeIn">
      <a href="/register" class="jn">Join now!</a>
    </div>
    <div class="fom wow bounceIn">
      <a href="#sectionC">
        <p class="fom">find out more<br><i class="fas fa-sort-down"></i></p>
      </a>
    </div>
  </section>
</header>
<main>
  <section id="sectionB">
    <div>
      <h1>DISCOVER</h1>
      <h2>RECIPES FROM PROFESSIONALS</h2>
      <div class="disexp"></div>
    </div>
    <div class="pushY">
      <h1>EXPLORE</h1>
      <h2>COMMUNITY CREATIONS</h2>
      <div class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide"><div class="ccc"></div></li>
            <li class="glide__slide"><div class="ccc c2"></div></li>
            <li class="glide__slide"><div class="ccc c3"></div></li>
            <li class="glide__slide"><div class="ccc c4"></div></li>
            <li class="glide__slide"><div class="ccc c5"></div></li>
            <li class="glide__slide"><div class="ccc c6"></div></li>
            <li class="glide__slide"><div class="ccc c7"></div></li>
            <li class="glide__slide"><div class="ccc c8"></div></li>
            <li class="glide__slide"><div class="ccc c9"></div></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="pushY">
      <h1>CREATE</h1>
      <h2>THE PERFECT MEAL</h2>
      <div class="disexp d2"></div>
    </div>
  </section>
  <section id="sectionC">
    <h1>About Us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </section>
</main>
<script src="js/fade-script.js"></script>
<script src="js/glide.min.js"></script>
<script>
  var options =
  {
    type: 'carousel',
    perView: 5,
    autoplay: 0.5,
    animationDuration: 3400,
    animationTimingFunc: 'linear',
    breakpoints: {
      800: {
        perView: 1,
        autoplay: 1
      }
    }
  }
  new Glide('.glide', options).mount()
</script>
@endsection

@extends('layouts.app')

@section('styling')
<link rel='stylesheet' href='/css/all.css'>
<link rel="stylesheet" href="/css/home/home.css">
<link rel="stylesheet" href="/css/home/feapho.css">
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
        <i class="fas fa-ice-cream fa-2x active"></i>
        <span class="nav-text activeB">Home</span>
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
  <section class="featured-content">
    <h1>Top Pick Just For<br><a>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a></h1>
    <div class="container">
      <div class="con con-a">
        <div class="fea-pho">
          <div class="pho">
            <img src="/img/feapho-burger.jpg" alt="" />
          </div>
          <div class="mins">
            <div class="smins">
              <h3>45</h3>
              <p>MINS</p>
            </div>
            <div class="smins">
              <h3>2</h3>
              <p>SERVINGS</p>
            </div>
          </div>
          <div class="fea-desc">
            <h3>THE ONLY BURGER</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis est est aliquam, sed faucibus massa lobortis. Maecenas non est justo.</p>
          </div>
        </div>
        <div class="rec-ing">
          <div class="rec-ing-main">
            <div class="tab">
              <button class="tablinks" id="rBut">RECIPIE</button>
              <button class="tablinks" id="iBut">INGREDIENTS</button>
            </div>
            <div id="Recipie" class="tabcontent">
              <h3>Step 1</h3>
              <p>Put the mince in a bowl and add a splash of Worcestershire sauce, the mustard, garlic salt and a good grind of pepper. Mix well with clean hands then divide into 4 balls.</p>
              <h3>Step 2</h3>
              <p>Take each ball, divide in two, then shape into thin patties. The easiest way to do this is to put the balls between clingfilm and use a pan to press into a flat patty.</p>
              <h3>Step 3</h3>
              <p>Cut a cheese slice into 4, then stack them in the middle of a patty. Put the other patty on top then pat down and pinch the edges so the cheese is completely enclosed.</p>
              <h3>Step 4</h3>
              <p>Heat a large, non-stick frying pan. Oil and season the burgers then add to the pan and fry for 4 minutes each side.</p>
              <h3>Step 5</h3>
              <p>Put some lettuce and tomato on the base of each bun. Sit the burgers on top, then add onion and gherkins to finish.</p>
            </div>
            <div id="Ingredients" class="tabcontent">
              <p><span>500g</span> beef mince</p>
              <p>Worcestershire sauce</p>
              <p><span>1 tsp</span> Dijon mustard</p>
              <p><span>1/2 tsp</span> garlic salt</p>
              <p><span>4</span> cheese slices</p>
              <p>oil <span>for frying</span></p>
              <p><span>1</span> little gem lettuce <span>shredded</span></p>
              <p><span>1</span> large tomato <span>sliced to serve</span></p>
              <p><span>4</span>burger buns </span>toasted</span></p>
              <p><span>1</span> red onion </span>sliced</span></p>
              <p></span>sliced</span> gherkin <span>to serve</span></p>
            </div>
          </div>
          <div class="open-fea-pho">
            <a href="#" onclick="open_close()"><i class="material-icons">&#xE314;</i></a>
          </div>
        </div>
      </div>
    </div>
    <form id="rec-sea" class="search-container">
      {{ csrf_field() }}
      <input type="text" id="search-bar" placeholder="What are we eating today?">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </section>
  <section id="feed" class="feed">
    <h1>Share your plate?</h1>
    <form id="feed-form" action="{{url('/home')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <input class="form-control" type="file" id="feed-image" name="feed-image"/>
        <label for="feed-image"><i class="fas fa-arrow-circle-down"></i><i class="fas fa-arrow-circle-down"></i><i class="fas fa-arrow-circle-down"></i></label>
      </div>
      <div class="form-group">
        <input class="form-control" id="feed-submit" type="submit" value="UPLOAD" name="submit"/>
      </div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </form>
    <div class="feed-set">
      <ul>
        <li>
          <button id="ff" class="fsbut fs-active">FOOD FEED</button>
        </li>
        <li>
          <button id="mf" class="fsbut">MY POSTS</button>
        </li>
      </ul>
    </div>
    <div id="feed-container" class="feed-container">
      <ul class="posts" id="feed-posts">
      </ul>
      <p class="no-posts">Sorry... there are no more posts to show right now.</p>
    </div>
    <div id="my-feed-container" class="my-feed-container">
      <ul class="posts" id="my-feed-posts">
      </ul>
      <p class="no-posts">Sorry... there are no more posts to show right now.</p>
    </div>
  </section>
</main>
<script type="text/javascript">
    var cID = parseInt("<?php echo Auth::user()->id;?>");
</script>
<script src="/js/feapho.js"></script>
<script src="/js/feapho-tab.js"></script>
<script src="/js/seabar.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="/js/feed.js"></script>
<script src="/js/feed-filechange.js"></script>
@endsection

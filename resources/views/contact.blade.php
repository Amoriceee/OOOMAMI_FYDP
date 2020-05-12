@extends('layouts.app')

@section('styling')
<link rel='stylesheet' href='/css/all.css'>
<link rel='stylesheet' href='/css/accordion.min.css'>
<link rel="stylesheet" href="/css/contact.css">
<link rel="stylesheet" href="/css/navbar.css">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
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
        <i class="fas fa-pepper-hot fa-2x"></i>
        <span class="nav-text">Articles</span>
      </a>
    </li>
  </ul>
  <ul class="logout menu">
    <li>
      <a href="../contact">
        <i class="fas fa-hamburger fa-2x active"></i>
        <span class="nav-text activeB">Contact Us</span>
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
  <section id="section-a">
<h1>GET IN TOUCH</h1>
<p>If you have any questions, queries, comments or concerns, please don’t hesitate to contact us. You can reach us by email by filling out the form below, or alternatively, you can call us on the numbers listed. We’re also pretty responsive on Facebook, Twitter, WhatsApp and text if any of those methods of communication tickle your fancy.</p>
</section>
<!-- SectionB: CONTACTS -->
<section id="section-b" class="grid">
    <div class="content-wrap">
    <ul>
      <li>
        <div class="card">
          <h2>EMAIL</h2>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="inner-wrap">
              <p><img class="icons" src="/img/email-icon.png" alt=""/> testing@gmail.com</p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="card">
          <h2>PHONE</h2>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="inner-wrap">
              <p><img class="icons" src="/img/phone-icon.png" alt=""/> testing@gmail.com</p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="card">
          <h2>SOCIAL MEDIA</h2>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="inner-wrap">
              <p><img class="icons" src="/img/facebook-icon.png" alt=""/><img class="icons" src="/img/insta-icon.png" alt=""/><img class="icons" src="/img/twitter-icon.png" alt=""/></p>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>
<section id="contactSection" class="contactus">
    <h1>WE ARE HAPPY TO HELP</h1>
    <form action="{{ url('/contact#contactSection') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col25">
          <label name="subject">Subject:</label>
        </div>
        <div class="col75">
          <input id="subject" name="subject" class="form-control" autocomplete="off">
        </div>
      <div class="col25">
      </div>
    </div>
      <div class="row">
        <div class="col25">
          <label name="subject">Message:</label>
        </div>
        <div class="col75">
          <textarea id="message" name="message" class="form-control"></textarea>
        </div>
        <div class="col25">
        </div>
      </div>
      <div class="row">
        <div class="col25">
        </div>
        <div class="col75">
          <input class="subBtn" type="submit" value="SEND MESSAGE"/>
        </div>
      </div>
      <div class="row">
        <div class="col25">
        </div>
        <div class="col75">
          <div class="content-wrap">
          @error('name')
              <div class="alertMessage">{{ $message }}</div>
          @enderror
          @error('email')
              <div class="alertMessage">{{ $message }}</div>
          @enderror
          @error('subject')
              <div class="alertMessage">{{ $message }}</div>
          @enderror
          @error('message')
              <div class="alertMessage">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </form>
</section>
<section class="whiteDiv">
  @if(Session::has('message'))
    <div class="alertSuccess">
        <p>{{ Session::get('message') }}</p>
    </div>
  @endif
</section>
<section id="section-d" class="psspec">
  <div class="lineY"></div>
  <h2>FAQ</h2>
  <div class="accordion-container2">
      <div class="panel2">
          <div class="heading2">FAQ 1</div>
          <div class="content2">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
      </div>
      <div class="panel2">
          <div class="heading2">FAQ 2</div>
          <div class="content2">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
      </div>
      <div class="panel2">
          <div class="heading2">FAQ 3</div>
          <div class="content2">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
      </div>
      <div class="panel2">
          <div class="heading2">FAQ 4</div>
          <div class="content2">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
      </div>
    </div>
</section>
</main>
<script type="text/javascript">
    var cID = parseInt("<?php echo Auth::user()->id;?>");
</script>
<script src="/js/accordion2.min.js"></script>
<script>
    var accordion2 = new Accordion('.accordion-container2');
</script>
@endsection

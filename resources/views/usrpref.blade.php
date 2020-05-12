@extends('layouts.app')

@section('styling')
<link rel='stylesheet' href='/css/all.css'>
<link rel="stylesheet" href="/css/usrpref.css">
<link rel="stylesheet" href="/css/navbar.css">
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
        <i class="fas fa-hamburger fa-2x"></i>
        <span class="nav-text">Contact Us</span>
      </a>
    </li>
    <li>
      <a href="../usrpref">
        <i class="fas fa-hotdog fa-2x active"></i>
        <span class="nav-text activeB">Preferences</span>
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
  @if ($errors->any())
  <ul class="err">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  @endif
  <section class="up-content">
    <div class="mdil">
      <div class="mddp">
          <h2>Profile Picture</h2>
          <div id="usr_dp">
            <div class="resx">
              <a href="/dpreset">x</a>
            </div>
          </div>
          <form id="cdp" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <input class="form-control" type="file" id="profile-image" name="profile-image"/>
              <label for="profile-image">Select New Profile Picture</label>
            </div>
            <div class="form-group">
              <input class="form-control" id="profile-submit" type="submit" value="SET PROFILE PICTURE" name="submit"/>
            </div>
          </form>
      </div>
      <div class="mddpass">
        <h2>Update Password</h2>
        <form id="mddpass" action="" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="password" placeholder="Current Password" name="oldp"/>
          <input type="password" placeholder="New Password" name="newp" />
          <input type="password" placeholder="Confirm New Password" name="newp_confirmation">
          <input type="submit" name="submit" value="CHANGE PASSWORD">
        </form>
      </div>
    </div>
    <div class="mddie">
      <form id="mdint" action="" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

      </form>
    </div>
    <div class="mddie">
      <form id="mddie" action="" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

      </form>
    </div>
  </section>
</main>
<script type="text/javascript">
    var cID = parseInt("<?php echo Auth::user()->id;?>");
    var dpp = "<?php echo Auth::user()->dp_path;?>";
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/feed-filechange.js"></script>
<script src="/js/usrpref.js"></script>
@endsection

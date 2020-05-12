@extends('layouts.app')

@section('styling')
  <link rel='stylesheet' href='/css/all.css'>
  <link rel='stylesheet' href='/css/animate.css'>
  <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
<div class="container">
  <div class="card-header"><img class="top-logo" src="/img/tlg.png" alt="logo"></div>
  <div class="card-body">
    <form id="regForm" method="POST" action="{{ route('register') }}">
      @csrf
      <!-- Tab One -->
      <div class="tab tone">
        <div class="form-group row">
            <div class="col-md-6">
                <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
      </div>
      <!-- Tab Two -->
      <div class="tab ttwo">
        <div class="ppbox">
          <h2>Privacy Policy</h2>
          <p>Your privacy is important to us. It is OOOMAMI's policy to respect your privacy regarding any information we may collect from you across our website, <a href="http://ooomami.com">http://ooomami.com</a>, and other sites we own and operate.</p>
          <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</p>
          <p>We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorised access, disclosure, copying, use or modification.</p>
          <p>We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</p>
          <p>Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>
          <p>You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</p>
          <p>Your continued use of our website will be regarded as acceptance of our practices around privacy and personal information. If you have any questions about how we handle user data and personal information, feel free to contact us.</p>
          <p>This policy is effective as of 1 January 2020.</p>
        </div>
        <input id="ppcheck" type="checkbox" class="form-control" required>
        <div class="ppcheck-text">I have read and agree to the Privacy Policy</div>
      </div>

      <div class="buttonbox">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>

      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>
  </div>
</div>
<script src="/js/multistep.js"></script>
@endsection

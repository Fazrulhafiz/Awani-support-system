@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Meta title & meta -->
        @meta

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        {{ Html::script(mix('assets/asa/js/gijgo.js')) }}

        <style>
              html, body {
                  background-color: #fff;
                  color: #636b6f;
                  font-family: 'Raleway', sans-serif;
                  font-weight: 100;
                  /* height: 100vh; */
                  margin: 0;
              }
              .flex-center {
                  align-items: center;
                  display: flex;
                  justify-content: center;
              }

              .position-ref {
                  position: relative;
              }

              .top-right {
                  position: absolute;
                  right: 10px;
                  top: 18px;
              }
              .links > a {
                  color: #636b6f;
                  padding: 0 25px;
                  font-size: 12px;
                  font-weight: 600;
                  letter-spacing: .1rem;
                  text-decoration: none;
                  text-transform: uppercase;
              }
        </style>
        {{ Html::style(mix('assets/asa/css/awani.css')) }}
        {{ Html::style(mix('assets/asa/css/gijgo.css')) }}
    </head>
    <body>
          <div class="flex-center">
              <div class="top-right links" id="header" style="position:absolute; height:50px; right:0px;overflow:hidden;">
                  <a href="{{ url('/') }}">{{ __('views.welcome.admin') }}</a>

                  @if (Route::has('login'))
                      @if (!Auth::check())
                          @if(config('auth.users.registration'))
                              <a href="{{ url('/register') }}">{{ __('views.welcome.register') }}</a>
                          @endif
                          <a href="{{ url('/login') }}">{{ __('views.welcome.login') }}</a>
                      @else
                          @if(auth()->user()->hasRole('administrator'))
                              <a href="{{ url('/admin') }}">{{ __('views.welcome.admin') }}</a>
                          @endif
                          <a href="{{ url('/logout') }}">{{ __('views.welcome.logout') }}</a>
                      @endif
                  @endif
              </div>
              <div id="content" style="position:absolute; top:50px; bottom:50px; left:0px; right:0px; overflow:auto;">
                  @yield('content')
              </div>
              <div id="footer" style="position:absolute; bottom:0px; height:50px; left:0px; right:0px; overflow:hidden;">
              </div>
          </div>
          {{ Html::script(mix('assets/asa/js/awani.js')) }}
    </body>
</html>

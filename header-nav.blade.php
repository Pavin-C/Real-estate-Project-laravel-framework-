<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
      <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
      <link rel="stylesheet" href="{{ asset('/path/to/font-awesome/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
      <link href="{{ asset('/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
      <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
      <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      - <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <style>
         .space {
         margin-right: 10px; 
         }
         .inline {
         display: inline-block;
         margin-right: 10px;
         }
         .icon {
         margin-right: 5px;
         }
         .text {
         font-weight: bold;
         }
         .color { 
         color:red;
         }
         .head {
         font-size: 24px; 
         text-align: center; 
         color: #3498db;
         background-color: #f2f2f2; 
         padding: 10px; 
         border-radius: 10px; 
         margin-top: 70px; 
         }
        
         ul.dropdown-menu {
         list-style-type: none; 
         padding: 0;
         margin: 0; 
         background-color: #fff; 
         border: 1px solid #ccc; 
         border-radius: 4px; 
         box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
         width: 200px; 
         }
         ul.dropdown-menu li {
         padding: 10px; 
         }
         ul.dropdown-menu li a {
         text-decoration: none; 
         color: #333; 
         display: block; 
         transition: background-color 0.3s; 
         }
         ul.dropdown-menu li a:hover {
         background-color: #f0f0f0; 
         }
         ul.dropdown-menu li a.active {
         background-color: #007bff; 
         color: #fff;
         }
         {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: "Poppins", sans-serif;
         }
         .rating-box {
         position: relative;
         background: #fff;
         padding: 25px 50px 35px;
         border-radius: 25px;
         box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
         }
         .rating-box header {
         font-size: 22px;
         color: #dadada;
         font-weight: 500;
         margin-bottom: 20px;
         text-align: center;
         }
         .rating-box .stars {
         display: flex;
         align-items: center;
         gap: 25px;
         }
         .stars i {
         color: #e6e6e6;
         font-size: 35px;
         cursor: pointer;
         transition: color 0.2s ease;
         }
         .stars i.active {
         color: #ff9c1a;
         },
         .footer {
         color:blue;
         }
      </style>
   </head>
   <body>
      @include('layouts.search');
      <nav class="navbar navbar-default navbar-trans navbar-expand-lg top nav-bar " style="z-index: 2; top: 3px;">
         <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
            </button>
            <a class="navbar-brand text-brand" href="{{ url('/') }}">Estate<span class="color-b">Agency</span></a>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" href="{{url('/')}}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="{{url('/about')}}"></i>About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="{{ url('/property-listing')}}">Property</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="{{ url('/contact') }}">Contact</a>
                  </li>
               </ul>
            </div>
            <div class="dropdown">
               <button type="button" class="btn btn-b-n" data-bs-toggle="dropdown">
               <i class="fa fa-align-right " aria-hidden="true"></i>
               </button>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{url('/userprofile')}}"><i class="fa fa-user-circle-o icon" aria-hidden="true" style="margin-right: 5px;"></i>Manage profile</a></li>
                  <li><a class="dropdown-item" href="{{ url('/property/create') }}"><i class="fa fa-plus-square" aria-hidden="true" style="margin-right: 5px;"></i>Post a property</a></li>
                  <li><a class="dropdown-item" href=""  data-bs-toggle="modal" data-bs-target="#calci"><i class="fa fa-calculator" aria-hidden="true"  style="margin-right: 5px;"></i>Mortgage Calculator</a></li>
                  <li><a class="dropdown-item" href="{{ url('alertproperty/create') }}">  <i class="fa fa-bullhorn" aria-hidden="true" style="margin-right: 5px;"></i>Set up property</a></li>
                  <li><a class="dropdown-item" href="{{ url('compare') }}"> <i class="fa-solid fa-code-compare" style="margin-right: 5px;"></i>compare property</a></li>
                  <li><a class="dropdown-item" href="{{ url('property-listing/favorite') }}"><i class="fas fa-bookmark" style="margin-right: 5px;"></i>Favourites</a></li>
                  <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"  style="margin-right: 5px;"></i>Logout</a></li>
               </ul>
            </div>
            <div class="space "></div>
            <button type="button" class="btn btn-b-n navbar-toggle-box  " data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
            <i class="fa fa-filter" aria-hidden="true"></i>
            </button>  
         </div>
         @if(Auth::check())
         <div class="space "></div>
         <a href="{{url('/userprofile')}}" class="d-flex align-items-center text-white text-decoration-none "  >
         <img src="{{ asset('images/' . auth()->user()->image) }}" alt="hugenerd" width="50" height="50" class="rounded-circle">
         </a>
         </div>
         @endif
         @if(!Auth::check())
         <div class="space "></div>
         <a href="{{url('/login')}}" class="  btn-b-n navbar-toggle-box"  style="margin-right: 5px;" >Login</a>
         </div>
         <div class="space "></div>
         <a href="{{url('/register')}}" class=" btn-b-n navbar-toggle-box"  style="margin-right: 5px;" >Register</a>
         </div>
         @endif
         <div class="space "></div>
         <div id='google_translate_element' style="z-index: 1;"></div>
         <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
         <script>
            function loadGoogleTranslate(){
                new google.translate.TranslateElement(
                    {pageLanguage : 'en'},
                    'google_translate_element'
                );
            }
            
         </script>
      </nav>
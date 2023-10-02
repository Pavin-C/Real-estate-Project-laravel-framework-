<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>
      <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.x.x/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('/path/to/font-awesome/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <style>
         .head {
         font-size: 24px; 
         text-align: center; 
         color: #3498db; 
         background-color: #f2f2f2; 
         padding: 10px; 
         border-radius: 10px; 
         margin-top: 70px; 
         },
         .column {
         padding: 10px; 
         white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipsis; 
         }
      </style>
   </head>
   <body>
      <div class="container-fluid">
      <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
         <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <div class=" pb-4">
               <a  class="d-flex align-items-center text-white text-decoration-none "  >
               <img src="{{ asset('images/' . auth()->user()->image) }}" alt="hugenerd" width="100" height="100" class="rounded-circle">
               <span class="d-none d-sm-inline mx-1">{{auth()->user()->name}}</span>
               </a>
            </div>
            <a  class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
               <li class="nav-item">
                  <a href="{{url('/userprofile')}}" class="nav-link align-middle px-0">
                  <i class="fa fa-user-circle-o icon" aria-hidden="true" style="font-size: 2em;"></i><span class="ms-1 d-none d-sm-inline">Manage profile</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/')}}" class="nav-link align-middle px-0">
                  <i class="fa fa-home icon" aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/property/create')}}" class="nav-link align-middle px-0">
                  <i class="fa fa-building icon " aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Post property</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/alertproperty')}}" class="nav-link align-middle px-0">
                  <i class="fa fa-bullhorn" aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">property for alert</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/userquery-show')}}" class="nav-link px-0 align-middle">
                  <i class="fa fa-info-circle icon" aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Customer Query @if($customerquery >= 1)<sup>{{$customerquery}}</sup>@endif</span></a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/user-property-show')}}" class="nav-link px-0 align-middle">
                  <i class="fa fa-building icon " aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Properties @if($property >=1)- {{$property}}@endif</span></a>
               </li>
               @if(!(auth()->user()->email == 'pavinsanthi6@gmail.com'))
               <li class="nav-item">
                  <a href="{{url('/user-unapproval/property')}}" class="nav-link px-0 align-middle">
                  <i class="fa fa-exclamation-triangle icon" aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Unapproval  @if($unapproval >=1)<sup> {{$unapproval}}</sup>@endif</span></a>
               </li>
               @endif
               @can('customer view')
               <li class="nav-item">
                  <a href="{{url('/userdetail')}}" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-people" style="font-size: 2em;"></i><span class="ms-1 d-none d-sm-inline">Customers @if($userCount >=1)- {{$userCount}}@endif</span> </a>
               </li>
               @endcan
               @can('approval view')
               <li class="nav-item">
                  <a href="{{url('/approve/property')}}" class="nav-link px-0 align-middle">
                  <i class="fa fa-building icon " aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Approve Property @if($approval >=1)<sup>{{$approval}}</sup>@endif</span></a>
               </li>
               @endcan
               <li class="nav-item">
                  <a href="{{url('/logout')}}" class="nav-link px-0 align-middle">
                  <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 2em;"></i> <span class="ms-1 d-none d-sm-inline">Sign out</span></a>
               </li>
            </ul>
            <hr>
         </div>
         <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
         <script>
            function loadGoogleTranslate(){
                new google.translate.TranslateElement(
                    {pageLanguage : 'en'},
                    'google_translate_element'
                );
            }
            
         </script>
      </div>
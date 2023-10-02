@extends('layouts.default-nav')
@section('title','Agents List')
@section('content')
<main id="main">
   <section class="intro-single">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-8">
               <div class="title-single-box">
                  <h1 class="title-single">Our Amazing Sellers</h1>
               </div>
            </div>
            <div class="col-md-12 col-lg-4">
               <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Home</a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">
                        Agents Grid
                     </li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
  
   <section class="agents-grid grid">
      <div class="container">
         <div class="row">
            @foreach($sellers as $key => $seller)
            <div class="col-md-4">
               <div class="card-box-d">
                  <div class="card-img-d">
                     <img src="assets/img/agent-4.jpg" alt="" class="img-d img-fluid">
                  </div>
                  <div class="card-overlay card-overlay-hover">
                     <div class="card-header-d">
                        <div class="card-title-d align-self-center">
                           <h3 class="title-d">
                              <a class="link-two">{{$seller->name}}</a>
                           </h3>
                        </div>
                     </div>
                     <div class="card-body-d">
                        <div class="info-agents color-a">
                           <p><strong>Phone: </strong> {{$seller->phone_number}}</p>
                           <p><strong>Email: </strong> {{$seller->email}}</p>
                        </div>
                     </div>
                     <div class="card-footer-d">
                        <div class="socials-footer d-flex justify-content-center">
                           <ul class="list-inline">
                              <li class="list-inline-item">
                                 <a class="link-one">
                                 <i class="bi bi-facebook" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a class="link-one">
                                 <i class="bi bi-twitter" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a class="link-one">
                                 <i class="bi bi-instagram" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a class="link-one">
                                 <i class="bi bi-linkedin" aria-hidden="true"></i>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if(($key + 1) % 3 == 0)
         </div>
         <div class="row">
            @endif
            @endforeach
         </div>
         <div class="row">
            <div class="col-sm-12">
               <nav class="pagination-a">
                  {{$sellers->links()}}
               </nav>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
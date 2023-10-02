@extends('layouts.default-nav')
@section('title','Contact Admin')
<style>
   body{
   margin-top:20px;
   background:#eee;
   }
   .gradient-brand-color {
   background-image: -webkit-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
   background-image: -ms-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
   color: #fff;
   }
   .contact-info__wrapper {
   overflow: hidden;
   position: relative;
   border-radius: .625rem .625rem 0 0
   }
   @media (min-width: 1024px) {
   .contact-info__wrapper {
   border-radius: 0 .625rem .625rem 0;
   padding: 5rem !important
   }
   }
   .contact-info__list span.position-absolute {
   left: 0
   }
   .z-index-101 {
   z-index: 101;
   }
   .list-style--none {
   list-style: none;
   }
   .contact__wrapper {
   background-color: #fff;
   border-radius: 0 0 .625rem .625rem
   }
   @media (min-width: 1024px) {
   .contact__wrapper {
   border-radius: .625rem 0 .625rem .625rem
   }
   }
   @media (min-width: 1024px) {
   .contact-form__wrapper {
   padding: 5rem !important
   }
   }
   .title-box-d{
   margin-left: 3%;
   }
   .shadow-lg, .shadow-lg--on-hover:hover {
   box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
   }
   .figure {
   position: absolute;
   bottom: 0;
   right: 0;
   }
</style>
@section('content')
<div class="">
   <div class="title-box-d mt-5 ">
      <h3 class="title-d">Contact Us</h3>
   </div>
   <div class="container-fluid ml-5">
      <!-- Success message -->
      @if(Session::has('success'))
      <div class="alert alert-success">
         {{ Session::get('success') }}
      </div>
      @endif
      <div class="contact__wrapper shadow-lg mt-n9">
         <div class="row no-gutters">
            <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
               <h3 class="color--white mb-5">Get in Touch</h3>
               <ul class="contact-info__list list-style--none position-relative z-index-101">
                  <li class="mb-4 pl-4">
                     <span class="position-absolute"><i class="fas fa-envelope"></i></span> estateagency@gmail.com
                  </li>
                  <li class="mb-4 pl-4">
                     <span class="position-absolute"><i class="fas fa-phone"></i></span> 9785345237
                  </li>
                  <li class="mb-4 pl-4">
                     <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span> Estate Agency Inc.
                     <br> 2694 Queen City Rainbow Drive
                     <br> Florida 99161
                  </li>
               </ul>
               <figure class="figure position-absolute m-0 opacity-06 z-index-100" style="bottom:0; right: 10px">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444px" height="626px">
                     <defs>
                        <linearGradient id="PSgrad_1" x1="0%" x2="81.915%" y1="57.358%" y2="0%">
                           <stop offset="0%" stop-color="rgb(255,255,255)" stop-opacity="1"></stop>
                           <stop offset="100%" stop-color="rgb(0,54,207)" stop-opacity="0"></stop>
                        </linearGradient>
                     </defs>
                     <path fill-rule="evenodd" opacity="0.302" fill="rgb(72, 155, 248)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                     <path fill="url(#PSgrad_1)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                  </svg>
               </figure>
            </div>
            <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
               <form action="{{ route('contact.store') }}" method="post" class="contact-form form-validate">
                  @csrf
                  <div class="row">
                     <div class="col-sm-6 mb-3">
                        <div class="form-group">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name"
                              value="{{ old('name') }}">
                           <!-- Error -->
                           @if ($errors->has('name'))
                           <div class="error">
                              <span style="color:red;">* {{ $errors->first('name') }}</span> 
                           </div>
                           @endif
                        </div>
                     </div>
                     <div class="col-sm-6 mb-3">
                        <div class="form-group">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email"
                              id="email" value="{{ old('email') }}">
                           @if ($errors->has('email'))
                           <div class="error">
                              <span style="color:red;">* {{ $errors->first('email') }}</span>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 mb-3">
                        <div class="form-group">
                           <label for="phone" class="form-label">Phone</label>
                           <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone"
                              id="phone" value="{{ old('phone') }}">
                           @if ($errors->has('phone'))
                           <div class="error">
                              <span style="color:red;">* {{ $errors->first('phone') }}</span>
                           </div>
                           @endif
                        </div>
                     </div>
                     <div class="col-sm-6 mb-3">
                        <div class="form-group">
                           <label for="subject" class="form-label">Subject</label>
                           <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                              id="subject" value="{{ old('subject') }}">
                           @if ($errors->has('subject'))
                           <div class="error">
                              <span style="color:red;">* {{ $errors->first('subject') }}</span>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 mb-3">
                     <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message"
                           id="message" rows="5">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                        <div class="error">
                           <span style="color:red;">* {{ $errors->first('message') }}</span>
                        </div>
                        @endif
                     </div>
                  </div>
                  <button type="submit" name="send" class="btn btn-success  mb-5"><i class="fa fa-envelope icon" aria-hidden="true"></i>Send Mail</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
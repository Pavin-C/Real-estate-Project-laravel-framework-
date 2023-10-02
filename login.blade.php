@extends('layouts.default-login')
@section('title','Login Page')
@section('content')
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
<div class="wrapper wrapper--w680">
   <div class="card card-4">
      <div class="card-body">
         <h2 class="title">Login Form</h2>
         @if(session('message'))
         <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>{{ session('message') }}
         </div>
         @endif 
         <br>
         <div class="row">
            <div class="col-md-6">
               <a href="{{url('/')}}" class="btn btn-info mt-3">
               <i class="fa fa-arrow-left icon" aria-hidden="true"></i> Back
               </a>
            </div>
            <div class="col-md-6">
               <a class="btn  btn-info mt-3" href="{{url('/register')}}">
               <i class="fa fa-registered icon" aria-hidden="true"></i> Register
               </a>
            </div>
         </div>
         <br>
         <form method="POST" action="{{url('/userlogin')}}" >
            @csrf
            <div class="row row-space">
               <div class="col-2">
                  <div class="input-group">
                     <label class="label"><i class="fa fa-envelope-open icon" aria-hidden="true"></i>Email</label>
                     <input class="input--style-4" type="text" name="email" value="{{old('email')}}">
                  </div>
                  @error('email')
                  <span style="color: red;">* {{$message}}</span>
                  @enderror
               </div>
               <div class="col-2">
                  <div class="input-group">
                     <label class="label"><i class="fa fa-sign-language icon" aria-hidden="true"></i>Password</label>
                     <input class="input--style-4" type="text" name="password" value="{{old('password')}}">
                  </div>
                  @error('password')
                  <span style="color: red;">* {{$message}}</span>
                  @enderror
               </div>
               <div class="p-t-15">
                  <a class="btn btn--radius-2 btn-danger" href="{{url('/')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel</a>
                  <button class="btn btn--radius-2 btn--blue" type="submit"><i class="fa fa-sign-in icon" aria-hidden="true"></i>Login</button>
               </div>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection
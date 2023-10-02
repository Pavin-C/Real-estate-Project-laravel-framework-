@extends('layouts.default-login')
@section('title','Update Profile')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
<div class=" bg-gra-02 p-t-70 p-b-30 font-poppins">
   <div class=" wrapper--400">
      <div class="card card-2">
         <div class="card-body">
            <h2 class="title head"><i class="fa fa-user-circle-o icon" aria-hidden="true"></i>Edit Profile</h2>
            <br>
            @if(session('success'))
            <div class="alert alert-success">
               <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }} <a href="{{url('/login')}}" class="btn btn-info"><i class="fa fa-sign-in icon" aria-hidden="true"></i>Login</a>
            </div>
            @endif 
            @if(session('message'))
            <div class="alert alert-danger">
               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>{{ session('message') }}
            </div>
            @endif
            <br>
            <form method="POST" action="{{url('/update-user')}}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="row row-space">
                  <div class="col-2">
                     <div class="input-group">
                        <label class="label"><i class="fa fa-id-badge icon" aria-hidden="true"></i>Name</label>
                        <input class="input--style-4" type="text" name="name" value="{{ old('name', $user->name) }}">
                     </div>
                     @error('name')
                     <span style="color: red;">* {{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-2">
                     <div class="input-group">
                        <label class="label"><i class="fa fa-envelope-open icon" aria-hidden="true"></i>Email</label>
                        <input class="input--style-4" type="text" name="email" value="{{ old('email', $user->email) }}">
                     </div>
                     @error('email')
                     <span style="color: red;">* {{$message}}</span>
                     @enderror
                  </div>
               </div>
               <div class="row row-space">
                  <div class="col-4">
                     <div class="input-group">
                        <label class="label"><i class="fa fa-user-circle-o icon" aria-hidden="true"></i>Profile Image</label><br>
                        <br>
                        <div class="input-group-icon">
                           <input type="file" class="input--style-3 " name="image">
                        </div>
                        @error('image')
                        <span style="color: red;">* {{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-2">
                     <div class="input-group">
                        <label class="label"> <i class="fa fa-user icon" aria-hidden="true"></i>Gender</label>
                        <div class="p-t-10"><br>
                           <label class="radio-container m-r-45">Male
                           <input type="radio" name="gender" value="Male"  {{ $user->type == 'Male' ? 'checked' : '' }}>
                           <span class="checkmark"></span>
                           </label>
                           <label class="radio-container">Female
                           <input type="radio" name="gender" value="Female"  {{ $user->type == 'Female' ? 'checked' : '' }}>
                           <span class="checkmark"></span>
                           </label>
                        </div>
                     </div>
                     @error('gender')
                     <span style="color: red;">* {{$message}}</span>
                     @enderror
                  </div>
               </div>
               <div class="row row-space">
                  <div class="col-2">
                     <div class="input-group">
                        <label class="label"><i class="fa fa-phone icon" aria-hidden="true"></i>Phone Number</label>
                        <input class="input--style-4" type="text" name="phone" value="{{ old('phone', $user->phone_number) }}">
                     </div>
                     @error('phone')
                     <span style="color: red;">* {{$message}}</span>
                     @enderror
                  </div>
                  <div class="p-t-15">
                     <a class="btn btn--radius-2 btn-danger" href="{{url('/')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel</a>
                     <button class="btn btn--radius-2 btn--blue" type="submit"><i class="fa fa-pencil-square-o icon" aria-hidden="true"></i>Update profile</button>
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
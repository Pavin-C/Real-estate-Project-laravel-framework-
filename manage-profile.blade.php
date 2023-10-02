@extends('layouts.default-login')
@section('title','Manage Profile')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class=" bg-gra-02 p-t-70 p-b-30 font-poppins">
      <div class=" wrapper--400">
         <div class="card card-2">
            <div class="card-body">
               <h2 class="title head"><i class="fa fa-user-circle-o icon" aria-hidden="true"></i>Profile</h2>
               <br>
               <div class="row row-space">
                  <div class="col-2">
                     <div class="input-group">
                        <label class="label"><i class="fa fa-id-badge icon" aria-hidden="true"></i>Name</label>
                        <input class="input--style-4"  value="{{$user->name}}" disabled>
                     </div>
                     <div class="input-group">
                        <br><label class="label"><i class="fa fa-envelope-open icon" aria-hidden="true"></i>Email</label>
                        <input class="input--style-4"  value="{{$user->email}}" disabled>
                     </div>
                     <div class="input-group">
                        <label class="label"><i class="fa fa-user icon" aria-hidden="true"></i>Gender</label>
                        <input class="input--style-4" value="{{$user->gender}}" disabled>
                     </div>
                     <div class="input-group">
                        <label class="label"><i class="fa fa-phone icon" aria-hidden="true"></i>Phone number</label>
                        <input class="input--style-4" value="{{$user->phone_number}}" disabled>
                     </div>
                  </div>
               </div>
               <div class="p-t-15">
                  <a href="{{url('/profile-edit')}}" class="btn btn--radius-2 btn--blue"><i class="fa fa-pencil-square-o icon" aria-hidden="true"></i>Edit Profile</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
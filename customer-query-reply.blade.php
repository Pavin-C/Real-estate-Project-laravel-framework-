@extends('layouts.default-login')
@section('title','Customer Query')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class=" bg-gra-02 p-t-70 p-b-30 font-poppins">
      <div class=" wrapper--400">
         <div class="card card-2">
            <div class="card-body">
               <h2 class="title"><i class="fa fa-user-circle-o icon" aria-hidden="true"></i>Reply to {{$query->name}}</h2>
               <br>
               <div class="row row-space">
                  <form action="{{url('/sendcustomerquery-mail/'.$query->id)}}" method="POST">
                     @csrf
                     <div class="col-2">
                        <div class="input-group">
                           <label class="label"><i class="fa fa-id-badge icon" aria-hidden="true"></i>Name</label>
                           <input class="input--style-4"  value="{{$query->name}}" name ="name" >
                        </div>
                        <div class="input-group">
                           <br><label class="label"><i class="fa fa-envelope-open icon" aria-hidden="true"></i>Email</label>
                           <input class="input--style-4"  value="{{$query->email}}" name="email" >
                        </div>
                        <div class="input-group">
                           <label class="label"><i class="fa fa-user icon" aria-hidden="true"></i>Customer Query</label>
                           <input class="input--style-4" value="{{$query->message}}" name="message" >
                        </div>
                        <div class="input-group">
                           <label class="label"><i class="fa fa-phone icon" aria-hidden="true"></i>Your Email</label>
                           <input class="input--style-4" value="{{$query->userquery->email}}" name="owneremail" >
                        </div>
                        <div class="input-group">
                           <label class="label"><i class="fa fa-id-badge icon" aria-hidden="true"></i>Your Name</label>
                           <input class="input--style-4"  value="{{$query->userquery->name}}" name ="ownername" >
                        </div>
                     </div>
                     <div class="input-group">
                        <label class="label"><i class="fa fa-building icon" aria-hidden="true"></i>Property type and salestype</label>
                        <input class="input--style-4"  value="{{$query->propertyquery->type}},{{$query->propertyquery->sales_type}}" name ="type" >
                     </div>
               </div>
               <div class="input-group">
               <label class="label"><i class="fa fa-pencil-square icon" aria-hidden="true"></i>Your message</label><br>
               <br>
               <div style="margin-top: 20px;">
               <textarea name="replymessage" class="input" cols="50" rows="5" style="border: 2px solid green; padding: 10px;"></textarea>
               </div>
               </div>
               <div class="p-t-15 mb-10">
               <a class="btn btn--radius-2 btn-danger" href="{{url('/userquery-show')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/userquery-show')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel Email</a>
               <button type="submit" class="btn btn--radius-2 btn--blue"><i class="fa fa-envelope icon" style="font-size: 24px;" aria-hidden="true"></i>Send Mail</button>
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>
@endsection
@extends('layouts.default-login')
@section('title','Customer Details')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class="container mt-6">
      <h2 class="head" style="color: blue;"><i class="fa fa-user" aria-hidden="true" style="font-size: 2em;"></i>User Details</h2>
      @if(session('success'))
      <div class="alert alert-success">
         <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      {{$user->links()}}
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>UserId</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>PhoneNumber</th>
                  <th>Gender</th>
                  <th>Properties Count</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
               @foreach($user as $list)
               <tr>
                  @if($list->email != 'pavinsanthi6@gmail.com')
                  <td>{{$list->id}}</td>
                  <td>{{$list->name}}</td>
                  <td>{{$list->email}}</td>
                  <td><img src="{{ asset('images/' . $list->image) }}" alt="image" width="150" height="150"></td>
                  <td>{{$list->phone_number}}</td>
                  <td>{{$list->gender}}</td>
                  <td>{{$list->properties_count}}</td>
                  <td>
                     <form action="{{url('/user-delete/'.$list->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" onclick="return confirm('Are you sure want to delete this user') ? window.location.href = '{{url('/user-delete/'.$list->id)}}' : false;" class="btn btn-danger" style="width: 200px; height: 50px;"><i class="fa fa-trash icon" aria-hidden="true" style="font-size: 24px;"></i>Delete</button>
                     </form>
                  </td>
               </tr>
               @endif
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
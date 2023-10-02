@extends('layouts.default-login')
@section('title','Property Queries')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class="container mt-6">
      <h2 class="head" style="color: blue;"><i class="fa fa-info-circle icon" aria-hidden="true" style="font-size: 2em;"></i>Customer Queries</h2>
      @if(session('success'))
      <div class="alert alert-success">
         <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      <br>
      <div class="table-responsive">
         {{$query->links()}}
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th  style="width: 500px; padding: 35px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Customer Queries</th>
                  <th>Type</th>
                  <th>Sales Type</th>
                  <th>Currency</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Delete</th>
                  <th>Reply</th>
               </tr>
            </thead>
            <tbody>
               @foreach($query as $list)
               <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->name}}</td>
                  <td>{{$list->email}}</td>
                  <td >{{$list->message}}</td>
                  <td>{{$list->type}}</td>
                  <td>{{$list->sales_type}}</td>
                  <td>{{$list->currency}}</td>
                  <td>{{$list->price}}</td>
                  <td><img src="{{ asset('images/' . $list->image) }}" alt="image" width="150" height="150"></td>
                  <td>
                     <form action="{{url('/user-query/'.$list->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" onclick="return confirm('Are you sure want to delete the customer query') ? window.location.href = '{{url('/user-query/'.$list->id)}}' : false;" class="btn btn-danger" style="width: 200px; height: 50px;"><i class="fa fa-trash icon" aria-hidden="true" style="font-size: 24px;"></i>Delete</button>
                     </form>
                  </td>
                  <td><a href="{{'/user-query/'.$list->id.'/reply'}}" class="btn btn-info" style="width: 180px; height: 50px;"><i class="fa fa-reply icon" aria-hidden="true" style="font-size: 24px;"></i>Reply</a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
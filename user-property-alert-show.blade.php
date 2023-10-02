@extends('layouts.default-login')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class="container mt-6">
      <h2 class="head" style="color: blue;"><i class="fa fa-bullhorn icon" aria-hidden="true" style="font-size: 2em;"></i>Property for alert</h2>
      <a href="{{url('/alertproperty/create')}}" class="btn btn-success mt-4"><i class="fa fa-bullhorn icon" aria-hidden="true"></i>
      Set a property</a>
      @if(session('success'))
      <div class="alert alert-success mt-3">
         <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      {{$propertyalert->links()}}
      <br>
      <div class="table-responsive mt-4">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>SalesType</th>
                  <th>PropertyType</th>
                  <th>Location</th>
                  <th>Minimum Price</th>
                  <th>Maximum Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
               @foreach($propertyalert as $list)
               <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->type}}</td>
                  <td>{{$list->sales_type}}</td>
                  <td>{{$list->property_type}}</td>
                  <td>{{$list->location}}</td>
                  <td>{{$list->min_price}}</td>
                  <td>{{$list->max_price}}</td>
                  <td><a href="{{'/alertproperty/'.$list->id.'/edit'}}" class="btn btn-info" style="width: 180px; height: 50px;"><i class="fa fa-pencil-square-o icon" aria-hidden="true" style="font-size: 24px;"></i>Edit</a></td>
                  <td>
                     <form action="{{url('/alertproperty/'.$list->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" onclick="return confirm('Are you sure want to delete this property') ? window.location.href = '{{url('/property/'.$list->id)}}' : false;" class="btn btn-danger" style="width: 200px; height: 50px;"><i class="fa fa-trash icon" aria-hidden="true" style="font-size: 24px;"></i>Delete</button>
                     </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
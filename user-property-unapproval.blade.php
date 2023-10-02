@extends('layouts.default-login')
@section('title','Unapproved Property')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class="container mt-6">
      <h2 class="head" style="color: blue;"><i class="fa fa-info-circle icon" aria-hidden="true" style="font-size: 2em;"></i>Unapproved Properties</h2>
      <br>
      <div class="table-responsive">
         {{$unapproval->links()}}
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Property Id</th>
                  <th>Comments for unapproval</th>
                  <th>Edit</th>
               </tr>
            </thead>
            <tbody>
               @foreach($unapproval as $list)
               <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->comments}}</td>
                  <td><a href="{{'/property/'.$list->property_id.'/edit'}}" class="btn btn-info" style="width: 180px; height: 50px;"><i class="fa fa-pencil-square-o icon" aria-hidden="true" style="font-size: 24px;"></i>Edit</a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@extends('layouts.default-login')
@section('title','Approve Property')
@include('layouts.header-profile')
@section('content')
<div class="col py-3">
   <div class="container mt-6">
      <h2 class="head" style="color: blue;"><i class="fa fa-building" aria-hidden="true" style="font-size: 2em;"></i><i class="fa fa-home" aria-hidden="true" style="font-size: 2em;"></i>Property to be approve</h2>
      @if(session('success'))
      <div class="alert alert-success">
         <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      {{$property->links()}}
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Owner Name</th>
                  <th>Owner Email</th>
                  <th>Owner Phonenumber</th>
                  <th>Type</th>
                  <th>SalesType</th>
                  <th>Image</th>
                  <th>PropertyType</th>
                  <th>FloorNumber</th>
                  <th>Location</th>
                  <th>Address</th>
                  <th>ZipCode</th>
                  <th>PropertySize</th>
                  <th>LotSize</th>
                  <th>No.of.Bedroom</th>
                  <th>No.of.Bathroom</th>
                  <th>No.of.Garage</th>
                  <th>PropertCondition</th>
                  <th>Currency</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>Document</th>
                  <th>Approve</th>
                  <th>Unapprove</th>
               </tr>
            </thead>
            <tbody>
               @foreach($property as $list)
               <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->user->name}}</td>
                  <td>{{$list->user->email}}</td>
                  <td>{{$list->user->phone_number}}</td>
                  <td>{{$list->type}}</td>
                  <td>{{$list->sales_type}}</td>
                  <td><img src="{{ asset('images/' . $list->image) }}" alt="image" width="150" height="150"></td>
                  <td>{{$list->property_type}}</td>
                  @if($list->floor_number == null)
                  <td>{{0}}</td>
                  @else 
                  <td>{{$list->floor_number}}</td>
                  @endif
                  <td>{{$list->location}}</td>
                  <td>{{$list->address}}</td>
                  <td>{{$list->zipcode}}</td>
                  <td>{{$list->property_size}} square feet</td>
                  <td>{{$list->lot_size}} square feet</td>
                  @if($list->bedroom == null)
                  <td>{{0}}</td>
                  @else 
                  <td>{{$list->bedroom}}</td>
                  @endif
                  @if($list->bathroom == null)
                  <td>{{0}}</td>
                  @else 
                  <td>{{$list->bathroom}}</td>
                  @endif
                  @if($list->garage == null)
                  <td>{{0}}</td>
                  @else 
                  <td>{{$list->garage}}</td>
                  @endif
                  <td>{{$list->property_condition}}</td>
                  <td>{{$list->currency}}</td>
                  <td>{{$list->price}}</td>
                  <td>{{$list->date}}</td>
                  <td><a href="{{ asset('images/' . $list->document) }}" target="_blank"><img src="{{ asset('images/pdf1.png') }}" alt="document" style="width: 50px; height: 50px;">{{$list->document}}</a></td>
                  <td><a href="{{'/property/'.$list->id.'/approve'}}" class="btn btn-success" style="width: 200px; height: 50px;"><i class="fa fa-check" aria-hidden="true"></i>Approve</a></td>
                  <td>
                     <form action="{{'/property/'.$list->id.'/unapprove/'.$list->user->id}}" method="POST">
                        @csrf
                        <label for="">Comments</label>
                        <textarea name="comment" id="" cols="27" rows="5" style="border: 2px solid red; padding: 10px;" required></textarea>
                        <button type="submit" class="btn btn-danger" style="width: 250px; height: 50px;"><i class="fa fa-ban icon" aria-hidden="true"></i>Unapprove</button>
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
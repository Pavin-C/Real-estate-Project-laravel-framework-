@extends('layouts.default-compare-nav')
@section('title','Compared Property')
@section('main')
<div class="container mt-3">
   <a href="{{url('/compare')}}" class="btn btn-info mb-5 " style="margin-top: 90px;"><i class="fa fa-arrow-left icon" aria-hidden="true"></i>Back</a>
   <table class="table table-hover">
      <thead>
         <tr>
            <th>Property Id</th>
            <th>Image</th>
            <th>Type</th>
            <th>Property Type</th>
            <th>Property Condition</th>
            <th>Location</th>
            <th>Sales Type</th>
            <th>Property Size</th>
            <th>No.of bedrooms</th>
            <th>No.of bathrooms</th>
            <th>No.of garages</th>
            <th>Foor Number</th>
            <th>Currency</th>
            <th>Price</th>
         </tr>
      </thead>
      <tbody>
         @foreach($property as $list)
         <tr>
            <td>{{$list->id}}</td>
            <td><img src="{{ asset('images/' . $list->image) }}" alt="image" width="150" height="150"></td>
            <td>{{$list->type}}</td>
            <td>{{$list->property_type}}</td>
            <td>{{$list->property_condition}}</td>
            <td>{{$list->location}}</td>
            <td>{{$list->sales_type}}</td>
            <td>{{$list->property_size}}ft<sup>2</sup></td>
            @if($list->bedroom == 0)
            <td>0</td>
            @else
            <td>{{$list->bedroom}}</td>
            @endif
            @if($list->bathroom == 0)
            <td>0</td>
            @else
            <td>{{$list->bathroom}}</td>
            @endif
            @if($list->garage == 0)
            <td>0</td>
            @else
            <td>{{$list->garage}}</td>
            @endif
            @if($list->floor_number == 0)
            <td>0</td>
            @else
            <td>{{$list->floor_number}}</td>
            @endif
            <td>{{$list->currency}}</td>
            <td>{{$list->price}}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection
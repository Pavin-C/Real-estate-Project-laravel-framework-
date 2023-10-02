@extends('layouts.default-compare-nav')
@section('title','Compare Property')
@section('main')
<div class="container mt-50">
   <div class="container" style="margin-top: 40px;">
      <div class="row">
         <div class="col-md-6">
         </div>
         <div class="grid-option">
            <form method="POST" action="{{url('/property/custom/compare')}}">
               @csrf
               <select class="custom-select" name="property_type">
               <option value="all" {{ old('property_type', $propertyType) == 'all' ? 'selected' : '' }}>All</option>
               <option value="Rent" {{ old('property_type', $propertyType) == 'Rent' ? 'selected' : '' }}>For Rent</option>
               <option value="Sales" {{ old('property_type', $propertyType) == 'Sales' ? 'selected' : '' }}>For Sale</option>
               </select><br>
               <input class="mt-2" type="text" name="location" value="{{old('location')}}" placeholder="Enter location">
               <button type="submit">Apply Filter</button>
            </form>
         </div>
      </div>
   </div>
   <form action="{{url('/compare-property')}}" method="POST">
      @csrf       
      <button type="submit" class="btn btn-primary mb-3" style="margin-top: 30px;">Click to compare</button>
      <table class="table table-hover">
         <thead>
            <tr>
               <th>Select Property</th>
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
               <td>
                  <input type="checkbox" name="property_ids[]" value="{{ $list->id }}">
               </td>
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
   </form>
</div>
@endsection
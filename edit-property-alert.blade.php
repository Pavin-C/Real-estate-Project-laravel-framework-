@extends('layouts.default-compare-nav')
@section('title','Edit alert property')
@section('main')
<div class="container">
   <h3 class="head" style="margin-top: 70px;">Welcome {{auth()->user()->name}}..!! Edit a property as per requirements</h3>
   <a href="{{url('/')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left icon" aria-hidden="true"></i>Back</a>
   <form class="form-horizontal" action="{{url('/alertproperty/'.$property->id)}}" method="post" >
      @csrf
      @method('PUT')
      <br>
      @if(session('success'))
      <div class="alert alert-success">
         <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      @if(session('message'))
      <div class="alert alert-danger">
         <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>{{ session('success') }}
      </div>
      @endif 
      <br>
      <h5>Edit a set up property</h5>
      <label class="control-label col-sm-4 text" for="type"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Type</label>
      <div class="form-check inline">
         <input type="radio" class="form-check-input @error ('type') is-invalid @enderror" id="type" name="type" value="Residential" {{$property->type == 'residential' ? 'checked' : ''}}> 
         <label class="form-check-label  " for="type">Residential</label>
      </div>
      <div class="form-check inline">
         <input type="radio" class="form-check-input @error ('type') is-invalid @enderror" id="commercial" name="type" value="Commercial" {{ $property->type == 'commercial' ? 'checked' : '' }}>
         <label class="form-check-label " for="commercial">Commercial</label>
      </div>
      @error('type')
      <span class="color">* {{$message}}</span>
      @enderror<br>
      <div class="form-group mt-2">
         <label class="control-label col-sm-4 text" for="sales-type">Sales Type</label>
         <div class="col-sm-10">
            <select class="form-select mt-3  id="sales-type" name="sales-type">
            <option value="Sales" {{ old('sales-type', $property->sales_type) == 'Sales' ? 'selected' : '' }}>Sales</option>
            <option value="Rent" {{ old('sales-type', $property->sales_type) == 'Rent' ? 'selected' : '' }}>Rental</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="property-type"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Property Type</label>
         <div class="col-sm-10">
            <select class="form-select mt-3" id="property-type" name="property-type">
            <option value="House" {{ old('property-type', $property->property_type) == 'House' ? 'selected' : '' }}>House</option>
            <option value="Apartment" {{ old('property-type', $property->property_type) == 'Apartment' ? 'selected' : '' }}>Apartment</option>
            <option value="Land" {{ old('property-type', $property->property_type) == 'Land' ? 'selected' : '' }}>Land</option>
            <option value="Building" {{ old('property-type', $property->property_type) == 'Building' ? 'selected' : '' }}>Building</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="location"><i class="fa fa-map-marker icon" aria-hidden="true"></i>Location</label>
         <div class="col-sm-10">
            <input type="text" class="form-control mt-2 @error ('location') is-invalid @enderror" id="location" placeholder="Enter location" name="location" value="{{ old('location', $property->location) }}">
         </div>
         @error('location')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="minprice"><i class="fa fa-money icon" aria-hidden="true"></i>Estimation minprice</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('minprice') is-invalid @enderror" id="minprice" placeholder="Enter Estimation minprice in dollars" name="minprice" value="{{ old('minprice', $property->min_price) }}">
         </div>
      </div>
      @error('minprice')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="maxprice"><i class="fa fa-money icon" aria-hidden="true"></i>Estimation maxprice</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('maxprice') is-invalid @enderror" id="maxprice" placeholder="Enter Estimation maxprice in dollars" name="maxprice" value="{{ old('maxprice', $property->max_price) }}">
         </div>
      </div>
      @error('maxprice')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="container mb-10">
         <div class="from-group">
            <a class="btn btn-danger mb-10" href="{{url('/')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel</a>
            <button type="submit" class="btn btn-success mb-10"><i class="fa fa-pencil-square-o icon" aria-hidden="true"></i> Update a property for alert</button>
         </div>
      </div>
      <br>
   </form>
</div>
@endsection
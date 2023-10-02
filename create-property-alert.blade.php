@extends('layouts.default-compare-nav')
@section('title','Create alert property')
@section('main')
<div class="container" style="background-image: url('public/images/form-background.jpg');">
   <h3 class="head" style="margin-top: 70px;">Welcome {{auth()->user()->name}}..!! Fill out the details to create a property to alert</h3>
   <a href="{{url('/')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left icon" aria-hidden="true"></i>Back</a>
   <form class="form-horizontal" action="{{url('/alertproperty')}}" method="post">
      @csrf
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
      <h5>Set up property</h5>
      <label class="control-label col-sm-4 text" for="type"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Type</label>
      <div class="form-check inline">
         <input type="radio" class="form-check-input @error ('type') is-invalid @enderror" id="type" name="type" value="Residential" {{ old('type') == 'residential' ? 'checked' : ''}} >
         <label class="form-check-label" for="type">Residential</label>
      </div>
      <div class="form-check inline">
         <input type="radio" class="form-check-input @error ('type') is-invalid @enderror" id="commercial" name="type" value="Commercial" {{ old('type') == 'commercial' ? 'checked' : ''}}>
         <label class="form-check-label " for="commercial">Commercial</label>
      </div>
      @error('type')
      <span class="color">* {{$message}}</span>
      @enderror<br>
      <div class="form-group mt-2">
         <label class="control-label col-sm-4 text" for="sales-type">Sales Type</label>
         <div class="col-sm-10">
            <select class="form-select mt-3  id="sales-type" name="sales-type">
            <option value="Sales" {{ old('sales-type') == 'Sales' ? 'selected' : ''}}>Sales</option>
            <option value="Rent" {{ old('sales-type') == 'Rent' ? 'selected' : ''}}>Rental</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="property-type"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Property Type</label>
         <div class="col-sm-10">
            <select class="form-select mt-3" id="property-type" name="property-type">
            <option value="House" {{ old('property-type') == 'House' ? 'selected' : ''}}>House</option>
            <option value="Apartment" {{ old('property-type') == 'Apartment' ? 'selected' : ''}}>Apartment</option>
            <option value="Land" {{ old('property-type') == 'Land' ? 'selected' : ''}}>Land</option>
            <option value="Building" {{ old('property-type') == 'Building' ? 'selected' : ''}}>Building</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="location"><i class="fa fa-map-marker icon" aria-hidden="true"></i>Location</label>
         <div class="col-sm-10">
            <input type="text" class="form-control mt-2 @error ('location') is-invalid @enderror" id="location" placeholder="Enter location" name="location"  value="{{ old('location') }}">
         </div>
         @error('location')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="minprice"><i class="fa fa-money icon" aria-hidden="true"></i>Estimation minprice</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('minprice') is-invalid @enderror" id="minprice" placeholder="Enter Estimation minprice in dollars" name="minprice" value="{{ old('minprice') }}">
         </div>
      </div>
      @error('minprice')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="maxprice"><i class="fa fa-money icon" aria-hidden="true"></i>Estimation maxprice</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('maxprice') is-invalid @enderror" id="maxprice" placeholder="Enter Estimation maxprice in dollars" name="maxprice" value="{{ old('maxprice') }}">
         </div>
      </div>
      @error('maxprice')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="container mb-10">
         <div class="from-group">
            <a class="btn btn-danger mb-10" href="{{url('/')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel</a>
            <button type="submit" class="btn btn-success mb-10"> <i class="fa fa-paper-plane icon" aria-hidden="true"></i> set a property</button>
         </div>
      </div>
      <br>
   </form>
</div>
@endsection
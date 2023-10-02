@extends('layouts.default-compare-nav')
@section('title','Create Property')
@section('main')
<div class="container" style="background-image: url('public/images/form-background.jpg');">
   <h3 class="head" style="margin-top: 70px;">Welcome {{auth()->user()->name}}..!! Fill out the details to post your property</h3>
   <a href="{{url('/')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left icon" aria-hidden="true"></i>Back</a>
   <form class="form-horizontal" action="{{url('/property')}}" method="post" enctype="multipart/form-data">
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
      <h5>1. Property Info</h5>
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
      <span class="color" >* {{$message}}</span>
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
         <label class="control-label col-sm-6 text" for="floor"><i class="fa fa-info icon" aria-hidden="true"></i>Floor Number</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('floor') is-invalid @enderror " id="floor" placeholder="Enter floor number " name="floor"  value="{{ old('floor') }}">
         </div>
      </div>
      @error('floor')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
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
         <label class="control-label col-sm-4 text" for="pincode"><i class="fa fa-map-marker icon" aria-hidden="true"></i>ZipCode</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('zipcode') is-invalid @enderror" id="zipcode" placeholder="Enter Zipcode" name="zipcode"  value="{{ old('zipcode') }}">
         </div>
         @error('zipcode')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-4 text mt-2" for="address"><i class="fa fa-address-book icon"  aria-hidden="true"></i>Address</label>
         <div class="col-sm-10">
            <textarea class="form-control mt-2 @error ('address') is-invalid @enderror" rows="2" id="address" name="address">{{old('address')}}</textarea>
         </div>
      </div>
      @error('address')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="property-size"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>property Size</label>
         <div class="col-sm-10">
            <input type="text" class="form-control mt-2 @error ('property-size') is-invalid @enderror" id="property-size" placeholder="Enter property-size in square feet" name="property-size"  value="{{ old('property-size') }}">
         </div>
      </div>
      @error('property-size')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="lot-size"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Lot Size</label>
         <div class="col-sm-10">
            <input type="text" class="form-control mt-2 @error ('lot-size') is-invalid @enderror" id="lot-size" placeholder="Enter lot-size in square feet" name="lot-size"  value="{{ old('lot-size') }}">
         </div>
      </div>
      @error('lot-size')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="bedroom"><i class="fa fa-bed icon" aria-hidden="true"></i>Number of Bedroom</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('bedroom') is-invalid @enderror" id="bedroom" placeholder="Enter no.of bedroom " name="bedroom"  value="{{ old('bedroom') }}">
         </div>
         @error('bedroom')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="bathroom"><i class="fa fa-bath icon" aria-hidden="true"></i>Number of Bathroom</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('bathroom') is-invalid @enderror" id="bathroom" placeholder="Enter no.of bathroom " name="bathroom"  value="{{ old('bathroom') }}">
         </div>
         @error('bathroom')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="garage"><i class="fa fa-car icon" aria-hidden="true"></i>Garage</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('garage') is-invalid @enderror" id="garage" placeholder="Enter no.of garage " name="garage"  value="{{ old('garage') }}">
         </div>
         @error('garage')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="property-condition"><i class="fa fa-home icon" aria-hidden="true"></i><i class="fa fa-building icon" aria-hidden="true"></i>Property Condition</label>
         <div class="col-sm-10">
            <select class="form-select mt-3" id="property-condition" name="property-condition" >
            <option value="New-one" {{ old('property-condition') == 'New-one' ? 'selected' : ''}}>New One</option>
            <option value="Renovated"  {{ old('property-condition') == 'Renovated' ? 'selected' : ''}}>Renovated</option>
            <option value="Fixer-upper"  {{ old('property-condition') == 'Fixer-upper' ? 'selected' : ''}}>Fixer-Upper</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="currency"><i class="fa fa-money icon aria-hidden="true"></i>currency Type</label>
         <div class="col-sm-10">
            <select class="form-select mt-3" id="currency" name="currency" >
            <option value="$" {{ old('currency') == '$' ? 'selected' : ''}}>$</option>
            <option value="₹" {{ old('currency') == '₹' ? 'selected' : ''}}>₹</option>
            <option value="£" {{ old('currency') == '£' ? 'selected' : ''}}>£</option>
            <option value="¥" {{ old('currency') == '¥' ? 'selected' : ''}}>¥</option>
            <option value="₣" {{ old('currency') == '₣' ? 'selected' : ''}}>₣</option>
            </select>
         </div>
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="price"><i class="fa fa-money icon" aria-hidden="true"></i>Estimation Price</label>
         <div class="col-sm-10">
            <input type="number" class="form-control mt-2 @error ('price') is-invalid @enderror" id="price" placeholder="Enter Estimation Price " name="price" value="{{ old('price') }}">
         </div>
      </div>
      @error('price')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="date"><i class="fa fa-calendar-o icon" aria-hidden="true"></i>Property Date</label>
         <div class="col-sm-10">
            <input type="date" class="form-control mt-2 @error ('date') is-invalid @enderror" id="date" placeholder="Enter bulided/rework date of property" name="date" value="{{ old('date') }}">
         </div>
      </div>
      @error('date')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <div class="form-group">
         <label class="control-label col-sm-4 text" for="description"><i class="fa fa-address-card icon" aria-hidden="true"></i>Description</label>
         <div class="col-sm-10">
            <textarea class="form-control mt-2 @error ('description') is-invalid @enderror" rows="5" id="description" name="description">{{old('description')}}</textarea>
         </div>
      </div>
      @error('description')
      <span class="color">*{{$message}}.</span>
      @enderror<br>
      <h5>2. Upload Property documents</h5>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text " for="image"><i class="fa fa-file-image-o icon" aria-hidden="true"></i>Property Images</label>
         <div class="col-sm-10">
            <input  type="file" class="form-control mt-2 @error ('image') is-invalid @enderror" id="image" placeholder="Enter image" name="image1">
         </div>
         @error('image1')
         <span class="color">*{{$message}}.</span>
         @enderror
      </div>
      <br>
      <div class="form-group">
         <label class="control-label col-sm-6 text" for="document"><i class="fa fa-file-pdf-o icon" aria-hidden="true"></i>Property documents</label>
         <div class="col-sm-10">
            <input  type="file" class="form-control mt-2 @error ('document') is-invalid @enderror" id="document" placeholder="Enter document" name="document">
         </div>
      </div>
      @error('document')
      <span class="color">*{{$message}}.</span>
      @enderror
</div>
<br>
<div class="container mb-10">
<div class="from-group">
<a class="btn btn-danger mb-10" href="{{url('/')}}" onclick="return confirm('Are you sure to cancel') ? window.location.href = '{{url('/')}}' : false;"><i class="fa fa-times icon" aria-hidden="true"></i>Cancel</a>
<button type="submit" class="btn btn-success mb-10"> <i class="fa fa-paper-plane icon" aria-hidden="true"></i> Post a property</button>
</div>
</div><br>
</form>
</div>
@endsection
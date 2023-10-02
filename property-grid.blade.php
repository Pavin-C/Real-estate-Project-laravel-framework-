@extends('layouts.default-nav')
@section('title','Property listing')
@section('content')
<main id="main">
   <section class="intro-single">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-8">
               <div class="title-single-box">
                  <h1 class="title-single">Our Amazing Properties</h1>
               </div>
            </div>
            <div class="col-md-12 col-lg-4">
               <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Home</a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{url('/contact')}}">Contact Admin</a>
                     </li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section class="property-grid grid">
      <div class="container">
      <div class="row">
         @if(isset($errorMessage))
         <div class="alert alert-info">
            <i class="fa fa-info icon" aria-hidden="true"></i>  {{ $errorMessage }}
         </div>
         @endif
         <div class="col-sm-12">
            <div class="grid-option">
               <form method="POST" action="{{url('/property/customfilter')}}">
                  @csrf
                  <select class="custom-select" name="property_type">
                  <option value="all" {{ old('property_type', $propertyType) == 'all' ? 'selected' : '' }}>All</option>
                  <option value="Rent" {{ old('property_type', $propertyType) == 'Rent' ? 'selected' : '' }}>For Rent</option>
                  <option value="Sales" {{ old('property_type', $propertyType) == 'Sales' ? 'selected' : '' }}>For Sale</option>
                  </select>
                  <button type="submit">Apply Filter</button>
               </form>
            </div>
         </div>
         @foreach($property as $list)
         <div class="col-md-4">
            <div class="card-box-a card-shadow">
               <div class="img-box-a">
                  <img src="{{ asset('images/' . $list->image) }}" alt="xcdvxZV" class="img-a img-fluid">
               </div>
               <div class="card-overlay">
                  <div class="card-overlay-a-content">
                     <div class="card-body-a">
                        <div class="card-header-a">
                           <h2 class="card-title-a">
                              <a href="{{url('/property/'.$list->id.'/view')}}">{{$list->property_condition}}
                              <br /> {{$list->property_type}}</a>
                           </h2>
                        </div>
                        <div class="price-box d-flex">
                           <span class="price-a">{{$list->sales_type}} |{{$list->currency.$list->price}}.00</span>
                        </div>
                        <a href="{{url('/property/'.$list->id.'/view')}}" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                        </a>
                     </div>
                     @if(Auth::check())
                     @php
                     $isFavorite = false;
                     foreach($favorite as $fav) {
                     if(auth()->user()->id == $fav->user_id && $list->id == $fav->property_id) {
                     $isFavorite = true;
                     break; // Exit the loop since we found a favorite
                     }
                     }
                     @endphp
                     <div>
                        <form action="">
                           <input id="favorite" class="id" value="{{$list->id}}" hidden/>
                           <button class="btn" type="submit" style="border: none; background-color: transparent; cursor: pointer;">
                           <i class="fas fa-bookmark" style="color: {{ $isFavorite ? 'yellow' : 'white' }};"></i>
                           </button>
                        </form>
                     </div>
                     @endif
                     <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                           <li>
                              <h4 class="card-info-title">Area</h4>
                              <span>{{$list->lot_size."ft"}}
                              <sup>2</sup>
                              </span>
                           </li>
                           @if($list->bedroom)
                           <li>
                              <h4 class="card-info-title">Beds</h4>
                              <span>{{$list->bedroom}}</span>
                           </li>
                           @endif
                           @if($list->bathroom)
                           <li>
                              <h4 class="card-info-title">Baths</h4>
                              <span>{{$list->bathroom}}</span>
                           </li>
                           @endif
                           @if($list->floor_number)
                           <li>
                              <h4 class="card-info-title">Floor-No</h4>
                              <span>{{$list->floor_number}}</span>
                           </li>
                           @endif
                           <li>
                              <h4 class="card-info-title">PropertyArea</h4>
                              <span>{{$list->property_size."ft"}}<sup>2</sup></span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         <div class="row">
            <div class="col-sm-12">
               <nav class="pagination-a">
                  {{$property->links()}}
               </nav>
            </div>
         </div>
      </div>
   </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
   
           $('.btn').click(function(event){
             event.preventDefault();
             var button = $(this);
           var name = button.siblings('.id').val();
           var icon = button.find('i');
           $.ajax({
            type: 'POST',
            url: '{{route("property.favorite")}}',
            data: {
               '_token' : '{{ csrf_token() }}',
               'property_id' : name,
            },
            success :function(response) {
                       if(response.status == 200)
                       {
                         icon.css("color", "yellow");
                       } else if (response.status == 204) {
                         icon.css("color", "white");
                       }
                    },
        });      
     });
   });
</script>
@endsection
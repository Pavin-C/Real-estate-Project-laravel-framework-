@extends('layouts.default-nav')
@section('title','Property')
@section('content')
<main id="main">
   <section class="intro-single">
      <div class="container">
         @if (session('alert'))
         <div class="alert alert-success">
            {{ session('alert') }}
         </div>
         @endif
         <div class="row">
            <div class="col-md-12 col-lg-8">
               <div class="title-single-box">
                  <h4 class="title-single">{{$property->type}} - {{$property->property_type}}</h4>
                  <span class="color-text-a">Location-{{$property->location}}, IL {{$property->zipcode}}</span>
               </div>
            </div>
            <div class="col-md-12 col-lg-4">
               <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Home</a>
                     </li>
                     <li class="breadcrumb-item">
                        <a href="{{url('/property-listing')}}">Properties</a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">
                        {{$property->id}}
                     </li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section class="property-single nav-arrow-b">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8">
               <div id="property-single-carousel" class="swiper">
                  <div class="swiper-wrapper">
                     <div class="carousel-item-b swiper-slide">
                        <img src="{{ asset('images/' . $property->image) }}" alt="property-image">
                     </div>
                     <div class="carousel-item-b swiper-slide">
                        <img src="{{ asset('images/' . $property->image) }}" alt="property-image">
                     </div>
                  </div>
               </div>
               <div class="property-single-carousel-pagination carousel-pagination"></div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="row justify-content-between">
                  <div class="col-md-5 col-lg-4">
                     <div class="property-price d-flex justify-content-center foo">
                        <div class="card-header-c d-flex">
                           <div class="card-box-ico">
                              <span class="bi bi-cash"></span>
                           </div>
                           <div class="card-title-c align-self-center" style="position:relative; right=50px;">
                              <h5 class="title-c">{{$property->currency}}{{$property->price}}</h5>
                           </div>
                        </div>
                     </div>
                     <div class="property-summary">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="title-box-d section-t4">
                                 <h3 class="title-d">Quick Summary</h3>
                              </div>
                           </div>
                        </div>
                        <div class="summary-list">
                           <ul class="list">
                              <li class="d-flex justify-content-between">
                                 <strong>Property ID:</strong>
                                 <span>{{$property->id}}</span>
                              </li>
                              <li class="d-flex justify-content-between">
                                 <strong>Location:</strong>
                                 <span>{{$property->location}}, IL {{$property->zipcode}}</span>
                              </li>
                              <li class="d-flex justify-content-between">
                                 <strong>Property Type:</strong>
                                 <span>{{$property->property_type}}</span>
                              </li>
                              <li class="d-flex justify-content-between">
                                 <strong>Status:</strong>
                                 <span>{{$property->sales_type}}</span>
                              </li>
                              <li class="d-flex justify-content-between">
                                 <strong>Area:</strong>
                                 <span>{{$property->lot_size}}
                                 ft<sup>2</sup>
                                 </span>
                              </li>
                              @if($property->floor_number)
                              <li class="d-flex justify-content-between">
                                 <strong>Beds:</strong>
                                 <span>{{$property->floor_number}}</span>
                              </li>
                              @endif
                              @if($property->property_condition)
                              <li class="d-flex justify-content-between">
                                 <strong>Property-condition:</strong>
                                 <span>{{$property->property_condition}}</span>
                              </li>
                              @endif
                              @if($property->bedroom)
                              <li class="d-flex justify-content-between">
                                 <strong>Beds:</strong>
                                 <span>{{$property->bedroom}}</span>
                              </li>
                              @endif
                              @if($property->bathroom)
                              <li class="d-flex justify-content-between">
                                 <strong>Baths:</strong>
                                 <span>{{$property->bathroom}}</span>
                              </li>
                              @endif
                              @if($property->garage)
                              <li class="d-flex justify-content-between">
                                 <strong>Garage:</strong>
                                 <span>{{$property->garage}}</span>
                              </li>
                              @endif
                              <li class="d-flex justify-content-between">
                                 <strong>Ratings</strong>
                                 <span>{{$rating}}(5 star)</span>
                              </li>
                              <li class="d-flex justify-content-between">
                                 <strong>Address:</strong>
                                 <span>{{$property->address}}</span>
                              </li>
                           </ul>
                        </div>
                        <div class="rating-box">
                           <header>How was the property?</header>
                           <div class="stars">
                              <span class="star" value="1"><i class="fa-solid fa-star"></i></span>
                              <span class="star" value="2"><i class="fa-solid fa-star "></i></span>
                              <span class="star" value="3"><i class="fa-solid fa-star"></i></span>
                              <span class="star" value="4"><i class="fa-solid fa-star"></i></span>
                              <span class="star" value="5"><i class="fa-solid fa-star"></i></span>
                           </div>
                        </div>
                        <br>
                        <div class="container mt-4">
                           <form>
                              <div class="row">
                                 <div class="col">
                                    <h3>How was the property?</h3>
                                    <input class="form-control name" type="text" placeholder="Enter your name" name="name" >
                                    <span class="text-danger" id="nameerror"></span>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col">
                                    <textarea class="form-control comment" placeholder="Enter your feedback" name="feedback" cols="35" rows="5" ></textarea>
                                    <span class="text-danger" id="commenterror"></span>
                                 </div>
                              </div>
                              <div class="row mt-3" style="text-align: right;">
                                 <div class="col">
                                    <button type="reset" class="btn btn-info reset">Reset<i class="fa fa-refresh" aria-hidden="true"></i></button>
                                 </div>
                                 <div class="col">
                                    <button type="submit" class="btn btn-success review">Send feedback<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <br>
                     </div>
                  </div>
                  <div class="col-md-7 col-lg-7 section-md-t3">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="title-box-d">
                              <h3 class="title-d">Property Description</h3>
                           </div>
                        </div>
                     </div>
                     <div class="property-description">
                        <p class="description color-text-a">
                           {{$property->description}}
                        </p>
                     </div>
                     <div class="row section-t3">
                        <div class="col-sm-12">
                           <div class="title-box-d">
                              <h3 class="title-d">Property Location</h3>
                              <div>
                                 <iframe id="mapIframe" src="https://www.google.com/maps/?q={{$property->address}}&output=embed" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="container mt-1">
                        <div class="dropdown dropend">
                           <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                           Reviews
                           </button>
                           <div class="dropdown-menu" style="max-height: 150px; min-width: 500px; overflow-y: auto; padding: 10px;">
                              @foreach($review as $comment)
                              <div class="review" style="border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 10px;">
                                 <strong>{{$comment->name}}</strong>
                                 <p style="padding: 10px; margin: 0;">{{$comment->comment}}</p>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row section-t3">
                  <div class="col-sm-12">
                     <div class="title-box-d">
                        <h3 class="title-d">Contact Agent</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 col-lg-4">
                     <img src="{{ asset('images/' . $property->user->image) }}" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-6 col-lg-4" >
                     <div class="property-agent">
                        <h4 class="title-agent" >{{$property->user->name}}</h4>
                        <p class="color-text-a">
                           We understand that searching for the perfect home can be a meticulous process, and we are delighted that our property has piqued your interest. If you have any questions or require additional information about the property or the neighborhood, please don't hesitate to reach out to us. We are here to assist you in any way we can to help you make an informed decision.
                        </p>
                        <ul class="list-unstyled">
                           <li class="d-flex justify-content-between">
                              <strong>Phone:</strong>
                              <span class="color-text-a">{{$property->user->phone_number}}</span>
                           </li>
                           <li class="d-flex justify-content-between">
                              <strong>Email:</strong>
                              <span class="color-text-a">{{$property->user->email}}</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-4">
                     @if(session('success'))
                     <div class="alert alert-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ session('success') }}
                     </div>
                     @endif 
                     <div class="property-contact">
                        <form class="form-a" action="{{url('/contact-agent/'.$property->id)}}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-md-12 mb-1 ">
                                 <div class="form-group">
                                    <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" name="name" value="{{old('name')}}">
                                 </div>
                                 @error('name')
                                 <span style="color: red;">* {{$message}}</span>
                                 @enderror<br>
                              </div>
                              <div class="col-md-12 mb-1">
                                 <div class="form-group">
                                    <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" name="email" value="{{old('email')}}">
                                 </div>
                                 @error('email')
                                 <span style="color: red;">* {{$message}}</span>
                                 @enderror<br>
                              </div>
                              <div class="col-md-12 mb-1">
                                 <div class="form-group">
                                    <textarea id="textMessage" class="form-control" placeholder="Information to know *" name="message" cols="45" rows="8" name="message">{{old('message')}}</textarea>
                                 </div>
                                 @error('message')
                                 <span style="color: red;">* {{$message}}</span>
                                 @enderror<br>
                              </div>
                              <div class="col-md-12 mt-3">
                                 <button type="submit" class="btn btn-a">Send Message</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
  
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   const stars = document.querySelectorAll(".stars i");
   stars.forEach((star, index1) => {
   star.addEventListener("click", () => {
     stars.forEach((star, index2) => {
       index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
     });
   });
   });
   $(document).ready(function() {
     $('.star').click(function() {
       var ratingValue = $(this).attr('value');
       var propertyId = '{{ $property->id }}'; 
   
       $.ajax({
         type: 'POST',
         url: '{{ route("store.rating") }}',
         data: {
           '_token': '{{ csrf_token() }}',
           'rating': ratingValue,
           'property_id': propertyId
         },
         success: function(data) {
           alert('Thanks for your rating..');
         },
         error: function(xhr, status, error) {
           alert('Rating failed...!');
         }
       });
     });
   
     $('.review').click(function(event) {
      event.preventDefault();
         var name = $('.name').val();
         var comment = $('.comment').val();
         var propertyid = {{$property->id}};
         $.ajax({
             type: 'POST',
             url: '{{route("property.review")}}',
             data: {
                '_token' : '{{ csrf_token() }}',
                'name'   : name,
                'property_id' : propertyid,
                'comment' : comment,
             },
             success :function(response) {
                        if(response.status == 400)
                        {
                           $('#nameerror').html(response.errors.name);
                           $('#commenterror').html(response.errors.comment);
                        } else if (response.status === 200) {
                            $('.name').val('');
                            $('.comment').val('');
                            alert('Thank for your review');  
                        }
                     },     
         });
     });
   
     $('.reset').click(function(event){
      event.preventDefault();
      $('#nameerror').html('');
       $('#commenterror').html('');
       $('.name').val('');
       $('.comment').val('');
     })
   });
</script>
@endsection
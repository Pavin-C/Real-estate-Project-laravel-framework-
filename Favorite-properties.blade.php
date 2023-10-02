@extends('layouts.default-nav')
@section('title','Favorite properties')
@section('content')
<main id="main">
   <section class="intro-single">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-8">
               <div class="title-single-box">
                  <h1 class="title-single">Favorite Properties</h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="property-grid grid">
      <div class="container">
      <div class="row">
         <div class="col-sm-12">
         </div>
         @foreach($favorite as $fav)
         <div class="col-md-4">
            <div class="card-box-a card-shadow">
               <div class="img-box-a">
                  <img src="{{ asset('images/' . $fav->favbelongproperty->image) }}" alt="xcdvxZV" class="img-a img-fluid">
               </div>
               <div class="card-overlay">
                  <div class="card-overlay-a-content">
                     <div class="card-body-a">
                        <div class="price-box d-flex">
                           <span class="price-a">{{$fav->favbelongproperty->location}}</span>
                        </div>
                        <div class="price-box d-flex">
                           <span class="price-a">{{$fav->favbelongproperty->sales_type}} |{{$fav->favbelongproperty->currency.$fav->favbelongproperty->price}}</span>
                        </div>
                        <a href="{{url('/property/'.$fav->favbelongproperty->id.'/view')}}" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                        </a>
                     </div>
                     <div>
                        <div>
                           <form action="">
                              <input id="favorite" class="id" value="{{$fav->favbelongproperty->id}}" hidden/>
                              <button class="btn" type="submit" style="border: none; background-color: transparent; cursor: pointer;" >
                              <i class="fas fa-bookmark" style="color:yellow;" ></i>
                              </button>
                           </form>
                        </div>
                     </div>
                     <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                           <li>
                              <h4 class="card-info-title">Area</h4>
                              <span>{{$fav->favbelongproperty->lot_size."ft"}}
                              <sup>2</sup>
                              </span>
                           </li>
                           @if($fav->favbelongproperty->bedroom)
                           <li>
                              <h4 class="card-info-title">Beds</h4>
                              <span>{{$fav->favbelongproperty->bedroom}}</span>
                           </li>
                           @endif
                           @if($fav->favbelongproperty->bathroom)
                           <li>
                              <h4 class="card-info-title">Baths</h4>
                              <span>{{$fav->favbelongproperty->bathroom}}</span>
                           </li>
                           @endif
                           @if($fav->favbelongproperty->floor_number)
                           <li>
                              <h4 class="card-info-title">Floor-No</h4>
                              <span>{{$fav->favbelongproperty->floor_number}}</span>
                           </li>
                           @endif
                           <li>
                              <h4 class="card-info-title">PropertyArea</h4>
                              <span>{{$fav->favbelongproperty->property_size."ft"}}<sup>2</sup></span>
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
                  {{$favorite->links()}}
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
            url: '{{route("user.property.favorite")}}',
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
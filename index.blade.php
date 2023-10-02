@extends('layouts.default-nav')
@section('title','Home')
@section('content')
<div class="intro intro-carousel swiper position-relative">
   <div class="swiper-wrapper">
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
         <div class="overlay overlay-a"></div>
         <div class="intro-content display-table">
            <div class="table-cell">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="intro-body">
                           <p class="intro-title-top">Doral, Florida
                              <br> 78345
                           </p>
                           <h1 class="intro-title mb-4 ">
                              <span class="color-b">204 </span> Mount
                              <br> Olive Road Two
                           </h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
         <div class="overlay overlay-a"></div>
         <div class="intro-content display-table">
            <div class="table-cell">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="intro-body">
                           <p class="intro-title-top">Doral, Florida
                              <br> 78345
                           </p>
                           <h1 class="intro-title mb-4">
                              <span class="color-b">204 </span> Rino
                              <br> Venda Road Five
                           </h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
         <div class="overlay overlay-a"></div>
         <div class="intro-content display-table">
            <div class="table-cell">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="intro-body">
                           <p class="intro-title-top">Doral, Florida
                              <br> 78345
                           </p>
                           <h1 class="intro-title mb-4">
                              <span class="color-b">204 </span> Alira
                              <br> Roan Road One
                           </h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="swiper-pagination"></div>
</div>
<main id="main">
   <section class="section-services section-t8">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title-wrap d-flex justify-content-between">
                  <div class="title-box">
                     <h2 class="title-a" style="font-size: 36px; color: #ff6600; text-align: center; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; margin-top: 20px;">Our Services</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="card-box-c foo">
                  <div class="card-header-c d-flex">
                     <div class="card-box-ico">
                        <span class="bi bi-cart"></span>
                     </div>
                     <div class="card-title-c align-self-center">
                        <h2 class="title-c">Lifestyle</h2>
                     </div>
                  </div>
                  <div class="card-body-c">
                     <p class="content-c" style="font-family: 'Arial', sans-serif; font-size: 18px; color: #333; text-align: center; background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                        "Welcome to the world of limitless possibilities,
                        where your lifestyle meets its perfect match in the realm of real estate. Dive into a realm of luxury, comfort, and style, as we embark on a journey to discover the homes that reflect your unique way of life. Join us in exploring the art of living, where every property is a canvas waiting for your personal touch. It's not just real estate; it's a lifestyle that defines you."
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card-box-c foo">
                  <div class="card-header-c d-flex">
                     <div class="card-box-ico">
                        <span class="bi bi-calendar4-week"></span>
                     </div>
                     <div class="card-title-c align-self-center">
                        <h2 class="title-c">Buy</h2>
                     </div>
                  </div>
                  <div class="card-body-c">
                     <p class="content-c" style="font-family: 'Arial', sans-serif; font-size: 18px; color: #333; text-align: center; background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                        "Unlock the door to your dreams and step into a world of possibilities – it's time to make your mark in the world of real estate. Whether you're a first-time buyer or a seasoned investor, we're here to guide you through the exhilarating journey of acquiring your very own piece of paradise. Get ready to embrace a new chapter filled with opportunities, where the keys to your future are just a decision away. It's not just a purchase; it's your path to prosperity."
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card-box-c foo">
                  <div class="card-header-c d-flex">
                     <div class="card-box-ico">
                        <span class="bi bi-card-checklist"></span>
                     </div>
                     <div class="card-title-c align-self-center">
                        <h2 class="title-c">Sell</h2>
                     </div>
                  </div>
                  <div class="card-body-c">
                     <p class="content-c" style="font-family: 'Arial', sans-serif; font-size: 18px; color: #333; text-align: center; background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                        "Prepare to embark on a transformative journey as you step into the world of real estate sales. Your property is not just a structure; it's a story waiting to be told. We are here to empower you to showcase your real estate masterpiece to the world. Whether you're upgrading, downsizing, or simply seeking a new adventure, selling your property with us means crafting a narrative of change and opportunity. It's not just a sale; it's the next chapter in your journey."
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="section-property section-t8">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title-wrap d-flex justify-content-between">
                  <div class="title-box">
                     <h2 class="title-a" style="font-size: 36px; color: #ff6600; text-align: center; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; margin-top: 20px;">Latest properties</h2>
                  </div>
               </div>
            </div>
         </div>
         <div id="property-carousel" class="swiper">
            <div class="swiper-wrapper">
               @foreach($property as $list)
               <div class="carousel-item-b swiper-slide">
                  <div class="card-box-a card-shadow">
                     <div class="img-box-a">
                        <img src="{{ asset('images/' . $list->image) }}" alt="" class="img-a img-fluid">
                     </div>
                     <div class="card-overlay">
                        <div class="card-overlay-a-content">
                           <div class="card-header-a">
                              <h2 class="card-title-a">
                                 <a href="{{url('/property/'.$list->id.'/view')}}">{{$list->property_condition}}
                                 <br /> {{$list->property_type}}</a>
                              </h2>
                           </div>
                           <div class="card-body-a">
                              <div class="price-box d-flex">
                                 <span class="price-a">{{$list->sales_type}} | {{$list->currency}} {{$list->price}}.00</span>
                              </div>
                              <a href="{{url('/property/'.$list->id.'/view')}}" class="link-a">Click here to view
                              <span class="bi bi-chevron-right"></span>
                              </a>
                           </div>
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
            </div>
         </div>
         <div class="propery-carousel-pagination carousel-pagination"></div>
      </div>
   </section>
   <section class="section-agents section-t8">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title-wrap d-flex justify-content-between">
                  <div class="title-box">
                     <h2 class="title-a" style="font-size: 36px; color: #ff6600; text-align: center; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; margin-top: 20px;">Best Sellers</h2>
                  </div>
                  <div class="title-link">
                     <a href="{{ url('/agent') }}" style="font-size: 36px; color: #ff6600; text-align: center; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; margin-top: 20px;">All Sellers
                     <span class="bi bi-chevron-right"></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            @foreach($users as $user)
            <div class="col-md-4">
               <div class="card-box-d">
                  <div class="card-img-d">
                     <img src="{{ asset('images/' . $user->image) }}" alt="" class="img-d img-fluid">
                  </div>
                  <div class="card-overlay card-overlay-hover">
                     <div class="card-header-d">
                        <div class="card-title-d align-self-center">
                           <h3 class="title-d">
                              <a href="{{ url("agent-single.html") }}" class="link-two">{{$user->name}}
                              <br></a>
                           </h3>
                        </div>
                     </div>
                     <div class="card-body-d">
                        <div class="info-agents color-a">
                           <p>
                              <strong>Phone: </strong>{{$user->phone_number}}
                           </p>
                           <p>
                              <strong>Email: </strong>{{$user->email}}
                           </p>
                        </div>
                     </div>
                     <div class="card-footer-d">
                        <div class="socials-footer d-flex justify-content-center">
                           <ul class="list-inline">
                              <li class="list-inline-item">
                                 <a  class="link-one">
                                 <i class="bi bi-facebook" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a  class="link-one">
                                 <i class="bi bi-twitter" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a  class="link-one">
                                 <i class="bi bi-instagram" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li class="list-inline-item">
                                 <a class="link-one">
                                 <i class="bi bi-linkedin" aria-hidden="true"></i>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title-wrap d-flex justify-content-between">
                  <div class="title-box">
                     <h2 class="title-a" style="font-size: 36px; color: #ff6600; text-align: center; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; margin-top: 20px;">Subscription</h2>
                  </div>
               </div>
            </div>
         </div>
         <div id="testimonial-carousel" class="swiper">
            <div class="swiper-wrapper">
               <div class="carousel-item-a swiper-slide">
                  <div class="testimonials-box">
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                           <div class="testimonial-img">
                              <img src="{{ asset('/assets/img/gold package.png') }}" alt="" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div class="testimonial-ico">
                              <i class="bi bi-chat-quote-fill"></i>
                           </div>
                           <div class="testimonials-content">
                              <p class="testimonial-text">
                                 Welcome to our exclusive real estate subscription service! Joining us means gaining access to a world of opportunities in the real estate market.
                              </p>
                           </div>
                           @if(auth()->user()->subscribe == 1)
                           <div class="testimonial-author-box">
                              <a  class="testimonial-author btn btn-danger">Subscribed</a>
                           </div>
                           @else
                           <div class="testimonial-author-box">
                              <a href="{{url('/checkout')}}" class="testimonial-author btn btn-danger">Subscribe Rs.499</a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item-a swiper-slide">
                  <div class="testimonials-box">
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                           <div class="testimonial-img">
                              <img src="{{ asset('/assets/img/gold package.png') }}" alt="" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div class="testimonial-ico">
                              <i class="bi bi-chat-quote-fill"></i>
                           </div>
                           <div class="testimonials-content">
                              <p class="testimonial-text">
                                 Welcome to our exclusive real estate subscription service! Joining us means gaining access to a world of opportunities in the real estate market.
                              </p>
                           </div>
                           @if(auth()->user()->subscribe == 1)
                           <div class="testimonial-author-box">
                              <a  class="testimonial-author btn btn-danger">Subscribed</a>
                           </div>
                           @else
                           <div class="testimonial-author-box">
                              <a href="{{url('/checkout')}}" class="testimonial-author btn btn-danger">Subscribe Rs.499</a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="testimonial-carousel-pagination carousel-pagination"></div>
      </div>
   </section>
</main>
@endsection
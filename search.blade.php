<div class="click-closed"></div>
<div class="box-collapse">
   <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
   </div>
   <span class="close-box-collapse right-boxed bi bi-x"></span>
   <div class="box-collapse-wrap form">
      <form class="form-a" method="POST" action="{{url('/property/search')}}">
         @csrf
         <div class="row">
            <div class="col-md-12 mb-2">
               <div class="form-group">
                  <label class="pb-2" for="PropertyType">Property Type</label>
                  <select class="form-control form-select form-control-a" id="PropertyType" name="type">
                     <option value="all">All Type</option>
                     <option value="House">Home</option>
                     <option value="Apartment">Apartment</option>
                     <option value="Land">Land</option>
                     <option value="Building">Building</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="Type">Buy type</label>
                  <select class="form-control form-select form-control-a" id="Type" name="sales_type">
                     <option value="all">All Type</option>
                     <option value="Rent">For Rent</option>
                     <option value="Sales">For Sale</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="city">City</label>
                  <input type="text" class="form-control form-control-a" id="city" name="city" placeholder="Enter city">
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="bedrooms">Bedrooms</label>
                  <select class="form-control form-select form-control-a" id="bedrooms" name="bedroom">
                     <option value="all">Any</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">Above 03</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="garages">Garages</label>
                  <select class="form-control form-select form-control-a" id="garages" name="garage">
                     <option value="all">Any</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">Above 03</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="bathrooms">Bathrooms</label>
                  <select class="form-control form-select form-control-a" id="bathrooms" name="bathroom">
                     <option value="all">Any</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">Above 03</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="price">Price</label>
                  <select class="form-control form-select form-control-a" id="price" name="price">
                     <option value="all">All price</option>
                     <option value="1">$50-$1000</option>
                     <option value="2">$1000-10000</option>
                     <option value="3">$10000-100000</option>
                     <option value="4">Greater than 100000</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="floor">Floor</label>
                  <input type="number" class="form-control form-control-a" id="floor" name="floor" placeholder="Enter Floor (0-Groundfloor)">
               </div>
            </div>
            <div class="col-md-6 mb-2">
               <div class="form-group mt-3">
                  <label class="pb-2" for="condition">Property Condition</label>
                  <select class="form-control form-select form-control-a" id="condition" name="condition">
                     <option value="all">All</option>
                     <option value="New-one">New-one</option>
                     <option value="Renovated">Renovated</option>
                     <option value="Fixer-Upper">Fixer-Upper</option>
                  </select>
               </div>
            </div>
            <button type="submit" class=" btn-success">Search Property</button>
         </div>
      </form>
   </div>
</div>
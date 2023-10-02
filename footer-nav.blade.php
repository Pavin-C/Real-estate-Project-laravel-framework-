<div class="modal" id="calci" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Mortgage Calculator</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="container">
               <form class="row g-3">
                  <div class="col-md-12">
                     <h4 class="text-primary">Enter the price only in dollars</h4>
                  </div>
                  <div class="col-md-6">
                     <label for="propertyPrice" class="form-label">Property Price ($)</label>
                     <input type="number" class="form-control" id="propertyPrice" name="propertyPrice" placeholder="Enter property price" required>
                  </div>
                  <div class="col-md-6">
                     <label for="downPayment" class="form-label">Down Payment ($)</label>
                     <input type="number" class="form-control" id="downPayment" name="downPayment" placeholder="Enter down payment" required>
                  </div>
                  <div class="col-md-6">
                     <label for="loanTerm" class="form-label">Loan Term (years)</label>
                     <input type="number" class="form-control" id="loanTerm" name="loanTerm" placeholder="Enter loan term" required>
                  </div>
                  <div class="col-md-6">
                     <label for="interestRate" class="form-label">Interest Rate (%)</label>
                     <input type="number" class="form-control" id="interestRate" name="interestRate" placeholder="Enter interest rate" required>
                  </div>
               </form>
               <div class="text-success mt-3" id="monthly"></div>
               <div class="text-success mt-2" id="interest"></div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary calci">Calculate Mortgage</button>
         </div>
      </div>
   </div>
</div>
<section class="section-footer">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-4">
            <div class="widget-a">
               <div class="w-header-a">
                  <h3 class="w-title-a text-brand">EstateAgency</h3>
               </div>
               <div class="w-body-a">
                  <p class="w-text-a color-text-a">
                     Welcome to My Estate Agency, your trusted partner in real estate. We specialize in helping you find the perfect home or property that suits your needs and preferences. With our dedicated team and extensive property listings, we make the buying or renting process seamless and enjoyable.
                  </p>
               </div>
               <div class="w-footer-a">
                  <ul class="list-unstyled">
                     <li class="color-a">
                        <span class="color-text-a">Phone .</span> estateagency@gmail.com
                     </li>
                     <li class="color-a">
                        <span class="color-text-a">Email .</span> 9785345237
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-4 section-md-t3">
            <div class="widget-a">
               <div class="w-header-a">
                  <h3 class="w-title-a text-brand">The Company</h3>
               </div>
               <div class="w-body-a">
                  <div class="w-body-a">
                     <ul class="list-unstyled">
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a href="{{url('/sitemap')}}" class="footer">Site Map</a>
                        </li>
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a class="footer">Legal</a>
                        </li>
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a class="footer">Agent Admin</a>
                        </li>
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a class="footer">Careers</a>
                        </li>
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a class="footer">Affiliate</a>
                        </li>
                        <li class="item-list-a">
                           <i class="bi bi-chevron-right"></i> <a class="footer">Privacy Policy</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-4 section-md-t3">
            <div class="widget-a">
               <div class="w-header-a">
                  <h3 class="w-title-a text-brand">International sites</h3>
               </div>
               <div class="w-body-a">
                  <ul class="list-unstyled">
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">Venezuela</a>
                     </li>
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">China</a>
                     </li>
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">Hong Kong</a>
                     </li>
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">Argentina</a>
                     </li>
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">Singapore</a>
                     </li>
                     <li class="item-list-a">
                        <i class="bi bi-chevron-right"></i> <a class="footer">Philippines</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<footer>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <nav class="nav-footer">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="{{ url('/') }}" class="footer">Home</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="{{ url('/about') }}" class="footer">About</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="{{ url('/property-listing') }}" class="footer">Property</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="{{ url('/contact') }}" class="footer">Contact</a>
                  </li>
               </ul>
            </nav>
            <div class="socials-a">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a >
                     <i class="bi bi-facebook" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a >
                     <i class="bi bi-twitter" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a >
                     <i class="bi bi-instagram" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a >
                     <i class="bi bi-linkedin" aria-hidden="true"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="copyright-footer">
               <p class="copyright color-text-a">
                  &copy; Copyright
                  <span class="color-a">EstateAgency</span> All Rights Reserved.
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>
<div id="preloader"></div>
<a href="{{ url('#') }}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
   
     $(document).on('click','.calci',function(event){
       event.preventDefault();
       var data = {
               'propertyPrice'       : $('#propertyPrice').val(),
               'downPayment' : $('#downPayment').val(),
               'loanTerm': $('#loanTerm').val(),
               'interestRate' : $('#interestRate').val()
           }
           $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   $.ajax({
               url      :'/calculate-mortgage',
               type     :'POST',
               data     : data,
               datatype : 'json',
               success  : function(response) {
                   if(response.status == 200)
                   {
                     $('#monthly').html("MonthlyPayment=$"+response.monthly);
                     $('.propertyPrice').val('');
                     $('.downPayment').val('');
                     $('.loanTerm').val('');
                     $('.interestTerm').val('');
                     console.log(response.data);
                   } 
               },
   
           });
     });
   });
</script>
</body>
</html>
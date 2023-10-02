@include('layouts.header-nav')
@php
$stripe_key = 'pk_test_51Nv1HISILeSKfPpBNwbzuDREfto7M3NewyxpNE0FoXxb4tInijMRQdaZs6U5JmMeS7jCUEmVbfwj2wJiBQ91xaxj00HrlEU8Ol';
@endphp
<div class="container" style="margin-top:10%;margin-bottom:10%">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="">
   <p>Your Total Amount is 499 INR</p>
</div>
<div class="card">
<form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
   @csrf   
   <div class="form-group">
   <div class="card-header">
      <label for="card-element">
      Your Name
      </label>
      <input type="text" class="form-control" name="customer_name" required>
   </div>
   <div class="form-group">
      <div class="card-header">
         <label for="card-element">
         Address
         </label>
         <input type="text" class="form-control" name="address_line1" required>
      </div>
      <div class="form-group">
         <div class="card-header">
            <label for="card-element">
            City
            </label>
            <input type="text" class="form-control" name="city" required>
         </div>
         <div class="form-group">
            <div class="card-header">
               <label for="card-element">
               Postal Code
               </label>
               <input type="text" class="form-control" name="postal_code" required>
            </div>
            <div class="form-group">
               <div class="card-header">
                  <label for="card-element">
                  Country
                  </label>
                  <input type="text" class="form-control" name="country" required>
               </div>
               <div class="form-group">
                  <div class="card-header">
                     <label for="card-element">
                     Enter your credit card information
                     </label>
                  </div>
                  <div class="card-body">
                     <div id="card-element">
                     </div>
                     <div id="card-errors" role="alert"></div>
                     <input type="hidden" name="plan" value="" />
                  </div>
               </div>
               <div class="card-footer">
                  <button
                     id="card-button"
                     class="btn btn-dark"
                     type="submit"
                     data-secret="{{ $intent }}"
                     > Pay </button>
               </div>
</form>
</div>
</div>
</div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
  
   var style = {
       base: {
           color: '#32325d',
           lineHeight: '18px',
           fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
           fontSmoothing: 'antialiased',
           fontSize: '16px',
           '::placeholder': {
               color: '#aab7c4'
           }
       },
       invalid: {
           color: '#fa755a',
           iconColor: '#fa755a'
       }
   };
   
   const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' });
   const elements = stripe.elements(); 
   const cardElement = elements.create('card', { style: style }); 
   const cardButton = document.getElementById('card-button');
   const clientSecret = cardButton.dataset.secret;
   
   cardElement.mount('#card-element'); 
   cardElement.addEventListener('change', function(event) {
       var displayError = document.getElementById('card-errors');
       if (event.error) {
           displayError.textContent = event.error.message;
       } else {
           displayError.textContent = '';
       }
   });
 
   var form = document.getElementById('payment-form');
   
   form.addEventListener('submit', function(event) {
       event.preventDefault();
       
       stripe.handleCardPayment(clientSecret, cardElement, {
           payment_method_data: {
             
           }
       })
       .then(function(result) {
           console.log(result);
           if (result.error) {
               var errorElement = document.getElementById('card-errors');
               errorElement.textContent = result.error.message;
           } else {
               console.log(result);
               form.submit();
           }
       });
   });
</script>
@include('layouts.footer-nav')
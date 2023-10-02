<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Nv1HISILeSKfPpBhlTDjTviW7FdAGNuPtEoRtOT9xlzNm0JUJVjUXirhG38Rl63Xexa9FkdqIRLQsQzMaxrbVl900Y7IcABxG');

        		
		$amount = 499;
        $amount*=100;
        $customer_info = [
            'name' => $request->input('customer_name'),
            'address' => [
                'line1' => $request->input('address_line1'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
                'country' => $request->input('country'),
            ],
        ];
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Payment for booking',
			'amount' => $amount,
			'currency' => 'INR',
			'payment_method_types' => ['card'],
            'customer' => $customer_info,
           
		]);
		$intent = $payment_intent->client_secret;
		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $user->subscribe = 1;
        $user->update();
      return view('subscribe.success');
    }
}
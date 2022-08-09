<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test Payment from LaraTips." 
        ]);
  
        Session::flash('success', 'Payment has been successfully completed.');
          
        return back();
    }
}

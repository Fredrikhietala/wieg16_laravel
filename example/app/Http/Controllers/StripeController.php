<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\Subscription;

class StripeController extends Controller
{
    public function index() {
        return view('stripe/index');
    }

    public function checkout(Request $request) {
        $input = $request->input();
        //dd($input);

        Stripe::setApiKey('sk_test_Z7VRz8NYMDcoDWLMy3uDcdBW');
        /*$charge = Charge::create([
           "amount" => 999,
           "currency" => "sek",
           "source" => $input['stripeToken'],
           "description" => "Charge for ".$input['stripeEmail']
        ]);*/

        $charge = Charge::retrieve('ch_1BWKdlAiemYhbREJICmThP8f');
        $charges = Charge::all();
        dd($charges);
        // ch_1BWKdlAiemYhbREJICmThP8f
    }

    public function subscription() {
        Stripe::setApiKey('sk_test_Z7VRz8NYMDcoDWLMy3uDcdBW');
        /*$plan = Plan::create([
            "name" => "Basic Plan",
            "id" => "basic-monthly-free",
            "interval" => "month",
            //"interval_count" => 3,
            "currency" => "sek",
            "amount" => 0
        ]);*/
        $plan = Plan::retrieve('basic-monthly-free');
        $customer = Customer::retrieve('cus_Bu9ETtIw4nSR4m');

        /*$customer = Customer::create([
           "email" => "hietala.fredrik@gmail.com",
        ]);*/

        $sub = Subscription::create([
            "customer" => $customer->id,
            "items" => [
                [
                "plan" => "basic-monthly-free",
                ],
            ],
        ]);

        dd($sub);
    }
}

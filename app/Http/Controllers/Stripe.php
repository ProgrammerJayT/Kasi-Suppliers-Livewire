<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stripe extends Controller
{
    //
    public static function checkCard($number, $year, $month, $cvc){

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $token = $stripe->tokens->create([
            'card' => [
                'number' => $number,
                'exp_month' => $month,
                'exp_year' => $year,
                'cvc' => $cvc,
            ],
        ]);

        dd($token);

        return $token;
    }
}

<?php

namespace App\Repositories;
use Stripe;

use Illuminate\Support\Facades\Auth;
class PaymentRepository implements ImmoRepositoryInterface
{

    protected $property;

	public function __construct()
	{
	}

	public function save($payment)
	{
        $command = ['command-0' => 2999, 'command-1' => 5999, 'command-2' => 9999];
        $paymentMethod = $payment['payment_method'];
        if($paymentMethod === 'bancontact'){


            $idSession = $this->createStripeSource($command[$payment['command_selected']]);
            $contactRequest['secret'] = $idSession->id;

        } elseif ($paymentMethod === 'visa'){
            $idSession = $this->createStripeSession($command[$payment['command_selected']]);
            $contactRequest['secret'] = $idSession;
        }
        $idCommand = 1;
        return json_encode( ['payement_method' => $paymentMethod, "session" => $idSession, 'idCommand' => $idCommand]  );
	}

    public function paymentSuccess(){

    }

    public function paymentCancel(){

    }
    private function createStripeSession($amount){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'réservation voiture',
                'amount' => $amount,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'customer_email' => auth()->user()->email,
            'success_url' => url('paymentSuccess'),
            'cancel_url' => url('paymentCancel'),
        ]);

        return $session->id;
    }

    private function createStripeSource($amount){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Source::create([
            "type" => "bancontact",
            "currency" => "eur",
            "amount" => $amount,
            "owner" => [
                "name" => auth()->user()->name ,
                "email" => auth()->user()->email,
                "phone" => 0476574160,
            ],
            "redirect" => [
                "return_url" =>  url('paymentSuccess'),
            ],
        ]);

        return $session;
    }
}

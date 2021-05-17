<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    public function postPayment(Request $request,PaymentRepository $paymentRepository)
    {
       return $paymentRepository->save($request->input());
    }

    public function paymentSuccess(){
        return view('formPublishDetailed');
    }
}

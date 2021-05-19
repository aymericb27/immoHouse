<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\infoGeneralRequest;
use App\Repositories\ImmoRepository;


class ImmoController extends Controller
{
    public function publish(){
        return view('formPublish');
    }

    public function postInfoGeneral(infoGeneralRequest $request, ImmoRepository $immoRepository){
        $immoRepository->saveInSession($request->input());
        return view('formPayment');
    }

    public function postPayment(Request $request)
    {

        return $request->input();
    }

    public function testForm()
    {
        return view('testForm');
    }

    public function publishDetailed(Request $request, ImmoRepository $immoRepository){
       //$idProperty = $immoRepository->save($request->input());
    $idProperty = 7;
      // $immoRepository->savePhoto($idProperty,$request->file('files'));
      $property = $immoRepository->getPropertyById($idProperty);
      return redirect()->route('home',['idProperty' => $idProperty]);
      //return view('property_detailed',['property' => $property ]);
    }
}

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
       $idProperty = $immoRepository->save($request->input());
       $immoRepository->savePhoto($idProperty,$request->file('files'));
       return $idProperty;
    }
}

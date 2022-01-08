<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\infoGeneralRequest;
use App\Http\Requests\PublishDetailedRequest;
use App\Repositories\ImmoRepository;


class ImmoController extends Controller
{
    public function publish(ImmoRepository $immoRepository){


        return view('formPublish', [
            "property_additionnal_information" => $immoRepository->getPropertyAdditionnalInformation(),
            "property_other_room" => $immoRepository->getPropertyOtherRoom()]);
    }

    public function postInfoGeneral(infoGeneralRequest $request, ImmoRepository $immoRepository){
        $immoRepository->saveInSession($request->input());
        return view('formPayment');
    }

    public function postPayment(Request $request)
    {
        return $request->input();
    }

    public function getProperty($n,ImmoRepository $immoRepository){
        $property = $immoRepository->getPropertyById($n);
        $property->id = $n;
        $property->pictures =  $immoRepository->getPicturesByIdProperty($n);
        return view('property_detailed',['property' => $property ]);
    }

    public  function getMyListingProperties(ImmoRepository $immoRepository){
        $listProperties = $immoRepository->getListingPropertiesByUserId(Auth::id());
        foreach($listProperties as $key => $property){
            $listProperties[$key]->picture = $immoRepository->getFirstPictureByIdProperty($property->id);
        }
        return view('listingOfProperties', ['listProperties' => $listProperties]);

    }

    public function publishDetailed(PublishDetailedRequest $request, ImmoRepository $immoRepository){
       $idProperty = $immoRepository->save($request->input());
       $immoRepository->savePhoto($idProperty,$request->file('property_files'));
      $property = $immoRepository->getPropertyById($idProperty);
      return redirect()->route('home',['idProperty' => $idProperty]);
      //return view('property_detailed',['property' => $property ]);
    }
}

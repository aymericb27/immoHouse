<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PublishRequest;
use App\Http\Requests\infoGeneralRequest;
use App\Http\Requests\PublishDetailedRequest;
use App\Http\Requests\ResearchInMoreFilter;
use App\Http\Requests\ResearchInListRequest;
use App\Repositories\ImmoRepository;
use App\Repositories\PaymentRepository;


class ImmoController extends Controller
{
    public function getPublishForm(ImmoRepository $immoRepository, PaymentRepository $paymentRepository){


        return view('formPublish', [
            "property_other_room" => $immoRepository->getPropertyOtherRoom(),
            "energy_class"=>  $immoRepository->getEnergyClassWithUndefined(),
            "heating_type" => $immoRepository->getHeatingTYpe(),
            "user" =>auth()->user(),
            "payment_formula" => $paymentRepository->getAllPaymentMethod(),
            "number_week" => $paymentRepository->getNumberWeek(),
            "sub_property_type" => $immoRepository->getAllSubPropertyType(),
            "formAction" => "publish"
        ]);
    }

    public function toggleFavoris(Request $request, ImmoRepository $immoRepository){
        return $immoRepository->toggleFavoris($request->get('idProperty'));
    }

    public function publish(PublishRequest $request, ImmoRepository $immoRepository,PaymentRepository $paymentRepository){
        $idProperty = $immoRepository->save($request,0);
        $immoRepository->savePhoto($idProperty,$request);
        return $paymentRepository->save($request,$idProperty);

    }

    public function postInfoGeneral(infoGeneralRequest $request, ImmoRepository $immoRepository){
        $immoRepository->saveInSession($request->input());
        return view('formPayment');
    }

    public function postPayment(Request $request)
    {
        return $request->input();
    }

    public function addMoreFilter(ResearchInListRequest $request,  ImmoRepository $immoRepository){
        $listPropertiesType = $immoRepository->getAllPropertyType();
        foreach( $listPropertiesType as $key => $type){
            $listPropertiesType[$key]["subPropertyType"] = $immoRepository->getSubPropertiesByFk($type->id);
            $listPropertiesType[$key]["checked"] = ($type->id == 1) ? 1 : 0;
        }
        return view('moreFilter', [
            'req' => $request->input(),
            'sell_or_rent' => $immoRepository->getSellOrRent(),
            "property_type" => $listPropertiesType,
            "list_energy_class" => $immoRepository->getEnergyClass(),
            "count_properties" => count($immoRepository->researchInList($request))
        ]);
    }

    public function researchInList(ResearchInListRequest $request,  ImmoRepository $immoRepository){
        $listProperties = $immoRepository->researchInList($request);
        foreach($listProperties as $key => $property){
            $listProperties[$key]->picture = $immoRepository->getMainPictureByIdProperty($property->idProperty);
        }
        return view('listingOfProperties',['req'=> $request->input(),'listProperties' => $listProperties]);
    }

    public function researchByMoreFilter(ResearchInMoreFilter $request, ImmoRepository $immoRepository){
        $listProperties = $immoRepository->researchInList($request);
        return $listProperties;
    }

    public function getNumberPropertiesMoreFilter(ResearchInMoreFilter $request, ImmoRepository $immoRepository){
        return count($immoRepository->researchInList($request));
    }

    public function loadResearch( ImmoRepository $immoRepository){
        $listProperties = $immoRepository->researchInList(false);
        foreach($listProperties as $key => $property){
            $listProperties[$key]->picture = $immoRepository->getMainPictureByIdProperty($property->idProperty);
        }
        return view('listingOfProperties',['req'=> null,'listProperties' => $listProperties]);
    }

    public function home(ImmoRepository $immoRepository){
        $sub_property = $immoRepository->getSubPropertyByIds([1,9,16,17,18,20,21,22]);
        $lastAdded = $immoRepository->getlastAddedProperty();
        $lastAdded = $immoRepository->getSpacePrice($lastAdded);
        $featuredProperties = $immoRepository->getFeaturedProperties();
        $featuredProperties = $immoRepository->getSpacePrice($featuredProperties);
        foreach($lastAdded as $key => $property){
            $lastAdded[$key]->picture = $immoRepository->getMainPictureByIdProperty($property->idProperty);
            $lastAdded[$key]->isFavorite = $immoRepository->verifyFavoriteProperty($property->idProperty);
        }
        foreach($featuredProperties as $key => $property){
            $featuredProperties[$key]->picture = $immoRepository->getMainPictureByIdProperty($property->idProperty);
            $featuredProperties[$key]->isFavorite = $immoRepository->verifyFavoriteProperty($property->idProperty);
        }
        return view('welcome', ["sub_property_type" => $sub_property, "lastAdded" => $lastAdded, "featuredProperties" => $featuredProperties]);
    }

    public function deleteProperty($n, ImmoRepository $immoRepository){
        $immoRepository->hidePropertyById($n);
        return url('/getMyListingProperties');
    }

    public function getProperty($n,ImmoRepository $immoRepository){
        $property = $immoRepository->getPropertyById($n);
        $property->pictures =  $immoRepository->getPicturesByIdProperty($n);
        $propertyNearby = $immoRepository->getPropertiesNearby($property);
        $isFavorite = null;
        if(Auth::check()){
            $isFavorite = $immoRepository->verifyFavoriteProperty($n);
        }
        foreach($propertyNearby as $key => $prop){
            $propertyNearby[$key]->picture = $immoRepository->getMainPictureByIdProperty($prop->idProperty);
        }
        return view('property_detailed',['property' => $property, 'property_nearby' => $propertyNearby , 'is_favorite' => $isFavorite]);
    }

    public  function getMyListingProperties(ImmoRepository $immoRepository){
        $listProperties = $immoRepository->getListingPropertiesByUserId(Auth::id());
        foreach($listProperties as $key => $property){
            $listProperties[$key]->picture = $immoRepository->getMainPictureByIdProperty($property->idProperty);
        }
        return view('listingOfPropertiesUser', ['listProperties' => $listProperties]);

    }

    public function publishDetailed(PublishDetailedRequest $request, ImmoRepository $immoRepository){
       $idProperty = $immoRepository->save($request->input());
       $immoRepository->savePhoto($idProperty,$request->file('property_files'));
      $property = $immoRepository->getPropertyById($idProperty);
      return redirect()->route('home',['idProperty' => $idProperty]);
      //return view('property_detailed',['property' => $property ]);
    }
}

<?php

namespace App\Repositories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
class ImmoRepository implements ImmoRepositoryInterface
{

    protected $property;

	public function __construct(Property $property)
	{
		$this->property = $property;
	}

    public function saveInSession($property){
        session(['property' => $property]);
    }

	public function save($property)
	{

        $this->property->sale_or_rent =session('property')['sale_or_rent'];
        $this->property->price = session('property')['price'];
        $this->property->address = session('property')['address'];
        $this->property->address_number = session('property')['address_number'];
        $this->property->address_box = session('property')['address_box'];
        $this->property->address_postal_code = session('property')['postal_code'];
        $this->property->type_of_property_id = session('property')['fk_type_of_property'];
        $this->property->user_id = Auth::id();

        unset($property['_token']);
        foreach($property as $key => $pro ){
            $this->property->$key = $pro;
        }
        $this->property->save();
        return $this->property->id;
	}

    public function savePhoto($idProperty,$files){
        foreach($files as $key => $file){

            //Move Uploaded File
            $destinationPath = 'uploads';

            $store  = Storage::disk('public')->put('uploads/immo_'. $idProperty .'/pic-'. $key  .'.'. $file->getClientOriginalExtension(),  File::get($file));
       }
    }



}

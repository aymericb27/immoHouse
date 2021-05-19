<?php

namespace App\Repositories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function getPropertyById($idProperty)
    {
        $property = DB::table('property')
        ->join('type_of_property','property.fk_type_of_property','=','type_of_property.id')
        ->join('condition_building','condition_building.id','=','property.fk_condition_building')
        ->where('property.id','=',$idProperty)
        ->get()->toArray();
        return $property[0];
    }

    public function getListingPropertiesByUserId($idUser){
        return DB::table('property')
        ->join('type_of_property','property.fk_type_of_property','=','type_of_property.id')
        ->join('condition_building','condition_building.id','=','property.fk_condition_building')
        ->select('property.price','property.id','property.address_number','property.address_postal_code','property.address')
        ->where('property.fk_user','=',$idUser)
        ->get()->toArray();
    }

    public function getPicturesByIdProperty($idProperty)
    {
        return DB::table('property_picture')->where('fk_property',$idProperty)->get()->toArray();
    }

    public function getFirstPictureByIdProperty($idProperty)
    {
        return DB::table('property_picture')
        ->where('fk_property',$idProperty)
        ->where('order',0)
        ->get()->toArray()[0];

    }

	public function save($property)
	{

        $this->property->sale_or_rent =session('property')['sale_or_rent'];
        $this->property->price = session('property')['price'];
        $this->property->address = session('property')['address'];
        $this->property->address_number = session('property')['address_number'];
        $this->property->address_box = session('property')['address_box'];
        $this->property->address_postal_code = session('property')['postal_code'];
        $this->property->fk_type_of_property = session('property')['fk_type_of_property'];
        $this->property->fk_user = Auth::id();

        unset($property['_token']);
        foreach($property as $key => $pro ){
            $this->property->$key = $pro;
        }
        $this->property->save();
        return $this->property->id;
	}

    public function savePhoto($idProperty,$files){
        foreach($files as $key => $file){

            $idPicture = DB::table('property_picture')->insertGetId(
                ['extension' => $file->getClientOriginalExtension(),
                 'order'=> $key,
                 'fk_property'=> $idProperty
                ]);

            $store  = Storage::disk('public')->put('immo_'. $idProperty .'/pic-'.  $idPicture  .'.'. $file->getClientOriginalExtension(),  File::get($file));
       }
    }



}

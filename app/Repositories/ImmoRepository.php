<?php

namespace App\Repositories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use App\Models\PropertyOtherRoom;
use App\Models\EnergyClass;
use App\Models\HeatingType;
use App\Models\SubTypeProperty;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

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

    public function getHeatingTYpe(){
        return HeatingType::select('heating_type_' . strtoupper(app()->getLocale()). ' as heating_type', 'id')->get();
    }

    public function getAllSubPropertyType(){
        return SubTypeProperty::select('sub_type_'. strtoupper(app()->getLocale()) .' as sub_type','id', 'fk_type_property')->get();
    }

    public function getEnergyClass(){
        $undefined = new \stdClass();
        $undefined->id = "undefined";
        $undefined->class = __('undefined');
        $energyClass = EnergyClass::all();
        $retEnergyClass = [];
        $retEnergyClass[0] = $undefined;
        for ($i = 0; $i < count($energyClass); $i++) {
            $retEnergyClass[$i + 1] = $energyClass[$i];
        }
        return $retEnergyClass;
    }

    public function getPropertyOtherRoom(){
        return PropertyOtherRoom::select('room_'.strtoupper(app()->getLocale()) . ' as room', 'id')->get();
    }

    public function getPropertyById($idProperty)
    {
        return DB::table('property')
        ->select('property.id as idProperty','fk_users')
        ->join('sub_type_property','property.fk_sub_type_property','=','sub_type_property.id')
        ->where('property.id','=',$idProperty)
        ->first();
    }

    public function getPropertyAdditionnalInformation()
    {
        return DB::table('property_additionnal_information')->select('information_'.  strtoupper(App::currentLocale()),'id')->get();
    }

    public function getListingPropertiesByUserId($idUser){
        return DB::table('property')
        ->join('sub_type_property','property.fk_sub_type_property','=','sub_type_property.id')
        ->join('sell_or_rent','property.fk_sell_or_rent','=','sell_or_rent.id')
        ->select('property.price','property.id as idProperty','sell_or_rent.id as SellOrRentId','sell_or_rent.type','sub_type_property.sub_type_'. strtoupper(App::currentLocale()).' as sub_type')
        ->where('property.fk_users','=',$idUser)
        ->where('property.is_visible','=',1)
        ->get();
    }

    public function hidePropertyById($idProperty){
        $property = $this->getPropertyById($idProperty);
        if(auth()->user()->id == $property->fk_users){
            Property::where('id',$property->idProperty)->update([
                'is_visible' => 0
            ]);
        }
    }

    public function getPicturesByIdProperty($idProperty)
    {
        return DB::table('property_picture')->where('fk_property',$idProperty)->get()->toArray();
    }

    public function getMainPictureByIdProperty($idProperty)
    {
        return DB::table('property_picture')
        ->where('fk_property',$idProperty)
        ->where('is_main_picture',1)
        ->first();

    }

    private function getLocalization($town,$street,$adressNumber){

        $address = "$adressNumber $street, $town, BE";
        $address = str_replace(' ', '+', $address);
        // geocoding api url
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyA6CacJhZWCAY97sjTu6LhB9OXifYzHefY";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['fk_province'] = null;
        if($json->status == "OK"){
            foreach($json->results[0]->address_components as $compoments){
                if($compoments->types[0] == "administrative_area_level_2"){
                    $data['fk_province'] = $this->getProvinceIdByShortName($compoments->short_name);
                } else if ($compoments->short_name == "Bruxelles"){
                    $data['fk_province'] = $this->getProvinceIdByShortName("BXL");
                }
            }
            $data['lat'] = $json->results[0]->geometry->location->lat;
            $data['lng'] = $json->results[0]->geometry->location->lng;
        } else{
            $data['lat'] = null;
            $data['lng'] = null;
        }

        return $data;
    }

    private function getProvinceIdByShortName($shortName){
        return Province::select('id')->where('short_name', $shortName)->first()->id;
    }

	public function save($request, $isOnline)
	{
        $localization = $this->getLocalization($request->get('town'), $request->get('street'), $request->get('address_number'));
        $this->property->address_box = ($request->get('address_box')) ? $request->get('address_box'): null;
        $this->property->address_number = ($request->get('address_number')) ? $request->get('address_number'): null;
        $this->property->address_postal_code = $request->get('postal_code');
        $this->property->address_street = $request->get('street');
        $this->property->address_town = $request->get('town');
        $this->property->cadastral_income = ($request->get('cadastral_income')) ? $request->get('cadastral_income'): null;
        $this->property->contact_email = $request->get('contact_email');
        $this->property->contact_phone_number = ($request->get('contact_phone_number')) ? $request->get('contact_phone_number'): null;
        $this->property->description_EN = ($request->get('description_EN')) ? $request->get('description_EN'): null;
        $this->property->description_FR = ($request->get('description_FR')) ? $request->get('description_FR'): null;
        $this->property->description_NL = ($request->get('description_NL')) ? $request->get('description_NL'): null;
        $this->property->fk_energy_class = ($request->get('energy_class') !== "undefined") ? $request->get('energy_class'): null;
        $this->property->fk_province = $localization['fk_province'];
        $this->property->fk_sell_or_rent = $request->get('sell_or_rent');
        $this->property->fk_sub_type_property = $request->get('sub_type_property');
        $this->property->fk_users = $request->get('fk_users');
        $this->property->has_garden = $request->get('has_garden');
        $this->property->has_swimming_pool = $request->get('has_swimming_pool');
        $this->property->has_terrace = $request->get('has_terrace');
        $this->property->is_visible = 1;
        $this->property->is_online = $isOnline;
        $this->property->latitude = $localization['lat'];
        $this->property->longitude = $localization['lng'];
        $this->property->monthly_costs = $request->get('monthly_costs');
        $this->property->nbr_bathroom = $request->get('nbr_bathroom');
        $this->property->nbr_bedroom = $request->get('nbr_bedroom');
        $this->property->nbr_room = $request->get('nbr_room');
        $this->property->nbr_toilet = $request->get('nbr_toilet');
        $this->property->price = $request->get('price');
        $this->property->price_square_meter = ($request->get('price_square_meter')) ? $request->get('price_square_meter'): null;
        $this->property->total_area =($request->get('total_area')) ? $request->get('total_area'): null;
        $this->property->year_construct =($request->get('year_construct')) ? $request->get('year_construct'): null;
        $this->property->save();

        $property_other_room = $request->get('property_other_room');
        if($property_other_room){
            foreach($property_other_room as $other_room_id){
                DB::table('property_other_room_property')->insert([
                    'fk_property' => $this->property->id,
                    'fk_property_other_room' => $other_room_id,
                ]);
            }
        }

        $heating_type = $request->get('heating_type');
        if($heating_type){
            foreach($heating_type as $heating_type_id){
                DB::table('property_heating_type')->insert([
                    'fk_property' => $this->property->id,
                    'fk_heating_type' => $heating_type_id,
                ]);
            }
        }
        return $this->property->id;
	}

    public function savePhoto($idProperty,$request){
        $files = $request->file('property_pictures');
        $id_files = $request->get('property_pictures_id');
        $main_file = $request->get('main_photo');

        for ($i=0; $i < count($files) ; $i++) {
            $idPicture = DB::table('property_picture')->insertGetId(
                ['extension' => $files[$i]->getClientOriginalExtension(),
                 'order'=> $i,
                 'fk_property'=> $idProperty,
                 'is_main_picture' => ($main_file == $id_files[$i]) ? 1 : 0
                ]);
            $store  = Storage::disk('public')->put('property-'. $idProperty .'/pic-'.  $idPicture  .'.'. $files[$i]->getClientOriginalExtension(),  File::get($files[$i]));

        }
        return true;
    }



}

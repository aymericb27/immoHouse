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
use App\Models\Company;
use App\Models\UsersPropertyFavorites;
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

    public function getSubPropertyByIds($SubProp){
        return SubTypeProperty::select('sub_type_'. strtoupper(app()->getLocale()) .' as sub_type','id')
        ->whereIn('id', $SubProp)
        ->get();
    }

    public function verifyCountResearch(&$count){
        $result = ($count > 0) ? 'OR' : '';
        $count++;
        return $result;
    }

    public function researchInList($request){
        if($request === false){
            $listSearchPlace = false;
        } else {
            $listSearchPlace = $request->get('place_research');
        }
        $countSearchPlace = 0;
        $sqlWhereSearchPlace = '(';
        $sqlSelectDistance = '';
        $listDistance = [];
        if($listSearchPlace){
            foreach($listSearchPlace as $searchPlace){
                $searchPlace = json_decode($searchPlace);
                if($searchPlace->type === "locality" || $searchPlace->type === "sublocality_level_1"){
                    if($searchPlace->name === "Bruxelles" || $searchPlace->name === "Brussel" || $searchPlace->name === "Brussels"){
                        $sqlWhereSearchPlace .= $this->verifyCountResearch($countSearchPlace) ." ( property.fk_province = ". $this->getProvinceIdByShortName("BXL") .") ";
                    } else {
                        if($postalCode = $this->getLocalization($searchPlace->name,'','')['postal_code']){
                            $sqlWhereSearchPlace .= $this->verifyCountResearch($countSearchPlace) ." ( address_postal_code = '". $postalCode ."' ) ";
                        } else {
                            $sqlWhereSearchPlace .= $this->verifyCountResearch($countSearchPlace) ." (( distance_$countSearchPlace = 'ok' ) OR ( address_town = '". $searchPlace->name ."' )) ";
                            array_push($listDistance, ['id' => $countSearchPlace, 'lat' => $searchPlace->lat, 'lng' =>$searchPlace->lng]);
                        }
                    }
                } else if ($searchPlace->type === "administrative_area_level_2"){
                    $sqlWhereSearchPlace .= $this->verifyCountResearch($count) ." ( property.fk_province = ". $this->getProvinceIdByShortName($searchPlace->shortName) .") ";
                }
            }
            $sqlWhereSearchPlace .= ')';
            foreach($listDistance as $distance){
                $sqlSelectDistance .= ", SQRT( POW(111.111 * (property.latitude - ". $distance['lat'] ."), 2) + POW(111.111 * (". $distance['lng'] ." - property.longitude) * COS(property.latitude / 57.2), 2)) as distance_". $distance['id'];
            }
        }


        $sql = Property::selectRaw("property.id as idProperty, pack.fk_type_pack, property.fk_province,sub_type_". strtoupper(App::currentLocale()) . " as sub_type,
        sell_or_rent.type as typeSellOrRent,property.price,property.fk_energy_class,property.fk_sell_or_rent,address_town $sqlSelectDistance")
            ->join('sell_or_rent', 'property.fk_sell_or_rent', '=', 'sell_or_rent.id')
            ->leftJoin('sub_type_property','property.fk_sub_type_property','=','sub_type_property.id')
            ->join('order','order.fk_property','=','property.id')
            ->join('pack','order.fk_pack','=','pack.id')
            ->where('order.is_active', 1)
            ->where('property.is_online', 1)
            ->where('property.is_visible', 1)
            ->orderBy('pack.fk_type_pack','DESC');
        if($countSearchPlace > 0){
            $sql->havingRaw($sqlWhereSearchPlace);
        }
        if($request){
            if($sellOrRent = $request->get('sell_or_rent')){
                $sql->where('property.fk_sell_or_rent', $sellOrRent);
            }
            if($fkSubProperty = $request->get('sub_type_property')){
                $sql->where('property.fk_sub_type_property', $fkSubProperty);
            }

            $minimumPrice = $request->get('minimum_price');
            $maximumPrice = $request->get('maximum_price');

            if($minimumPrice && $maximumPrice){
                $sql->whereBetween('property.price', [$minimumPrice, $maximumPrice]);
            } else if ($minimumPrice){
                $sql->where('property.price','>=',$minimumPrice);
            } else if ($maximumPrice){
                $sql->where('property.price','<=',$maximumPrice);
            }
        }

        return $sql->get();
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
        $property = DB::table('property')
        ->select('property.id as idProperty','property.fk_sell_or_rent','fk_companies','property.fk_users','address_box','address_street','address_number','address_postal_code','address_town',
        'cadastral_income','contact_email','contact_phone_number','description_'. strtoupper(App::currentLocale()) . ' as description',
        'energy_class.class','property.fk_energy_class','province.name_'. strtoupper(App::currentLocale()) . ' as nameProvince','sub_type_'. strtoupper(App::currentLocale()) . ' as sub_type',
        'sell_or_rent.type as typeSellOrRent','has_garden','has_swimming_pool','has_terrace','latitude','longitude','monthly_costs','nbr_bathroom'
        ,'nbr_bedroom','nbr_room','nbr_toilet','price','price_square_meter','total_area','year_construct')
        ->join('sub_type_property','property.fk_sub_type_property','=','sub_type_property.id')
        ->leftJoin('energy_class','property.fk_energy_class','=','energy_class.id')
        ->leftJoin('province','property.fk_province', '=','province.id')
        ->join('sell_or_rent', 'property.fk_sell_or_rent', '=', 'sell_or_rent.id')
        ->join('users','users.id','=','property.fk_users')
        ->leftJoin('companies_users','companies_users.fk_users','=','users.id')
        ->where('property.id','=',$idProperty)
        ->first();

        if($property){
            $property->heating_type = HeatingType::select('heating_type_'.strtoupper(App::currentLocale()). ' as heating_type')
            ->join('property_heating_type','property_heating_type.fk_heating_type','=','heating_type.id')
            ->where('property_heating_type.fk_property',$idProperty)->get();

            $property->other_room = PropertyOtherRoom::select('room_'.strtoupper(app()->getLocale()) . ' as room')
            ->join('property_other_room_property','property_other_room_property.fk_property_other_room','=','property_other_room.id')
            ->where('property_other_room_property.fk_property', $idProperty)->get();

            $property->company = Company::select('name','extension_logo')
            ->where('id', $property->fk_companies)->first();
        }


        return $property;
    }

    public function getPropertiesNearby($property){
        $distanceSql = '0 as distance';
        if($property->latitude && $property->longitude){
            $distanceSql = "SQRT(
                POW(69.1 * (latitude - ". $property->latitude ."), 2) +
                POW(69.1 * (". $property->longitude ." - longitude) * COS(latitude / 57.2), 2)) AS distance";
        }
        return Property::selectRaw("property.id as idProperty,sub_type_". strtoupper(App::currentLocale()) . " as sub_type
        ,sell_or_rent.type as typeSellOrRent,price,fk_energy_class,fk_sell_or_rent,address_town,$distanceSql")
            ->join('sell_or_rent', 'property.fk_sell_or_rent', '=', 'sell_or_rent.id')
            ->leftJoin('sub_type_property','property.fk_sub_type_property','=','sub_type_property.id')
            ->orderBy('distance')
            ->where('property.id','!=', $property->idProperty)->get();
    }

    public function toggleFavoris($idProperty){
        if(Auth::check()){
            $favorite = $this->verifyFavoriteProperty($idProperty);
            if($favorite){
                UsersPropertyFavorites::where('id', $favorite->id)->delete();
                return 'delete';
            } else {
                UsersPropertyFavorites::insert([
                    'fk_property' => $idProperty,
                    'fk_users' => Auth::id(),
                ]);
                return 'add';
            }
        } else {
            return false;
        }
    }

    public function verifyFavoriteProperty($idProperty){
        return UsersPropertyFavorites::where('fk_property', $idProperty)
            ->where('fk_users', Auth::id())->first();
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
        ->orderBy('property.created_at','DESC')
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
        return DB::table('property_picture')->where('fk_property',$idProperty)->orderBy('is_main_picture','DESC')->get()->toArray();
    }

    public function getMainPictureByIdProperty($idProperty)
    {
        return DB::table('property_picture')
        ->where('fk_property',$idProperty)
        ->where('is_main_picture',1)
        ->first();

    }

    private function getLocalization($town,$street,$adressNumber){

        $address = "$adressNumber $street $town, Belgium";
        $address = str_replace(' ', '+', $address);
        // geocoding api url
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyA6CacJhZWCAY97sjTu6LhB9OXifYzHefY";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['fk_province'] = null;
        $data['postal_code'] = null;
        if($json->status == "OK"){
            foreach($json->results[0]->address_components as $compoments){
                if($compoments->types[0] == "administrative_area_level_2"){
                    $data['fk_province'] = $this->getProvinceIdByShortName($compoments->short_name);
                } else if ($compoments->short_name == "Bruxelles" || $compoments->short_name == "Brussel" || $compoments->short_name == "Brussels"){
                    $data['fk_province'] = $this->getProvinceIdByShortName("BXL");
                }
                if($compoments->types[0] == "postal_code"){
                    $data['postal_code'] = $compoments->long_name;
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
        return ($province = Province::select('id')->where('short_name', $shortName)->first()) ? $province->id : null;
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

@extends('template')

@section('content')
<div class="container">
    @foreach ($listProperties as $property)
        <a class=" row list_property" href="{!! url('/getProperty/'. $property->idProperty) !!}">
            <div class="col-md-4 pl-0">
                <div class="picture " style=" background-image: url({{ asset('/uploads/property-'.$property->idProperty.'/pic-'. $property->picture->id .'.' . $property->picture->extension) }})">
                    <i class="fa fa-star star_favorite @if($property->isFavorite) is_favorite @endif" id="fav-{{$property->idProperty}}" aria-hidden="true"></i>
                    <img class="list_property_peb" src="{!! url('img/peb/peb_'. $property->fk_energy_class.'.png') !!}">
                </div>
            </div>
            <div class="col-md-8 p-20">
                <div class="" style="height: 70%;">
                    <p class='col-md-12 mb-0'> {{$property->sub_type}} {{__($property->typeSellOrRent)}}</p>
                    <h3 class='mainColor col-md-12'> {{$property->price}} €
                        @if($property->fk_sell_or_rent == 2)
                        /{{__('month')}}
                        @endif
                    </h3>
                    <p class="col-md-12 list_property_description">
                        {{$property->description}}
                    </p>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img class="img_list_property" src="{!! url('img/icon/plans.png') !!}">
                            <p>{{$property->total_area}} m²</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <img class="img_list_property" src="{!! url('img/icon/bedroom.png') !!}">
                            <p>{{$property->nbr_bedroom}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    <pre>{{print_r($req, true)}}</pre>
    <pre>{{print_r($listProperties,1)}}</pre>
</div>
@endsection

@extends('template')

@section('content')
<div class="row mr-0">
    <div class="col-md-3">
        <div id="filter_listing_properties">
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('localisation')}}</p>
                {!! Form::text ('search_text', null, ['class' => 'form-control search_val', "id" =>'searchText', "placeholder" => __('Province, postal code or town')]) !!}
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('property type')}}</p>
                <div class="text-left row" id="listing_properties_property_sub_type_container">
                    @foreach ($property_sub_type as $sub_type)
                        @if($sub_type->before)
                        <div class="col-md-6 listing_properties_property_sub_type">
                            {!! Form::checkbox ('sub_type_property_tab[]', $sub_type->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_sub_type_property-". $sub_type->id, 'checked' => ($sub_type->checked === 1)]) !!}
                            <label for="checkbox_sub_type_property-{{$sub_type->id}}" name="checkbox2_lbl" class="css-label lite-blue-check checkbox_sub_type_property"> {{ $sub_type->sub_type}}</label>
                        </div>
                        @endif
                    @endforeach
                    <div class="d-none">
                        @foreach ($property_sub_type as $sub_type)
                            @if(!$sub_type->before)
                            <div class="col-md-6 listing_properties_property_sub_type">
                                {!! Form::checkbox ('sub_type_property_tab[]', $sub_type->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_sub_type_property-". $sub_type->id, 'checked' => ($sub_type->checked === 1)]) !!}
                                <label for="checkbox_sub_type_property-{{$sub_type->id}}" name="checkbox2_lbl" class="css-label lite-blue-check checkbox_sub_type_property"> {{ $sub_type->sub_type}}</label>
                            </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('price')}}</p>
                <div class="row pl-20 ml-0">
                    <div class="col-md-5 containerFilterInput" style="margin-left: 0px">
                        {!! Form::number ('minimum_price', (array_key_exists('minimum_price',$req))?$req['minimum_price'] : null, ['class' => 'form-control', "placeholder" => __('minimum') . ' €']) !!}
                    </div>
                    <div class="col-md-5 containerFilterInput">
                        {!! Form::number ('maximum_price', (array_key_exists('maximum_price',$req))?$req['maximum_price'] : null, ['class' => 'form-control', "placeholder" => __('maximum') . ' €']) !!}
                    </div>
                </div>
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('number of frontages')}}</p>
                <div class="row pl-20 ml-0">
                    <div class="less_or_plus_box col-md-5 containerFilterInput" style="margin-left: 0px">
                        <div><label>{{__('minimum')}}</label></div>
                        <div class="btn d-inline-block less">-</div>
                        {!! Form::number ('minimum_frontage', 0, ['class' => 'moreFilterField form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "max" => 4, "oninput" => "validity.valid||(value='');"]) !!}
                        <div class="btn d-inline-block plus">+</div>
                    </div>
                    <div class="less_or_plus_box col-md-5 containerFilterInput">
                        <div><label>{{__('maximum')}}</label></div>
                        <div class="btn d-inline-block less">-</div>
                        {!! Form::number ('maximum_frontage', 4, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "max" => 4, "oninput" => "validity.valid||(value='');"]) !!}
                        <div class="btn d-inline-block plus">+</div>
                    </div>
                </div>
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('number of bedroom')}}</p>
                <div class="row pl-20 ml-0">
                    <div class="less_or_plus_box col-md-5 containerFilterInput" style="margin-left: 0px">
                        <div><label>{{__('minimum')}}</label></div>
                        <div class="btn d-inline-block less">-</div>
                        {!! Form::number ('minimum_bedroom', 0, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                        <div class="btn d-inline-block plus">+</div>
                    </div>
                    <div class="less_or_plus_box col-md-5 containerFilterInput">
                        <div><label>{{__('maximum')}}</label></div>
                        <div class="btn d-inline-block less">-</div>
                        {!! Form::number ('maximum_bedroom', 4, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                        <div class="btn d-inline-block plus">+</div>
                    </div>
                </div>
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('total area')}}</p>
                <div class="row pl-20 ml-0">
                    <div class="col-md-5 containerFilterInput" style="margin-left: 0px">
                        {!! Form::number ('minimum_total_area', null, ['class' => 'form-control', "placeholder" => __('minimum')]) !!}
                    </div>
                    <div class="col-md-5 containerFilterInput">
                        {!! Form::number ('maximum_total_area', null, ['class' => 'form-control', "placeholder" => __('maximum')]) !!}
                    </div>
                </div>
            </div>
            <div class="mb-20">
                <p class="filterTitleListing mainColor">{{__('living area')}}</p>
                <div class="row pl-20 ml-0">
                    <div class="col-md-5 containerFilterInput" style="margin-left: 0px">
                        {!! Form::number ('minimum_living_area', null, ['class' => 'form-control', "placeholder" => __('minimum')]) !!}
                    </div>
                    <div class="col-md-5 containerFilterInput">
                        {!! Form::number ('maximum_living_area', null, ['class' => 'form-control', "placeholder" => __('maximum')]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
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
    </div>
</div>
@endsection

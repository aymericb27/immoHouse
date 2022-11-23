@extends('template')

@section('content')
<div class="container">
    {!! Form::open(['url' => 'searchPropertyInMoreFilter', 'enctype'=>'multipart/form-data', "id" =>'searchPropertyInMoreFilterForm' ]) !!}
        <div>
            <h3 class="filterTitle mainColor">{{__('transaction type')}}</h3>
            @foreach ($sell_or_rent as $typeTransaction)
                <div class="pl-20">
                    {!! Form::checkbox ('type_transaction[]', $typeTransaction->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_property_other_room_". $typeTransaction->id]) !!}
                    <label for="checkbox_property_other_room_{{$typeTransaction->id}}" name="checkbox2_lbl" class="css-label lite-blue-check"> {{ $typeTransaction->type}}</label>
                </div>
            @endforeach
        </div>
        <div class="">
            <h3 class="filterTitle mainColor">{{__('adress')}}</h3>
            <div class="row pl-20 ml-0">
            {!! Form::text ('search_text', null, ['class' => 'form-control search_val col-md-6', "id" =>'searchText', "placeholder" => __('Province, postal code or town')]) !!}
            </div>
            <div class="listResearch pl-20 mt-10"></div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('property type')}}</h3>
            <div class="switch_field text-left row moreFilterPropertyType pl-20 pr-20">
                @foreach ($property_type as $type)
                <div class="col-md-4">
                    <input type="checkbox" id="property_type_{{$type->id}}" name="property_type_tab" value="1" @if($type->checked == 1) checked @endif>
                    <label for="property_type_{{$type->id}}" class="@if($type->checked == 1) isPropertyTypeSelected @endif" id="property_type_label-{{$type->id}}">{{$type->type}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                    <div class="mainColor btnSwitchSubProperty"><i class="fa fa-chevron-right"></i>{{__('see sub property type')}}</div>
                </div>

                @endforeach
            </div>
            <div class="pt-20 pl-20">
                @foreach ($property_type as $type)
                    <div class="row col-md-12 d-none" id="propertyTypeSubTab_{{$type->id}}">
                        @foreach ($type->subPropertyType as $subTypeProperty )
                            <div class="col-md-6" style="padding-bottom : 5px">
                                {!! Form::checkbox ('sub_type_property_tab[]', $subTypeProperty->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_sub_type_property-". $subTypeProperty->id, 'checked' => ($type->checked === 1)]) !!}
                                <label for="checkbox_sub_type_property-{{$subTypeProperty->id}}" name="checkbox2_lbl" class="css-label lite-blue-check checkbox_sub_type_property"> {{ $subTypeProperty->sub_type}}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('number of frontages')}}</h3>
            <div class="row pl-20 ml-0">
                <div class="less_or_plus_box col-md-4 containerFilterInput" style="margin-left: 0px">
                    <div><label>{{__('minimum')}}</label></div>
                    <div class="btn d-inline-block less">-</div>
                    {!! Form::number ('minimum_frontage', 0, ['class' => 'moreFilterField form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "max" => 4, "oninput" => "validity.valid||(value='');"]) !!}
                    <div class="btn d-inline-block plus">+</div>
                </div>
                <div class="less_or_plus_box col-md-4 containerFilterInput">
                    <div><label>{{__('maximum')}}</label></div>
                    <div class="btn d-inline-block less">-</div>
                    {!! Form::number ('maximum_frontage', 4, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "max" => 4, "oninput" => "validity.valid||(value='');"]) !!}
                    <div class="btn d-inline-block plus">+</div>
                </div>
            </div>
        </div>
        <div class="">
            <h3 class="filterTitle mainColor">{{__('price')}}</h3>
            <div class="row pl-20 ml-0">
                <div class="col-md-4 containerFilterInput" style="margin-left: 0px">
                    {!! Form::number ('minimum_price', null, ['class' => 'form-control', "placeholder" => __('minimum') . ' €']) !!}
                </div>
                <div class="col-md-4 containerFilterInput">
                    {!! Form::number ('maximum_price', null, ['class' => 'form-control', "placeholder" => __('maximum') . ' €']) !!}
                </div>
            </div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('number of bedroom')}}</h3>
            <div class="row pl-20 ml-0">
                <div class="less_or_plus_box col-md-4 containerFilterInput" style="margin-left: 0px">
                    <div><label>{{__('minimum')}}</label></div>
                    <div class="btn d-inline-block less">-</div>
                    {!! Form::number ('minimum_bedroom', 0, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                    <div class="btn d-inline-block plus">+</div>
                </div>
                <div class="less_or_plus_box col-md-4 containerFilterInput">
                    <div><label>{{__('maximum')}}</label></div>
                    <div class="btn d-inline-block less">-</div>
                    {!! Form::number ('maximum_bedroom', 4, ['class' => 'form-control d-inline-block pl-40 text-center', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                    <div class="btn d-inline-block plus">+</div>
                </div>
            </div>
        </div>

        <div>
            <h3 class="filterTitle mainColor">{{__('total area')}}</h3>
            <div class="row pl-20 ml-0">
                <div class="col-md-4 containerFilterInput" style="margin-left: 0px">
                    {!! Form::number ('minimum_total_area', null, ['class' => 'form-control', "placeholder" => __('minimum')]) !!}
                </div>
                <div class="col-md-4 containerFilterInput">
                    {!! Form::number ('maximum_total_area', null, ['class' => 'form-control', "placeholder" => __('maximum')]) !!}
                </div>
            </div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('living area')}}</h3>
            <div class="row pl-20 ml-0">
                <div class="col-md-4 containerFilterInput" style="margin-left: 0px">
                    {!! Form::number ('minimum_living_area', null, ['class' => 'form-control', "placeholder" => __('minimum')]) !!}
                </div>
                <div class="col-md-4 containerFilterInput">
                    {!! Form::number ('maximum_living_area', null, ['class' => 'form-control', "placeholder" => __('maximum')]) !!}
                </div>
            </div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('energy class')}}</h3>
            <div class="row pl-20">
                @foreach ($list_energy_class as $energyClass)
                    <div class=" col-md-6" style="padding-bottom : 5px">
                        {!! Form::checkbox ('energy_class[]', $energyClass->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_energy_class_". $energyClass->id]) !!}
                        <label for="checkbox_energy_class_{{$energyClass->id}}" name="checkbox2_lbl" class="css-label lite-blue-check"> {{ $energyClass->class}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="filterTitle mainColor">{{__('more options')}}</h3>
            <div class="row pl-20">
                <div class="col-md-6" style="padding-bottom : 5px">
                    {!! Form::checkbox ('is_garden', 1,false, ['class' => 'css-checkbox', 'id' =>"checkbox_is_garden"]) !!}
                    <label for="checkbox_is_garden" name="is_garden" class="css-label lite-blue-check">{{__('garden')}}</label>
                </div>
                <div class="col-md-6" style="padding-bottom : 5px">
                    {!! Form::checkbox ('is_swimming_pool', 1,false, ['class' => 'css-checkbox', 'id' =>"checkbox_is_swimming_pool"]) !!}
                    <label for="checkbox_is_swimming_pool" name="is_swimming_pool" class="css-label lite-blue-check">{{__('swimming pool')}}</label>
                </div>
                <div class="col-md-6" style="padding-bottom : 5px">
                    {!! Form::checkbox ('is_terrace', 1,false, ['class' => 'css-checkbox', 'id' =>"checkbox_is_terrace"]) !!}
                    <label for="checkbox_is_terrace" name="is_terrace" class="css-label lite-blue-check">{{__('terrace')}}</label>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
<div class="moreFilterFooter">
    <button class="btn searchInMoreFilter">{{__('search')}} (<span class="numberProperties">0</span>)</button>
</div>
<pre>{{print_r($property_type, true)}}</pre>
@endsection

@extends('template')
@section('content')
<div class="row h-100 mr-0">
    <div class="col-md-4 leftPubishFormContainer pt-40">
        <ul class="mainLeftSideInfo">
            <li>
                <div class="d-inline-block"><img src="{!! url('img/icon/property_information.png') !!}"></div>
                <div class="d-inline-block mainColor">{{ __('property information') }}</div>
                <div>
                    <ul class="childLeftSideInfo bar">
                        <li id="left_form_step-0" class="left_form_step form_step_publish_selected form_step_publish_already_selected">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('type of property') }}</div>
                        </li>
                        <li id="left_form_step-1" class="left_form_step">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('address') }}</div>
                        </li>
                        <li id="left_form_step-2" class="left_form_step">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('price') }}</div>
                        </li>
                        <li id="left_form_step-3" class="left_form_step">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('photo') }}</div>
                        </li>
                        <li id="left_form_step-4" class="left_form_step">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('general information') }}</div>
                        </li>
                        <li id="left_form_step-5" class="left_form_step">
                            <div class="d-inline-block"><img class="round_empty" src="{!! url('img/icon/round_empty.png') !!}"> <img class="round_empty_colored" src="{!! url('img/icon/round_empty_colored.png') !!}"> <img class="round_checked" src="{!! url('img/icon/round_checked.png') !!}"></div>
                            <div class="d-inline-block">{{ __('energy') }}</div>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="left_form_step-6" class="left_form_step">
                <div class="d-inline-block"><img class="icon_contact_details" src="{!! url('img/icon/contact_details.png') !!}"><img class="icon_contact_details_colored" src="{!! url('img/icon/contact_details_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('your contact details') }}</div>
            </li>
            <li id="left_form_step-7" class="left_form_step">
                <div class="d-inline-block"><img class="icon_title_description" src="{!! url('img/icon/title_description.png') !!}"><img class="icon_title_description_colored" src="{!! url('img/icon/title_description_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('description') }}</div>
            </li>
            <li id="left_form_step-8" class="left_form_step">
                <div class="d-inline-block"><img class="icon_payment" src="{!! url('img/icon/payment.png') !!}"><img class="icon_payment_colored" src="{!! url('img/icon/payment_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('payment') }}</div>
            </li>

        </ul>
    </div>
    <div class="col-md-8 p-80">
        {!! Form::open(['url' => 'publish', 'enctype'=>'multipart/form-data',"id" =>'formPublish', "class" =>"sell", 'action' =>$formAction]) !!}
            <div id="form_publish_step-0" class="form_publish_step form_publish_selected">
                {!! Form::number ('fk_users', $user->id, ['class' => 'd-none']) !!}
                <h2>{{ __('type of property') }}</h2>
                <div class="switch_field mb-50">
                    <input type="radio" id="sale_radio" name="sell_or_rent" value="1" checked/>
                    <label for="sale_radio">{{__('for sale')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                    <input type="radio" id="rent_radio" name="sell_or_rent" value="2" />
                    <label for="rent_radio">{{__('for rent')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                </div>
                <div class="row mb-50">
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-1">
                            <div>
                                <img class="no_checked" src="{!! url('img/icon/house.png') !!}">
                                <img class="checked" src="{!! url('img/icon/house_colored.png') !!}">
                            </div>
                            <div class="color_link">{{__('house')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-2">
                            <div>
                                <img class="no_checked" src="{!! url('img/icon/apartment.png') !!}">
                                <img class="checked" src="{!! url('img/icon/apartment_colored.png') !!}">
                            </div>
                            <div class="color_link">{{__('apartment')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-3">
                            <div>
                                <img class="no_checked" src="{!! url('img/icon/ground.png') !!}">
                                <img class="checked" src="{!! url('img/icon/ground_colored.png') !!}">
                            </div>
                            <div class="color_link">{{__('other')}}</div>
                        </div>
                    </div>
                    <div class="row error err_image_type_of_property m-10">
                        {{__('please select a type of property')}}
                    </div>
                </div>
                <div class="form-group col-md-4 sub_type_property">
                    {!! Form::label('sub_type_property', __('subtype of property'), ['class' => "form-control-label" ]) !!}
                    <select class="form-control" name="sub_type_property">
                        @foreach ($sub_property_type as $type)
                            <option class="sub_type_property_option property_type-{{$type->fk_type_property}}" value="{{$type->id}}"> {{$type->sub_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4 {!! $errors->has('year_construct') ? 'has-error' : '' !!}">
                    <label for="year_construct" class="form-control-label"> {{__('year of construction')}} <span>({{__('optional')}})</span></label>
                    {!! Form::number ('year_construct', 1945, ['class' => 'form-control']) !!}
                    {!! $errors->first('year_construct', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="row error err_type_of_property m-10">
                    {{__('please select a sub-type of property')}}
                </div>
                <div class="form_publish_btn p-20">
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn mr-20')) }}
                </div>
            </div>
            <div id="form_publish_step-1" class="form_publish_step">
                <h2>{{ __('address') }}</h2>
                <div class="row">
                    <div class="form-group col-md-8 {!! $errors->has('street') ? 'has-error' : '' !!}">
                        {!! Form::label('street', __('street'), ['class' => "form-control-label" ]) !!}
                        {!! Form::text ('street', "rue des alliés", ['class' => 'form-control', "id" => "ship-address"]) !!}
                        {!! $errors->first('street', '<small class="help-block">:message</small>') !!}
                        <div class="row error err_street pl-15">
                            {{__('the field street is required')}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 {!! $errors->has('town') ? 'has-error' : '' !!}">
                        {!! Form::label('town', __('town'), ['class' => "form-control-label" ]) !!}
                        {!! Form::text ('town', "Forest", ['class' => 'form-control', "id" =>'locality']) !!}
                        {!! $errors->first('town', '<small class="help-block">:message</small>') !!}
                        <div class="row error err_town pl-15">
                            {{__('the field town is required')}}
                        </div>
                    </div>
                    <div class="form-group col-md-3  {!! $errors->has('postal_code') ? 'has-error' : '' !!}">
                        {!! Form::label('postal_code', __('postal code'), ['class' => "form-control-label" ]) !!}
                        {!! Form::number ('postal_code', 1190, ['class' => 'form-control', 'id' => "postcode"]) !!}
                        {!! $errors->first('postal_code', '<small class="help-block">:message</small>') !!}
                        <div class="row error err_postal_code pl-15">
                            {{__('the field postal code is required')}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 {!! $errors->has('address_number') ? 'has-error' : '' !!}">
                        {!! Form::label('address_number', __('number'), ['class' => "form-control-label" ]) !!}
                        {!! Form::number ('address_number', 28, ['class' => 'form-control']) !!}
                        {!! $errors->first('address_number', '<small class="help-block">:message</small>') !!}
                        <div class="row error err_address_number pl-15">
                            {{__('the field number is required')}}
                        </div>
                    </div>
                    <div class="form-group col-md-4 {!! $errors->has('address_box') ? 'has-error' : '' !!}">
                        {!! Form::label('address_box', __('box'), ['class' => "form-control-label" ]) !!}
                        {!! Form::number ('address_box', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('address_box', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form_publish_btn row">
                    <div class="col-md-4">
                        <div class="previousPublishButton row">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 pr-0">
                        {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                    </div>

                </div>
            </div>
            <div id="form_publish_step-2" class="form_publish_step">
                <h2>{{ __('price') }}</h2>
                <div class="form-group col-md-4 {!! $errors->has('price') ? 'has-error' : '' !!}">
                    {!! Form::label('price', __('price'), ['class' => "form-control-label" ]) !!}
                    <div class="input_symbol_euro">
                        {!! Form::number ('price', 50000, ['class' => 'form-control']) !!}
                    </div>
                    {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                    <div class="row error err_price pl-15">
                        {{__('the field price is required')}}
                    </div>
                </div>
                <div class="form-group col-md-4 {!! $errors->has('monthly_costs') ? 'has-error' : '' !!}">
                    <label for="monthly_costs" class="form-control-label"> {{__('monthly costs')}} <span>({{__('optional')}})</span></label>
                    <div class="input_symbol_euro">
                        {!! Form::number ('monthly_costs', 0, ['class' => 'form-control']) !!}
                    </div>
                    {!! $errors->first('monthly_costs', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group col-md-4 d_sell {!! $errors->has('cadastral_income') ? 'has-error' : '' !!}">
                    <label for="cadastral_income" class="form-control-label"> {{__('cadastral income')}} <span>({{__('optional')}})</span></label>
                    <div class="input_symbol_euro">
                        {!! Form::number ('cadastral_income', 50000, ['class' => 'form-control']) !!}
                    </div>
                    {!! $errors->first('cadastral_income', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group col-md-4 d_sell {!! $errors->has('price_square_meter') ? 'has-error' : '' !!}">
                    <label for="price_square_meter" class="form-control-label"> {{__('price by m²')}} <span>({{__('optional')}})</span></label>
                    <div class="input_symbol_euro">
                        {!! Form::number ('price_square_meter', 50000, ['class' => 'form-control']) !!}
                    </div>
                    {!! $errors->first('price_square_meter', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form_publish_btn row">
                    <div class="col-md-2">
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    <div class="col-md-2 pr-0">
                        {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                    </div>
                </div>
            </div>
            <div id="form_publish_step-3" class="form_publish_step">
                <h2>{{ __('photo') }}</h2>
                <p>{{__('add as many photos as possible')}}! {{__('The more you add, the more chance you have of finding a buyer')}}.</p>
                <p>{{__('To select several photos at the same time use CTRL+Click')}}. {{__('To select all photos at the same time use CTRL+A')}}.</p>
                <p>{{__('Number of pictures')}} : <span id="numberOfPicture">0</span>/25</p>
                <div class="gallery_property">
                    <label for='property_picture' class='custom-file-upload btn'>
                        {{__('select photos')}}
                        <input type='file' name='property_pictures' id='property_picture' class="form-control property-pictures" multiple>
                    </label>
                </div>
                <div class="row files" id="files1">
                    <ul class="fileList"></ul>
                </div>
                <div class="err_size_picture error pt-20">
                    {{__('the picture is more than 5MB')}}
                </div>
                <div class="err_property_pictures error pt-20">
                    {{__('you must add at least one photo')}}
                </div>
                {!! $errors->first('property_pictures', '<small class="help-block">:message</small>') !!}
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                </div>
            </div>
            <div id="form_publish_step-4" class="form_publish_step">
                <h2>{{ __('general information') }}</h2>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('nbr_bedroom') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/bedroom.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="nbr_bedroom" class="form-control-label d-inline-block"> {{__('number of bedroom')}} <span>({{__('optional')}})</span></label>

                        <div class="less_or_plus_box">
                            <div class="btn d-inline-block less">-</div>
                            {!! Form::number ('nbr_bedroom', 4, ['class' => 'form-control d-inline-block pl-40', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                            <div class="btn d-inline-block plus">+</div>
                        </div>
                        {!! $errors->first('nbr_bedroom', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('nbr_bathroom') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/bath.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="nbr_bathroom" class="form-control-label d-inline-block"> {{__('number of bathroom')}} <span>({{__('optional')}})</span></label>
                        <div class="less_or_plus_box">
                            <div class="btn d-inline-block less">-</div>
                            {!! Form::number ('nbr_bathroom', 4, ['class' => 'form-control d-inline-block pl-40', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                            <div class="btn d-inline-block plus">+</div>
                        </div>
                        {!! $errors->first('nbr_bathroom', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('nbr_toilet') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/toilet.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="nbr_toilet" class="form-control-label d-inline-block"> {{__('number of toilet')}} <span>({{__('optional')}})</span></label>
                        <div class="less_or_plus_box">
                            <div class="btn d-inline-block less">-</div>
                            {!! Form::number ('nbr_toilet', 4, ['class' => 'form-control d-inline-block pl-40', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                            <div class="btn d-inline-block plus">+</div>
                        </div>
                        {!! $errors->first('nbr_toilet', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('nbr_room') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/plans.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="nbr_room" class="form-control-label d-inline-block"> {{__('number of room')}} <span>({{__('optional')}})</span></label>
                        <div class="less_or_plus_box">
                            <div class="btn d-inline-block less">-</div>
                            {!! Form::number ('nbr_room', 4, ['class' => 'form-control d-inline-block pl-40', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                            <div class="btn d-inline-block plus">+</div>
                        </div>
                        {!! $errors->first('nbr_room', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('total_area') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/house_size.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="total_area" class="form-control-label d-inline-block"> {{__('total area')}} <span>({{__('optional')}})</span></label>
                        {!! Form::number ('total_area', 4, ['class' => 'form-control d-inline-block', "min"=> 0 , "step" => 1, "oninput" => "validity.valid||(value='');"]) !!}
                        {!! $errors->first('total_area', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('has_garden') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/garden.png') !!}"></div>
                    <div class="col-md-6">
                        <label for="total_area" class="form-control-label d-inline-block"> {{__('garden')}}</label>
                        <div class="switch_field text-left">
                            <input type="radio" id="has_garden_no" name="has_garden" value="0" checked/>
                            <label for="has_garden_no">{{__('no')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                            <input type="radio" id="has_garden_yes" name="has_garden" value="1" />
                            <label for="has_garden_yes">{{__('yes')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('has_swimming_pool') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/swimming_pool.png') !!}"></div>
                    <div class="col-md-6">
                        <label for="has_swimming_pool" class="form-control-label d-inline-block"> {{__('swimming pool')}}</label>
                        <div class="switch_field text-left">
                            <input type="radio" id="has_swimming_pool_no" name="has_swimming_pool" value="0" checked/>
                            <label for="has_swimming_pool_no">{{__('no')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                            <input type="radio" id="has_swimming_pool_yes" name="has_swimming_pool" value="1" />
                            <label for="has_swimming_pool_yes">{{__('yes')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('has_terrace') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/terrace.png') !!}"></div>
                    <div class="col-md-6">
                        <label for="has_terrace" class="form-control-label d-inline-block"> {{__('terrace')}}</label>
                        <div class="switch_field text-left">
                            <input type="radio" id="has_terrace_no" name="has_terrace" value=0 checked/>
                            <label for="has_terrace_no">{{__('no')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                            <input type="radio" id="has_terrace_yes" name="has_terrace" value="1" />
                            <label for="has_terrace_yes">{{__('yes')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 {!! $errors->has('property_other_room') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/living_room.png') !!}"></div>
                    <div class="col-md-6">
                        <label for="other_room" class="form-control-label d-inline-block"> {{__('other room')}} <span>({{__('optional')}})</span></label>
                        @foreach ($property_other_room as $other_room)
                            <div class="pb-10 pt-10">
                                {!! Form::checkbox ('property_other_room[]', $other_room->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_property_other_room_".$other_room->id]) !!}
                                <label for="checkbox_property_other_room_{{$other_room->id}}" name="checkbox2_lbl" class="css-label lite-blue-check"> {{ $other_room->room}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                </div>
            </div>
            <div id="form_publish_step-5" class="form_publish_step">
                <h2>{{ __('energy') }}</h2>
                <div class="form-group row {!! $errors->has('energy_class') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/green-energy.png') !!}"></div>
                    <div class="col-md-4">
                        <label for="energy_class" class="form-control-label">{{__('energy class')}}<span> ({{__('optional')}})</span></label>
                        <select class="form-control" name="energy_class">
                            @foreach ( $energy_class as $class)
                                <option value="{{$class->id}}"> {{$class->class}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('energy_class', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="form-group row mb-50 col-md-12 pl-0 {!! $errors->has('has_terrace') ? 'has-error' : '' !!}">
                    <div class="d-inline-block icon_form_publish"><img src="{!! url('img/icon/heater.png') !!}"></div>
                    <div class="col-md-6">
                        <label for="heating_type" class="form-control-label d-inline-block"> {{__('heating type')}}</label>
                        @foreach ($heating_type as $type)
                            <div class="pb-10 pt-10">
                                {!! Form::checkbox ('heating_type[]', $type->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_heating_type_".$type->id]) !!}
                                <label for="checkbox_heating_type_{{$type->id}}" name="checkbox2_lbl" class="css-label lite-blue-check"> {{ $type->heating_type}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                </div>
            </div>
            <div id="form_publish_step-6" class="form_publish_step">
                <h2>{{ __('your contact details') }}</h2>
                <div class="form-group col-md-6 {!! $errors->has('contact_email') ? 'has-error' : '' !!}">
                    {!! Form::label('contact_email', __('email'), ['class' => "form-control-label" ]) !!}
                    {{ Form::email('contact_email',$user->email, ['class' => 'form-control'])}}
                    {!! $errors->first('contact_email', '<small class="help-block">:message</small>') !!}
                    <div class="row error err_contact_email pl-15">
                        {{__('the field e-mail is required')}}
                    </div>
                </div>
                <div class="form-group col-md-6 {!! $errors->has('contact_phone_number') ? 'has-error' : '' !!}">
                    {!! Form::label('contact_phone_number', __('phone number'), ['class' => "form-control-label" ]) !!}
                    {{ Form::number('contact_phone_number',null , ['class' => 'form-control'])}}
                    {!! $errors->first('contact_phone_number', '<small class="help-block">:message</small>') !!}
                    <div class="row error err_contact_phone_number pl-15">
                        {{__('the field phone number is required')}}
                    </div>
                </div>
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                </div>
            </div>
            <div id="form_publish_step-7" class="form_publish_step">
                <h2>{{__('description')}}</h2>
                <div class="description_btn_box ml-0 row">
                    <div id="description_english-button" class="col-md-3 description_btn_selected">{{__('english')}}</div>
                    <div id="description_french-button" class="col-md-3">{{__('french')}}</div>
                    <div id="description_dutch-button" class="col-md-3">{{__('dutch')}}</div>
                </div>
                <div class="description_box">
                    {!! Form::textarea ('description_EN', 'english', ['class' => 'form-control description_selected', 'id' => "description_english" ]) !!}
                    {!! Form::textarea ('description_FR', 'french', ['class' => 'form-control', 'id' => "description_french" ]) !!}
                    {!! Form::textarea ('description_NL', 'dutch', ['class' => 'form-control', 'id' => "description_dutch" ]) !!}
                </div>
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn')) }}
                </div>
            </div>
            <div id="form_publish_step-8" class="form_publish_step">
                <h2>{{__('payment')}}</h2>
                <div class="form-group col-md-12">
                    <label for="visa_or_bancontact" class="form-control-label d-inline-block"> {{__('payment type')}}</label>
                    <div class="switch_field text-left">
                        <input type="radio" id="bancontact" name="type_payment" value="bancontact"/>
                        <label class="label_style_payment" for="bancontact">
                            <span>{{__('bancontact')}}</span>
                            <img class="img_style_payment" src="{!! url('img/bancontact.png') !!}">
                        </label>
                        <input type="radio" id="visa" name="type_payment" value="visa" />
                        <label class="label_style_payment" for="visa">
                            <span>{{__('visa')}}</span>
                            <img class="img_style_payment" src="{!! url('img/visa.png') !!}">
                        </label>
                    </div>
                    <div class="row error err_type_payment pl-15">
                        {{__('you must choose a type of payment')}}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="promo_code" class="form-control-label">{{__('promo code')}}<span> ({{__('optional')}})</span></label>
                    {!! Form::text ('promo_code', "immoflat88", ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4 {!! $errors->has('number_week') ? 'has-error' : '' !!}">
                    <label for="number_week" class="form-control-label">{{__('number of week')}}</label>
                    <select class="form-control" name="number_week">
                        @foreach ( $number_week as $week)
                            <option value="{{$week->id}}"> {{$week->week}} {{__('week')}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('number_week', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group col-md-12">
                    <label for="pack" class="form-control-label"> {{__('package type')}}</label>
                    @foreach ($payment_formula as $sell_or_rent => $formula_type)
                        <div class="d_{{$sell_or_rent}} row">
                            @foreach ($formula_type as $type => $listPack )
                                <div class="col-md-4">
                                    <div class="formula_type">
                                        <h4>{{__($type)}}</h4>
                                        @foreach ($listPack as $pack)
                                            <div class="pack_price pl-10 price_week-{{$pack->fk_number_week}}">
                                                <div> {{$pack->price}} €</div>
                                                <div class="pt-10 pb-10 text-left"><img class="price_check" src="{!! url('img/icon/check_colored.png') !!}"><div class="d-inline">{{__('visibile on the website')}}</div></div>
                                                @if ($type === "standard")
                                                <div class="pt-10 pb-10 text-left"><img class="price_check" src="{!! url('img/icon/check_colored.png') !!}"><div class="d-inline">{{__('before essential in the research')}}</div></div>
                                                @endif
                                                @if ($type === "premium")
                                                <div class="pt-10 pb-10 text-left"><img class="price_check" src="{!! url('img/icon/check_colored.png') !!}"><div class="d-inline">{{__('on top on the result list')}}</div></div>
                                                <div class="pt-10 pb-10 text-left"><img class="price_check" src="{!! url('img/icon/check_colored.png') !!}"><div class="d-inline">{{__('visibile on the main page')}}</div></div>
                                                @endif
                                                <div class="switch_field">
                                                    <input type="radio" id="pack-{{$pack->id}}" name="pack" value="{{$pack->id}}"/>
                                                    <label for="pack-{{$pack->id}}" class="w-50">{{__('select')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="row error err_pack pl-15">
                        {{__('you must choose a pack')}}
                    </div>
                </div>
                <div class="form_publish_btn pt-20">
                    <div class="row pr-15 pl-15">
                        <div class="previousPublishButton col-md-6">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit(__('send'), ['class' => 'btn pull-right', "id" => "sendPublish"]) !!}
                        </div>

                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<script src="{!! url('js/autoCompleteAdress.js') !!}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6CacJhZWCAY97sjTu6LhB9OXifYzHefY&callback=initAutocomplete&libraries=places&v=weekly" async></script>
@endsection

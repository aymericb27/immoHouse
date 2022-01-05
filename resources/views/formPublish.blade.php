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
                            <div class="d-inline-block">{{ __('additional information') }}</div>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="left_form_step-4" class="left_form_step">
                <div class="d-inline-block"><img class="icon_contact_details" src="{!! url('img/icon/contact_details.png') !!}"><img class="icon_contact_details_colored" src="{!! url('img/icon/contact_details_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('Your contact details') }}</div>
            </li>
            <li id="left_form_step-5" class="left_form_step">
                <div class="d-inline-block"><img class="icon_title_description" src="{!! url('img/icon/title_description.png') !!}"><img class="icon_title_description_colored" src="{!! url('img/icon/title_description_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('Title and Description') }}</div>
            </li>
            <li id="left_form_step-6" class="left_form_step">
                <div class="d-inline-block"><img class="icon_payment" src="{!! url('img/icon/payment.png') !!}"><img class="icon_payment_colored" src="{!! url('img/icon/payment_colored.png') !!}"></div>
                <div class="d-inline-block">{{ __('payment') }}</div>
            </li>

        </ul>
    </div>
    <div class="col-md-8 p-80">
        {!! Form::open(['url' => 'publish', 'enctype'=>'multipart/form-data',"id" =>'formPublish']) !!}
            <div id="form_publish_step-0" class="form_publish_step form_publish_selected">
                <div class="switch_field mb-50">
                    <input type="radio" id="sale_radio" name="sale_or_rent" value="1" checked/>
                    <label for="sale_radio">{{__('for sale')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                    <input type="radio" id="radio-two" name="sale_or_rent" value="0" />
                    <label for="radio-two">{{__('for rent')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                </div>

                <div class="row mb-50">
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-house">
                            <div>
                                <img class="no_checked" src="{!! url('img/icon/house.png') !!}">
                                <img class="checked" src="{!! url('img/icon/house_colored.png') !!}">
                            </div>
                            <div class="color_link">{{__('house')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-apartment">
                            <div>
                                <img class="no_checked" src="{!! url('img/icon/apartment.png') !!}">
                                <img class="checked" src="{!! url('img/icon/apartment_colored.png') !!}">
                            </div>
                            <div class="color_link">{{__('apartment')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 image_type_of_property">
                        <div id="image_type_of_property-other">
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
                <div class="type_of_property type_of_property_house switch_field">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" id="property_house" name="sub_type_of_property" value="1"/>
                            <label for="property_house">{{__('house')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_bungalow" name="sub_type_of_property" value="1"/>
                            <label for="property_bungalow">{{__('bungalow')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_country_house" name="sub_type_of_property" value="1"/>
                            <label for="property_country_house">{{__('country house')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_chalet" name="sub_type_of_property" value="1"/>
                            <label for="property_chalet">{{__('chalet')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="type_of_property type_of_property_apartment switch_field">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" id="property_apartment" name="sub_type_of_property" value="1"/>
                            <label for="property_apartment">{{__('apartment')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_ground_floor" name="sub_type_of_property" value="1"/>
                            <label for="property_ground_floor">{{__('ground floor')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_penthouse" name="sub_type_of_property" value="1"/>
                            <label for="property_penthouse">{{__('penthouse')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_duplex" name="sub_type_of_property" value="1"/>
                            <label for="property_duplex">{{__('duplex')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="type_of_property type_of_property_other switch_field">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" id="property_ground" name="sub_type_of_property" value="1"/>
                            <label for="property_ground">{{__('land')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_garage" name="sub_type_of_property" value="1"/>
                            <label for="property_garage">{{__('garage')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_office" name="sub_type_of_property" value="1"/>
                            <label for="property_office">{{__('office')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_industry" name="sub_type_of_property" value="1"/>
                            <label for="property_industry">{{__('industry')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" id="property_business" name="sub_type_of_property" value="1"/>
                            <label for="property_business">{{__('business')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_farm" name="sub_type_of_property" value="1"/>
                            <label for="property_farm">{{__('farm')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" id="property_other" name="sub_type_of_property" value="1"/>
                            <label for="property_other">{{__('other')}}<img src="{!! url('img/icon/check.png') !!}"></label>
                        </div>
                    </div>
                </div>
                <div class="row error err_type_of_property m-10">
                    {{__('please select a sub-type of property')}}
                </div>
                <div class="form_publish_btn p-20">
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-1")) }}
                </div>
            </div>
            <div id="form_publish_step-1" class="form_publish_step">
                address
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-0">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-2")) }}
                </div>
            </div>
            <div id="form_publish_step-2" class="form_publish_step">
                price
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-1">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-3")) }}
                </div>
            </div>
            <div id="form_publish_step-3" class="form_publish_step">
                additional information
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-2">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-4")) }}
                </div>
            </div>
            <div id="form_publish_step-4" class="form_publish_step">
                Your contact details
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-3">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-5")) }}
                </div>
            </div>
            <div id="form_publish_step-5" class="form_publish_step">
                Title and Description
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-4">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                    {{ Form::button(__('next'), array('class' => 'nextPublishButton btn', 'id' =>"step_publish_next-6")) }}
                </div>
            </div>
            <div id="form_publish_step-6" class="form_publish_step">
                payment
                <div class="form_publish_btn p-20">
                    <div>
                        <div class="previousPublishButton" id="step_publish_previous-5">
                            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
                            <div class="d-inline-block">{{ __('previous') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

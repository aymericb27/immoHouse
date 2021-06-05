@extends('template')

@section('content')
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9">
            <ul id="progressbar" class="text-center">
                <li class="active step0" id="step1">{{ __('general information')}}</li>
                <li class="step0" id="step2">{{ __('detailed information')}}</li>
                <li class="step0" id="step3">{{ __('payment')}}</li>
                <li class="step0" id="step4">{{ __('validation')}}</li>
            </ul>
            <div class="card b-0 show">
                <pre>
                    {{print_r($property_additionnal_information[0]['information_EN'])}}
                {{print_r($property_additionnal_information)}}
            </pre>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11">
                        <div class="form-group">
                            <label class="form-control-label">Who I'm building for?</label>
                             <input type="text" id="name" name="name" placeholder="Enter your name here ..." class="" onblur="validate1(1)"> </div>
                            <div class="form-group"> <label class="form-control-label">What's your email address?</label>
                             <input type="text" id="email" name="email" placeholder="Please enter your email here ..." class="" onblur="validate1(2)">
                             </div>

                             <div class="switch switch--horizontal form-group {!! $errors->has('sale_or_rent') ? 'has-error' : '' !!}">
                                {{ Form::radio('sale_or_rent', '1', true, ['checked' => "checked"]) }}
                                {!! Form::label('sale_or_rent', __('sale'), ['class' =>'mb-0']) !!}
                                {{ Form::radio('sale_or_rent', '0') }}
                                {!! Form::label('sale_or_rent', __('rent'), ['class' => 'pl-10 mb-0' ]) !!}

                                <span class="toggle-outside"><span class="toggle-inside"></span></span>
                            </div>
                             <div class="form-group {!! $errors->has('fk_type_of_property') ? 'has-error' : '' !!}">
                                {!! Form::label('fk_type_of_property', __('type of property'), ['class' => "form-control-label" , 'onblur'=>"validate1(3)"]) !!}
                                <select class=" form-control" name="fk_type_of_property">
                                    <option value="1">{{ __('house')}}</option>
                                    <option value="2">{{ __('flat')}}</option>
                                    <option value="3">{{ __('office')}}</option>
                                    <option value="4">{{ __('industrial')}}</option>
                                    <option value="5">{{ __('business')}}</option>
                                    <option value="6">{{ __('land')}}</option>
                                    <option value="7">{{ __('garage')}}</option>
                                    <option value="8">{{ __('other')}}</option>
                                </select>
                                {!! $errors->first('fk_type_of_property', '<small class="help-block">:message</small>') !!}
                            </div>
                        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
                            {!! Form::label('price', __('price'), ['class' => "form-control-label" ]) !!}
                            {!! Form::number ('price', 50000, ['class' => 'form-control']) !!}
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8 {!! $errors->has('address') ? 'has-error' : '' !!}">
                                {!! Form::label('address', __('address'), ['class' => "form-control-label" ]) !!}
                                {!! Form::text ('address', "rue de morimont", ['class' => 'form-control', "id" => "ship-address"]) !!}
                                {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4 {!! $errors->has('address_town') ? 'has-error' : '' !!}">
                                {!! Form::label('address_town', __('town'), ['class' => "form-control-label" ]) !!}
                                {!! Form::text ('address_town', 45, ['class' => 'form-control', "id" =>'locality']) !!}
                                {!! $errors->first('address_town', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 {!! $errors->has('address_number') ? 'has-error' : '' !!}">
                                {!! Form::label('address_number', __('number'), ['class' => "form-control-label" ]) !!}
                                {!! Form::number ('address_number', 45, ['class' => 'form-control']) !!}
                                {!! $errors->first('address_number', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4 {!! $errors->has('address_box') ? 'has-error' : '' !!}">
                                {!! Form::label('address_box', __('box'), ['class' => "form-control-label" ]) !!}
                                {!! Form::number ('address_box', 2, ['class' => 'form-control']) !!}
                                {!! $errors->first('address_box', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4  {!! $errors->has('postal_code') ? 'has-error' : '' !!}">
                                {!! Form::label('postal_code', __('postal code'), ['class' => "form-control-label" ]) !!}
                                {!! Form::number ('postal_code', 1340, ['class' => 'form-control', 'id' => "postcode"]) !!}
                                {!! $errors->first('postal_code', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="circle">
                        <div class="fa fa-long-arrow-right next" id="next1"></div>
                    </div>
                </div>
            </div>
            <div class="card b-0">
                <div class="fa fa-long-arrow-left prev"> </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11">
                        <div class="form-group"> <label class="form-control-label">What is the website title?</label> <input type="text" id="web-title" name="web-title" placeholder="Enter your website title here ..." class="" onblur="validate2(1)"> </div>
                        <div class="row">

                            <div class="form-group col-md-6 {!! $errors->has('living_space') ? 'has-error' : '' !!}">
                                {!! Form::label('living_space', __('living space')) !!}
                                {!! Form::number ('living_space', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('living_space', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group col-md-6 {!! $errors->has('nbr_bathroom') ? 'has-error' : '' !!}">
                                {!! Form::label('nbr_bathroom', __('number of bathroom')) !!}
                                {!! Form::number ('nbr_bathroom', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('nbr_bathroom', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 {!! $errors->has('year_construct') ? 'has-error' : '' !!} " >
                                {!! Form::label('year_construct', __('year of construct')) !!}
                                {!! Form::number ('year_construct', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('year_construct', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group col-md-6 {!! $errors->has('nbr_floor') ? 'has-error' : '' !!} " >
                                {!! Form::label('nbr_floor', __('number of floor')) !!}
                                {!! Form::text ('nbr_floor', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('nbr_floor', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {!! $errors->has('nbr_facade') ? 'has-error' : '' !!} " >
                                {!! Form::label('nbr_facade', __('number of facade')) !!}
                                {!! Form::number ('nbr_facade', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('nbr_facade', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6 {!! $errors->has('nbr_toilet') ? 'has-error' : '' !!} " >
                                {!! Form::label('nbr_toilet', __('number of toilet')) !!}
                                {!! Form::number ('nbr_toilet', 1, ['class' => 'form-control']) !!}
                                {!! $errors->first('nbr_toilet', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->has('fk_condition_building') ? 'has-error' : '' !!}">
                            {!! Form::label('fk_condition_building', __('condition of the building')) !!}
                            <select class=" form-control" name="fk_condition_building">
                                <option value="1">{{ __('Excellent')}}</option>
                                <option value="2">{{ __('Satisfactory')}}</option>
                                <option value="3">{{ __('Conditional')}}</option>
                            </select>
                            {!! $errors->first('fk_condition_building', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                            {!! Form::label('description', __('description')) !!}
                            {!! Form::textarea ('description', 1, ['class' => 'form-control' ]) !!}
                            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                        </div>

                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="circle">
                        <div class="fa fa-long-arrow-right next" id="next2"></div>
                    </div>
                </div>
            </div>
            <div class="card b-0">
                <div class="row d-flex justify-content-center text-center">
                    <div class="confirm">
                        <h4 class="mb-2">Thank You !</h4>
                        <p>An estimation will be sent on your email address.</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="check"> <img src="https://i.imgur.com/g6KlBWR.gif" class="check-mark"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

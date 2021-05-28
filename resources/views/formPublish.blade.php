@extends('template')

@section('content')
<div class="container height-head">
        <div class="panel panel-info">
            <div class="panel-heading"></div>
            <ul class="navbar">
                <li class="selected"> {{__('information')}}</li>
                <li> {{__('payment')}}</li>
                <li> {{__('information detailed')}}</li>
            </ul>
            <div class="panel-body">
                {!! Form::open(['url' => 'postInfoGeneral', 'enctype'=>'multipart/form-data']) !!}
                <div>
                    <fieldset>

                        <legend>{{__('General information')}}</legend>
                        <div class="form-group {!! $errors->has('sale_or_rent') ? 'has-error' : '' !!}">
                            {!! Form::label('sale_or_rent', __('sale'), ['class' =>'mb-0']) !!}
                            {{ Form::radio('sale_or_rent', '1', true) }}
                            {!! Form::label('sale_or_rent', __('rent'), ['class' => 'pl-10 mb-0' ]) !!}
                            {{ Form::radio('sale_or_rent', '0') }}
                        </div>
                        <div class="form-group {!! $errors->has('fk_type_of_property') ? 'has-error' : '' !!}">
                            {!! Form::label('fk_type_of_property', __('type of property')) !!}
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
                            {!! Form::label('price', __('price')) !!}
                            {!! Form::number ('price', 50000, ['class' => 'form-control']) !!}
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>{{__('address')}}</legend>
                        <div class="row">
                            <div class="form-group col-md-8 {!! $errors->has('address') ? 'has-error' : '' !!}">
                                {!! Form::label('address', __('address')) !!}
                                {!! Form::text ('address', "rue de morimont", ['class' => 'form-control', "id" => "ship-address"]) !!}
                                {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4 {!! $errors->has('address_town') ? 'has-error' : '' !!}">
                                {!! Form::label('address_town', __('town')) !!}
                                {!! Form::text ('address_town', 45, ['class' => 'form-control', "id" =>'locality']) !!}
                                {!! $errors->first('address_town', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 {!! $errors->has('address_number') ? 'has-error' : '' !!}">
                                {!! Form::label('address_number', __('number')) !!}
                                {!! Form::number ('address_number', 45, ['class' => 'form-control']) !!}
                                {!! $errors->first('address_number', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4 {!! $errors->has('address_box') ? 'has-error' : '' !!}">
                                {!! Form::label('address_box', __('box')) !!}
                                {!! Form::number ('address_box', 2, ['class' => 'form-control']) !!}
                                {!! $errors->first('address_box', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4  {!! $errors->has('postal_code') ? 'has-error' : '' !!}">
                                {!! Form::label('postal_code', __('postal code')) !!}
                                {!! Form::number ('postal_code', 1340, ['class' => 'form-control', 'id' => "postcode"]) !!}
                                {!! $errors->first('postal_code', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </fieldset>
                </div>
                 {!! implode('', $errors->all('<div>:message</div>')) !!}
                {!! Form::submit(_('send'), ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

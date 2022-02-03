@extends('template')

@section('content')

<div class="col-md-9 container">
    <div class="pt-20 pb-10">
        <div class="ReturnResultButton">
            <div class="d-inline-block"><img src="{!! url('img/icon/left-arrows.png') !!}"></div>
            <div class="d-inline-block">{{ __('return to result') }}</div>
        </div>
        <div>
            <h3 class="mb-0 pt-10 mainColor">{{$property->sub_type}} {{__($property->typeSellOrRent)}} <i class="fa fa-star star_favorite @if($is_favorite) is_favorite @endif" id="fav-{{$property->idProperty}}" aria-hidden="true"></i>
            </h3>
            <p>{{$property->address_street}}
                @if(isset($property->address_number)), {{$property->address_number}}
                    @if(isset($property->address_box))
                        {{$property->address_box}}
                    @endif
                @endif
                 - {{$property->address_town}} {{$property->address_postal_code}}
            </p>
        </div>

    </div>
    <div class="m-0 row property_contact_and_picture">
        <div class="list-img col-md-8">
            <div class="fotorama" data-nav="thumbs" data-width="100%">
                @foreach ($property->pictures as $picture)
                <img src ="{{ asset('/uploads/property-'.$property->idProperty.'/pic-'. $picture->id .'.' . $picture->extension) }}">
                @endforeach
            </div>
        </div>
        <div class="col-md-4 text-center p-20">
            <div class="p-20">
                @if(isset($property->company))
                    company
                @else
                    <img class="img_private_user" src="{!! url('img/icon/user.png') !!}">
                    <p class="mb-0">{{__('private user')}}</p>
                @endif
            </div>
            <div class="p-20">
                {{ Form::button(__('contact by email'), array('class' => 'col-md-10 mb-10 contactByMailBtn btn')) }}
                @if(isset($property->contact_phone_number))
                    {{ Form::button(__('contact by phone'), array('class' => 'col-md-10 contactByPhoneBtn btn')) }}
                    <a href="{{$property->contact_phone_number}}" class="d-none hyperlink contact_phone_number">{{$property->contact_phone_number}}</a>
                @endif
            </div>
            <div class="row p-20">
                <div class="col-md-4 p-0">
                    <img class="img_contact" src="{!! url('img/icon/plans.png') !!}">
                    <p>{{$property->total_area}} m²</p>
                </div>
                <div class="col-md-4 p-0">
                    <img class="img_contact" src="{!! url('img/icon/bedroom.png') !!}">
                    <p>{{$property->nbr_bedroom}}</p>
                </div>
                <div class="col-md-4 p-0">
                    <img class="img_contact" src="{!! url('img/icon/euro.png') !!}">
                    <p>{{$property->price}} € @if($property->fk_sell_or_rent == 2) /{{__('month')}}@endif</p>
                </div>
            </div>
            <div class="p-20">
                <a href="{{$property->latitude}}-{{$property->longitude}}" class="btn col-md-10 openModalMapProperty">{{__('open in map')}} <i class="fa fa-map-marker" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="property_detailed pt-20">
        <div>
            @if($property->description)
                <h3 class="mainColor">{{__('description')}}</h3>
                <p>{{$property->description}}</p>
            @endif
        </div>
        <div class="pt-20">
            <h3 class="mainColor">{{__('general information')}}</h3>
            <p><strong>{{__('price')}}</strong> {{$property->price}} €@if($property->fk_sell_or_rent == 2)/{{__('month')}}@endif</p>
            @if($property->price_square_meter)<p><strong>{{__('price by m²')}}</strong> {{$property->price_square_meter}} €/m²</p>@endif
            @if($property->cadastral_income)<p><strong>{{__('cadastral income')}}</strong> {{$property->cadastral_income}} €</p>@endif
            @if($property->monthly_costs)<p><strong>{{__('monthly costs')}}</strong> {{$property->monthly_costs}}</p>@endif
            @if($property->total_area)<p><strong>{{__('total area')}}</strong> {{$property->total_area}} m²</p>@endif
            @if($property->year_construct)<p><strong>{{__('year of construction')}}</strong> {{$property->year_construct}}</p>@endif
            <p></p>
        </div>
        @if(count($property->other_room) > 0 || $property->nbr_room || $property->nbr_bedroom || $property->nbr_bathroom || $property->nbr_toilet )
        <div class="pt-20">
            <h3 class="mainColor"> {{__('interior')}}</h3>
            @if($property->nbr_room)<p><strong>{{__('number of room')}}</strong> {{$property->monthly_costs}}</p>@endif
            @if($property->nbr_bedroom)<p><strong>{{__('number of bedroom')}}</strong> {{$property->nbr_bedroom}}</p>@endif
            @if($property->nbr_bathroom)<p><strong>{{__('number of bathroom')}}</strong> {{$property->nbr_bathroom}}</p>@endif
            @if($property->nbr_toilet)<p><strong>{{__('number of toilet')}}</strong> {{$property->nbr_toilet}}</p>@endif
            @if(count($property->other_room) > 0)
                <p>
                    <strong class="align-top">{{__('other room')}}</strong>
                    <span class="d-inline-block">
                        @foreach ($property->other_room as $other_room)
                            <span class="d-block">{{$other_room->room}}</span>
                        @endforeach
                    </span>
                </p>
            @endif
        </div>
        @endif
        <div class="pt-20">
            <h3 class="mainColor"> {{__('exterior')}}</h3>
            <p><strong>{{__('swimming pool')}}</strong>@if($property->has_swimming_pool){{__('yes')}} @else {{__('no')}} @endif</p>
            <p><strong>{{__('terrace')}}</strong>@if($property->has_terrace){{__('yes')}} @else {{__('no')}} @endif</p>
            <p><strong>{{__('garden')}}</strong>@if($property->has_garden){{__('yes')}} @else {{__('no')}} @endif</p>
        </div>
        <div class="pt-20">
            <h3 class="mainColor"> {{__('energy')}}</h3>
            <p><strong>{{__('energy class')}}</strong>
                @if(!$property->fk_energy_class)
                    {{__('undefined')}}
                @else
                    <img src="{!! url('img/peb/peb_'. $property->fk_energy_class.'.png') !!}">
                @endif
            </p>
            @if(count($property->heating_type) > 0)
            <p>
                <strong class="align-top">{{__('heating type')}}</strong>
                <span class="d-inline-block">
                    @foreach ($property->heating_type as $heating_type)
                        <span class="d-block">{{$heating_type->heating_type}}</span>
                    @endforeach
                </span>
            </p>
        @endif
        </div>
        @if(count($property_nearby) > 0)
            <div>
                <h3 class="mainColor">{{__('nearby property')}}</h3>
                <div class="list_property_horizontal pt-20">
                    @foreach ($property_nearby as $prop)
                        <div class="col-md-3 property_horizontal">
                            <a href="{!! url('/getProperty/'. $prop->idProperty) !!}">
                                <div class="picture" style=" background-image: url({{ asset('/uploads/property-'.$prop->idProperty.'/pic-'. $prop->picture->id .'.' . $prop->picture->extension) }})">
                                    <img src="{!! url('img/peb/peb_'. $prop->fk_energy_class.'.png') !!}">
                                </div>
                                <div class="p-10 pl-20">
                                    <div class="mainColor font-weight-bold">{{$prop->sub_type}} {{__($prop->typeSellOrRent)}}</div>
                                    <div>{{$prop->address_town}}</div>
                                    <div>{{$prop->price}} €@if($prop->fk_sell_or_rent == 2)/{{__('month')}}@endif</div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <pre>
            {{print_r($property_nearby)}}
            {{print_r($property)}}
        </pre>
    </div>
    <div class="modal d-none modalMapProperty">
        <div class="modal_content">
            <div class="modal_header"> {{__('map')}} <span class="close">&times;</span></div>
            <div class="modal_body">
                <div id="mapProperty"></div>
            </div>
        </div>
    </div>
    <div class="modal d-none modalSendMail">
        <div class="modal_content">
            <div class="modal_header"> {{__('send mail to user')}} <span class="close">&times;</span></div>
            <div class="modal_body">
                {!! Form::open(['url' => 'sendMailToUser',"id" =>'formPublish', 'action' =>"sendMailToUser"]) !!}
                    <div class="row">
                        <div class="form-group col-md-6 {!! $errors->has('contact_name') ? 'has-error' : '' !!}">
                            {!! Form::label('contact_name', __('name'), ['class' => "form-control-label" ]) !!}
                            {!! Form::text('contact_name', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('contact_name', '<small class="help-block">:message</small>') !!}
                            <div class="row error err_contact_name pl-15">
                                {{__('the field name is required')}}
                            </div>
                        </div>
                        <div class="form-group col-md-6 {!! $errors->has('contact_firstname') ? 'has-error' : '' !!}">
                            {!! Form::label('contact_firstname', __('firstname'), ['class' => "form-control-label" ]) !!}
                            {!! Form::text('contact_firstname', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('contact_firstname', '<small class="help-block">:message</small>') !!}
                            <div class="row error err_contact_firstname pl-15">
                                {{__('the field firstname is required')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 {!! $errors->has('contact_email') ? 'has-error' : '' !!}">
                            {!! Form::label('contact_email', __('email'), ['class' => "form-control-label" ]) !!}
                            {!! Form::text('contact_email', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('contact_email', '<small class="help-block">:message</small>') !!}
                            <div class="row error err_contact_email pl-15">
                                {{__('the field email is required')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 {!! $errors->has('contact_phone') ? 'has-error' : '' !!}">
                            <label for="contact_phone" class="form-control-label"> {{__('phone number')}} <span>({{__('optional')}})</span></label>
                            {!! Form::tel('contact_phone', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('contact_phone', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 {!! $errors->has('contact_message') ? 'has-error' : '' !!}">
                            {!! Form::label('contact_message', __('your message'), ['class' => "form-control-label" ]) !!}
                            {!! Form::textarea ('contact_message', 'french', ['class' => 'form-control']) !!}
                            <div class="row error err_contact_message pl-15">
                                {{__('the field message is required')}}
                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
            <div class="modal_btn text-right">
                {!! Form::submit(__('send'), ['class' => 'btn', "id" => "sendPublish"]) !!}
            </div>
        </div>
    </div>

</div>
@endsection

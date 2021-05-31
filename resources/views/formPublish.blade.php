@extends('template')

@section('content')
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9">
            <ul id="progressbar" class="text-center">
                <li class="active step0" id="step1">BUILD</li>
                <li class="step0" id="step2">DESIGN</li>
                <li class="step0" id="step3">CONFIRMATION</li>
            </ul>
            <div class="card b-0 show">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11">
                        <div class="form-group">
                            <label class="form-control-label">Who I'm building for?</label>
                             <input type="text" id="name" name="name" placeholder="Enter your name here ..." class="" onblur="validate1(1)"> </div>
                        <div class="form-group"> <label class="form-control-label">What's your email address?</label>
                             <input type="text" id="email" name="email" placeholder="Please enter your email here ..." class="" onblur="validate1(2)">
                             </div>
                             <div class="form-group {!! $errors->has('fk_type_of_property') ? 'has-error' : '' !!}">
                                {!! Form::label('fk_type_of_property', __('type of property'), ['class' => "form-control-label" ]) !!}
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
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="circle">
                        <div class="fa fa-long-arrow-right next" id="next1" onclick="validate1(0)"></div>
                    </div>
                </div>
            </div>
            <div class="card b-0">
                <div class="fa fa-long-arrow-left prev"> </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11">
                        <div class="form-group"> <label class="form-control-label">What is the website title?</label> <input type="text" id="web-title" name="web-title" placeholder="Enter your website title here ..." class="" onblur="validate2(1)"> </div>
                        <div class="form-group"> <label class="form-control-label">Describe your website</label> <input type="text" id="desc" name="desc" placeholder="Enter description of website here ..." class="" onblur="validate2(2)"> </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="circle">
                        <div class="fa fa-long-arrow-right next" id="next2" onclick="validate2(0)"></div>
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

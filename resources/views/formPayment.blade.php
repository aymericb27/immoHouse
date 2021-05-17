@extends('template')

@section('content')
<div class="container height-head" ng-controller="PaymentController">
        <div class="panel panel-info">
            <div class="panel-heading"></div>
            <ul class="navbar">
                <li> {{__('information')}}</li>
                <li  class="selected"> {{__('payment')}}</li>
                <li> {{__('information detailed')}}</li>
            </ul>
            <div class="panel-body">
                {!! Form::open(['url' => 'postPayment', 'enctype'=>'multipart/form-data', "name" =>'paymentForm' ]) !!}
                <div class='row'>
                    <div class="col-md-4 boxCommand" ng-class="{selected : command_selected == 'command-0'}" ng-click="command_selected = 'command-0'">
                        <div>
                            <h1>30 €</h1>
                            <h3>Pour 8 semaines </h3>
                            {!! Form::button(_('select'),['class' => 'btn btn-info']) !!}

                        </div>
                    </div>
                    <div class="col-md-4 boxCommand" ng-class="{selected : command_selected == 'command-1'}" ng-click="command_selected = 'command-1'">
                        <div>
                            <h1>70 €</h1>
                            <h3>Pour 12 semaines </h3>
                            {!! Form::button(_('select'),['class' => 'btn btn-info']) !!}

                        </div>
                    </div>
                    <div class="col-md-4 boxCommand" ng-class="{selected : command_selected == 'command-2'}" ng-click="command_selected = 'command-2'">
                        <div>
                            <h1>120 €</h1>
                            <h3>Pour 16 semaines </h3>
                            {!! Form::button(_('select'),['class' => 'btn btn-info']) !!}

                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    {!! Form::label('payment_method', __('payment method'), ['class' => 'p-15']) !!}
                    <div class="d-inline-block">
                        {!! Form::radio('payment_method','visa',true,['ng-model' => 'payment_method']) !!}
                        <img class="payment_method" src="{!! url('img/visa.png') !!}">
                    </div>
                    <div class="d-inline-block">
                        {!! Form::radio('payment_method','bancontact',false,['ng-model' => 'payment_method']) !!}
                        <img class="payment_method" src="{!! url('img/bancontact.png') !!}">
                    </div>
                </div>
                <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    {!! Form::label('name', __('name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::label('email', __('email')) !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('code') ? 'has-error' : '' !!}">
                    {!! Form::label('code', __('code')) !!}
                    {!! Form::text ('code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('code', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('year') ? 'has-error' : '' !!}">
                    {!! Form::label('year', __('year')) !!}
                    {!! Form::text ('year', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('year', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('code') ? 'has-error' : '' !!}">
                    {!! Form::label('code', __('code')) !!}
                    {!! Form::text ('code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('code', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::button(_('send'), ['class' => 'btn btn-info pull-right', 'ng-click' =>"sendPaymentForm()"]) !!}
                {!! Form::close() !!}
            </>
        </div>
    </div>
@endsection
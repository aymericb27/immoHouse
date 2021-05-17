@extends('template')

@section('content')
<div class="container height-head">
        <div class="panel panel-info">
            <div class="panel-heading"></div>
            <ul class="navbar">
                <li> {{__('information')}}</li>
                <li> {{__('payment')}}</li>
                <li  class="selected"> {{__('information detailed')}}</li>
            </ul>
            <div class="panel-body">
                {!! Form::open(['url' => 'publishDetailed', 'enctype'=>'multipart/form-data',"id" =>'FormInfoDetailed']) !!}
                <div >
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
                    <div class="form-group {!! $errors->has('living_space') ? 'has-error' : '' !!}">
                        {!! Form::label('living_space', __('living space')) !!}
                        {!! Form::number ('living_space', 1, ['class' => 'form-control']) !!}
                        {!! $errors->first('living_space', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('nbr_bathroom') ? 'has-error' : '' !!}">
                        {!! Form::label('nbr_bathroom', __('number of bathroom')) !!}
                        {!! Form::number ('nbr_bathroom', 1, ['class' => 'form-control']) !!}
                        {!! $errors->first('nbr_bathroom', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::label('description', __('description')) !!}
                        {!! Form::textarea ('description', 1, ['class' => 'form-control' ]) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('property_pictures') ? 'has-error' : '' !!}">
                    <div class="gallery_property">
                            <label for='property_picture' class='custom-file-upload'>
                                <i class='fa fa-plus'></i>
                                <input type='file' name='property_pictures' id='property_picture' class="form-control property-pictures">
                            </label>
                        </div>
                        {!! $errors->first('property_pictures', '<small class="help-block">:message</small>') !!}
                    </div>
                    
                    <div class="row files" id="files1">
                        <ul class="fileList"></ul>
                    </div>
                </div>

                {!! Form::submit(_('send'), ['class' => 'btn btn-info pull-right', 'id' => 'uploadBtn']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

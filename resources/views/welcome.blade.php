@extends('template')

@section('content')
<div class="background_homepage">
    <div class="box_search_homepage">
        {!! Form::open(['url' => 'searchProperty', 'enctype'=>'multipart/form-data', "id" =>'searchPropertyForm' ]) !!}
            <div class="mb-40 text-center">
                <h2 class="mb-10">{{__('Welcome to ImmoHouse')}}</h2>
                <p class="mainColor font-italic">{{__('simple, fast and effective')}} !</p>
            </div>
            <div class="row">
                <div class="col-md-5 pl-10 pr-10">
                    {!! Form::text ('search_text', null, ['class' => 'form-control search_val', "id" =>'searchText', "placeholder" => __('Province, postal code or town')]) !!}
                </div>
                <div class="col-md-2 pl-10 pr-10">
                    <select class="form-control search_val" name="sell_or_rent">
                        <option value="1">{{__('to sell')}}</option>
                        <option value="2">{{__('to rent')}}</option>
                    </select>
                </div>
                <div class="col-md-2 pl-10 pr-10">
                    <select class="form-control search_val" name="sub_type_property">
                        @foreach ($sub_property_type as $type)
                            <option value="{{$type->id}}">{{$type->sub_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 pl-10 pr-10">
                    <div class="search_price_box">
                        <span class="price_text">{{__('price')}}</span>
                        <span class="price_value"></span>
                        <i class="fa fa-angle-down"></i>
                    </div>
                    <div class="search_price_box_value d-none row">
                        <div class="col-md-12 p-0">
                            {!! Form::number ('minimum_price', null, ['class' => 'form-control', "placeholder" => __('minimum') . ' €']) !!}
                        </div>
                        <div class="col-md-12 p-0 mt-10">
                            {!! Form::number ('maximum_price', null, ['class' => 'form-control', "placeholder" => __('maximum') . ' €']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div  class="d-none"><a class="btn-link">{{__('add more filter')}} <i class="fa fa-plus"></i></a></div>
            <div class="listResearch mb-40 mt-10"></div>
            <div class="text-center boxBtnSearchProperty">
                <a  class="btn searchInTheList">{{__('search in the list')}}</a>
                <a class="btn welcomeAddMoreFilter">{{__('add more filter')}} <i class="fa fa-plus"></i></a>
                <a  class="btn">{{__('search in map')}} <i class="fa fa-map-marker" aria-hidden="true"></i></a>
            </div>

        {!! Form::close() !!}
    </div>
</div>
<div class="mt-40">
    <h3 class="mainColor mt-20 ml-10 mb-20 text-center">{{__('featured properties')}}</h3>
    @include('sliderHorizontal', array('name' => 'featuredProperties', 'listItems' => $featuredProperties))
</div>
<div class="mt-40 pb-40">
    <h3 class="mainColor mt-20 ml-10 mb-20 text-center">{{__('recently added')}}</h3>
    @include('sliderHorizontal', array('name' => 'lastAdded', 'listItems' => $lastAdded))
</div>
@endsection

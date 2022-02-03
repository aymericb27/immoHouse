@extends('template')

@section('content')
<div class="background_homepage">
    <div class="box_search_homepage">
        {!! Form::open(['url' => 'searchProperty', 'enctype'=>'multipart/form-data', "name" =>'searchPropertyForm' ]) !!}
            <div class="switch_field mb-40 d-none">
                <input type="radio" id="sale_radio" name="sell_or_rent" value="1" checked/>
                <label for="sale_radio">{{__('for sale')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
                <input type="radio" id="rent_radio" name="sell_or_rent" value="2" />
                <label for="rent_radio">{{__('for rent')}}<img src="{!! url('img/icon/check_colored.png') !!}"></label>
            </div>
            <div class="mb-40 text-center">
                <h2>{{__('welcome to immoflat')}}</h2>
            </div>
            <div class="row mb-40">
                <div class="col-md-5 pl-10 pr-10">
                    {!! Form::text ('search_text', null, ['class' => 'form-control', "id" =>'searchText', "placeholder" => __('Province, postal code or town')]) !!}
                </div>
                <div class="col-md-2 pl-10 pr-10">
                    <select class="form-control" name="sale_radio">
                        <option value=1>to sell</option>
                        <option value=2>to rent</option>
                    </select>
                </div>
                <div class="col-md-2 pl-10 pr-10">
                    <select class="form-control" name="sub_type_property">
                        <option value=1>Maison</option>
                        <option value=2>Appartement</option>
                    </select>
                </div>
                <div class="col-md-3 pl-10 pr-10">
                    <div class="search_price_box">
                        {{__('price')}}
                        <i class="fa fa-angle-down  "></i>
                    </div>
                </div>
            </div>
            <div class="text-center boxBtnSearchProperty">
                <a  class="btn">{{__('search in the list')}}</a>
                <a  class="btn">{{__('search in map')}} <i class="fa fa-map-marker" aria-hidden="true"></i></a>
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection

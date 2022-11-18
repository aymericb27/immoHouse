@extends('template')

@section('content')
<div class="container">
    <div>
    <h3 class="filterTitle mainColor">{{__('transaction type')}}</h3>
        @foreach ($sell_or_rent as $typeTransaction)
            <div class="pl-20">
                {!! Form::checkbox ('type_transaction[]', $typeTransaction->id,false, ['class' => 'css-checkbox', 'id' =>"checkbox_property_other_room_". $typeTransaction->id]) !!}
                <label for="checkbox_property_other_room_{{$typeTransaction->id}}" name="checkbox2_lbl" class="css-label lite-blue-check"> {{ $typeTransaction->type}}</label>
            </div>
        @endforeach
    </div>
    <div class="">
        <h3 class="filterTitle mainColor">{{__('adress')}}</h3>
        <div class="row pl-20 ml-0">
        {!! Form::text ('search_text', null, ['class' => 'form-control search_val col-md-6', "id" =>'searchText', "placeholder" => __('Province, postal code or town')]) !!}
        </div>
    </div>
    <div>
        <h3 class="filterTitle mainColor">{{__('property type')}}</h3>
        <select class="form-control ml-20 col-md-6" name="property_type">
            @foreach ($property_type as $type)
                <option value="{{$type->id}}"> {{$type->type}}</option>
            @endforeach
        </select>
    </div>
</div>
<pre>{{print_r($req, true)}}</pre>
@endsection

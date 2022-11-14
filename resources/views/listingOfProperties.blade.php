@extends('template')

@section('content')
<div class="container">
    @foreach ($listProperties as $property)
        <div class=" row p-20 list_property">
            <div class="col-md-3">
                <div class="picture " style=" background-image: url({{ asset('/uploads/property-'.$property->idProperty.'/pic-'. $property->picture->id .'.' . $property->picture->extension) }})"></div>
            </div>
            <div class="col-md-9 p-20">
                <div class="" style="height: 70%;">
                    <h3 class='col-md-12 mb-0'> {{$property->sub_type}} {{__($property->typeSellOrRent)}}</h3>
                    <p class='col-md-12'>{{__('price')}} {{$property->price}} €
                        @if($property->fk_sell_or_rent == 2)
                        /{{__('month')}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    <pre>{{print_r($listProperties,1)}}</pre>
</div>
@endsection

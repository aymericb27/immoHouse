@extends('template')

@section('content')
<div class="container">
    @foreach ($listProperties as $property)
        <div class="list_property_user row p-20">
            <div class="col-md-3">
                <div class="picture " style=" background-image: url({{ asset('/uploads/property-'.$property->idProperty.'/pic-'. $property->picture->id .'.' . $property->picture->extension) }})"></div>
            </div>
            <div class="col-md-9 p-20">
                <div class="" style="height: 70%;">
                    <h3 class='col-md-12 mb-0'> {{$property->sub_type}} {{__($property->type)}}</h3>
                    <p class='col-md-12'>{{__('price')}} {{$property->price}} €
                        @if($property->SellOrRentId == 2)
                        /{{__('month')}}
                        @endif
                    </p>

                </div>
                <div class="pl-15">
                    <a class="btn m-r-10"  href="{!! url('/getProperty/'. $property->idProperty) !!}">{{__('see the announcement')}}</a>
                    <a class="btn m-r-10"  href="{!! url('/getProperty/'. $property->idProperty) !!}">{{__('modify the announcement')}}</a>
                    <a class="btn m-r-10"  href="{!! url('/getProperty/'. $property->idProperty) !!}">{{__('renew subscription')}}</a>
                    <a class="btn btn-danger m-r-10 deleteProperty" id="property_delete-{{$property->idProperty}}">{{__('delete')}}</a>
                </div>
            </div>
        </div>
    @endforeach
    <pre>{{print_r($listProperties,1)}}</pre>
</div>
<div class="modal d-none modaDeleteProperty">
    <div class="modal_content">
        <div class="modal_header"> {{__('warning')}} <span class="close">&times;</span></div>
        <div class="modal_body">
            {{__('if you delete this real estate advertisement there will be no possibility of reimbursement or putting it back online, are you sure of your choice?')}}
        </div>
        <div class="modal_btn"> {{ Form::button(__('no'), array('class' => 'refuseDeleteProperty btn')) }} {{ Form::button(__('yes'), array('class' => 'acceptDeleteProperty btn btn-danger')) }}</div>
    </div>
</div>

@endsection

@extends('template')

@section('content')
<div class="container">
    @foreach ($listProperties as $property)
        <pre>{{print_r($property)}}</pre>
        <div class="list_property">
            <div class="col-md-4">
                <div class="picture " style=" background-image: url({{ asset('/uploads/immo_'.$property->id.'/pic-'. $property->picture->id .'.' . $property->picture->extension) }})"></div>
            </div>
            <div class="col-md-8">
                <p> {{$property->address_postal_code}}   {{ $property->address }}</p>
            </div>
        </div>
    @endforeach
</div>

@endsection

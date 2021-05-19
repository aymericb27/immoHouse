@extends('template')

@section('content')
<div>
    <div class="list-img">

    </div>
    <div class="property_detailed">
        <ul>
            <li><strong>{{__('price')}}</strong> : {{$property->price}}</li>
        </ul>
    </div>
</div>
@endsection

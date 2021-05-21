@extends('template')

@section('content')

<div class="col-md-9 container">
    <div class="list-img">

    <div class="fotorama" data-nav="thumbs" data-height="400">
        @foreach ($property->pictures as $picture)
        <img src ="{{ asset('/uploads/immo_'.$property->id.'/pic-'. $picture->id .'.' . $picture->extension) }}">
     @endforeach
    </div>
</div>
    <div class="property_detailed">
<pre>
    {{print_r($property)}}
</pre>
        <ul>
            <li><strong>{{__('price')}}</strong> : {{$property->price}}</li>
        </ul>
    </div>
</div>
@endsection

<div class="row ml-0 mr-0">
    <div class="slider-btn prev col-md-1" id="prev-{{$name}}"><i class="fa fa-angle-left"></i></div>
    <div class="slider-wrap col-md-10">
        <div class="slider-main" id="slider-main-{{$name}}">
            @foreach ( $listItems as $item)
            <div class="item">   
                <div class="property_horizontal">
                    <a href="{!! url('/getProperty/'. $item->idProperty) !!}">
                         <div class="picture" style=" background-image: url({{ asset('/uploads/property-'.$item->idProperty.'/pic-'. $item->picture->id .'.' . $item->picture->extension) }})">
                            <i class="fa fa-star star_favorite @if($item->isFavorite) is_favorite @endif" id="fav-{{$item->idProperty}}" aria-hidden="true"></i>
                            <img src="{!! url('img/peb/peb_'. $item->fk_energy_class.'.png') !!}">
                        </div>
                        <div class="p-10 pl-20">
                            <div>{{$item->sub_type}} {{__($item->typeSellOrRent)}}</div>
                            <h4 class="mainColor">{{$item->price}} €@if($item->fk_sell_or_rent == 2)/{{__('month')}}@endif</h4>
                            <div>{{$item->address_town}}</div>
                        </div>                
                    </a> 
                </div>
            </div>           
            @endforeach
        </div>
    </div>
    <div class="slider-btn next col-md-1" id="next-{{$name}}"><i class="fa fa-angle-right"></i></div>
</div>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href=" {!! url('css/bootstrap-extras.css') !!}" rel="stylesheet"/>
    <link href=" {!! url('css/bootstrap.css') !!}" rel="stylesheet"/>
    <link rel="stylesheet" href="{!! url('css/fontawesome-free-5.15.3-web/css/all.css')  !!}">
    <link rel="stylesheet" href=" {!! url('css/main.css') !!}">
    <link rel="stylesheet" href=" {!! url('css/checkbox.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{!! url('img/icon/property_information.png') !!}">

</head>
<body ng-app="myApp">
    <header>
        <div class='row m-0' >
            <div class="menu-logo col-md-3">
                <a href="{!! url('/') !!}">
                    <img src="{!! url('img/logo.png') !!}">
                </a>
            </div>
            <div class='menu col-md-7'>
                <ul>
                    <li><a>Agences</a></li>
                    <li><a>A vendre</a></li>
                    @auth
                        <li><a href="{!! url('/publish') !!}">{{__("publish an announcement")}} </a></li>
                        <li><a href="{!! url('/getMyListingProperties') !!}">{{__('my list of properties')}}</a></li>
                    @endauth
                    @guest
                        <li><a id="openModalLogin" href="#">{{__('login')}}</a></li>
                    @endguest
                </ul>
            </div>
            <div class="menu-lang col-md-2">
                <ul>
                    <li><a href="{!! url('/language/FR') !!}">FR</a></li>
                    <li><a href="{!! url('/language/NL') !!}">NL</a></li>
                    <li><a href="{!! url('/language/EN') !!}">ENG</a></li>
                </ul>
            </div>
        </div>
    </header>
    @isset($message)
        <div id="message_popup">
            <div class="row">

                <div class="close_popup">
                    <i class="fas fa-times"></i>
                </div>
                <div class="col-md-10">
                    @if($message === "publishSuccessful")
                        <p>{{__('The property has been added successfully !')}}</p>
                        <p><a href='{{$idProperty}}'>{{__('click here to see it')}}</a></p>
                    @endif
                </div>
            </div>

        </div>
    @endisset
    <div id="content">
	    @yield('content')
    </div>
    @include('auth.login')
</body>
<script src="https://js.stripe.com/v3/"></script>
<script src="{!! url('js/autoCompleteAdress.js') !!}"></script>
<script src="{!! url('js/payment.js') !!}"></script>
<script src="{!! url('js/main.js') !!}"></script>
<script src="{!! url('js/form.js') !!}"></script>
<script src="{!! url('js/PaymentController.js') !!}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6CacJhZWCAY97sjTu6LhB9OXifYzHefY&callback=initAutocomplete&libraries=places&v=weekly&language={{app()->getLocale()}}" async></script>
</html>

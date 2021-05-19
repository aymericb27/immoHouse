<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href=" {!! url('css/bootstrap-extras.css') !!}" rel="stylesheet"/>
    <link href=" {!! url('css/bootstrap.css') !!}" rel="stylesheet"/>
    <link rel="stylesheet" href="{!! url('css/fontawesome-free-5.15.3-web/css/all.css')  !!}">
    <link rel="stylesheet" href=" {!! url('css/main.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body ng-app="myApp">
    <header>
        <div class='row' >
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
                        <li><a href="{!! url('/publish') !!}">publier une annonce  </a></li>
                        <li><a href="{!! url('/getMyListingProperties') !!}">mes annonces </a></li>
                    @endauth
                    @guest
                        <li><a href="{!! url('/register') !!}">s'enregister</a></li>
                        <li><a href="{!! url('/login') !!}">se connecter</a></li>
                    @endguest
                </ul>
            </div>
            <div class="menu-lang col-md-2">
                <ul>
                    <li>FR</li>
                    <li>NL</li>
                    <li>ENG</li>
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

</body>
<script src="https://js.stripe.com/v3/"></script>
<script src="{!! url('js/payment.js') !!}"></script>
<script src="{!! url('js/main.js') !!}"></script>
<script src="{!! url('js/PaymentController.js') !!}"></script>
</html>

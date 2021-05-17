var app = angular.module('myApp', []);
app.controller('PaymentController',['$scope', function($scope, $http) {
  var stripe = Stripe('pk_test_bhE8iLRrJjBdRSlBjOucSzIy00G7xE6jW4');

  $scope.firstName = "ref";
  $scope.sendPaymentForm = function(){
    console.log($scope);
    if(!$scope.hasOwnProperty('command_selected') ){
      console.log("error: no command selected");
      return false;
    }
    if(!$scope.hasOwnProperty('payment_method') ){
      console.log("error: no payment_method selected");
      return false;
    }
    var data = {'payment_method' : $scope.payment_method, '_token': $('input[name="_token"').val(), 'command_selected' : $scope.command_selected };
    $.ajax({
      url : $scope.paymentForm.$$element[0].action,
      type : "POST",
      data : data,
      success : function ($result) {
        $result = jQuery.parseJSON($result);

        if($result['payement_method'] === 'bancontact'){

          window.location.replace($result.session.redirect.url);

      } else if ($result['payement_method'] === 'visa'){
          stripe.redirectToCheckout({

              sessionId: $result.session

          }).then(function (result) {
              // If `redirectToCheckout` fails due to a browser or network
              // error, display the localized error message to your customer
              // using `result.error.message`.
          });
        }
      }
    })
    console.log(data);
  }
}]);
var stripe = Stripe('pk_test_bhE8iLRrJjBdRSlBjOucSzIy00G7xE6jW4');
var $form = $('#payment_form');

$form.on('submit',(function(e){
    e.preventDefault();
    console.log('ok');
    $form.find('.button').attr('disabled', true);
}))
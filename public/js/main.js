$('.close_popup i').on('click',function(){
    $('#message_popup').hide();
});

$( document ).ready(function() {
    $val_is_society = $('input[type=radio][name=is_society]').val();
    if($val_is_society === '1' && $('input[type=radio][name=is_society]').is(':checked')){
        $('.company_register').removeClass('d-none');
    }
});
$('input[type=radio][name=is_society]').change(function() {
    (this.value == 1) ? $('.company_register').removeClass('d-none') : $('.company_register').addClass('d-none');
});



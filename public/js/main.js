$(function() {
    var idProperty = '';
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

    $('.deleteProperty').on('click',function(){
        $('.modaDeleteProperty').removeClass('d-none');
        idProperty = $(this).attr('id').split('-')[1];
    })

    $('.acceptDeleteProperty').on('click',function(){
        console.log(idProperty);
        $('.modaDeleteProperty').addClass('d-none');
        $.ajax({
            url: "/deleteProperty/" + idProperty,
            cache: false,
            processData: false,
            contentType: false,
            type: "GET",
            success: function (url) {
                console.log(url);
                return false;
                window.location.replace(url);
            },
            error: function (data) {
                alert("ERROR - " + data);
            }
        });
    });

    $('.modal .close').on('click',function(){
        $('.modaDeleteProperty').addClass('d-none');
    })

    $('.refuseDeleteProperty').on('click',function(){
        $('.modaDeleteProperty').addClass('d-none');
    })

})

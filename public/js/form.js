$(document).ready(function() {
    $('.nextPublishButton').on('click',function(){
        if(validatePublishForm()){
            $step = $(this).attr('id').split('-')[1];
            $('#left_form_step-' + $step).addClass('form_step_publish_already_selected');
            goToStep($step);
        }
    });

    $('.previousPublishButton').on('click',function(){
        $step = $(this).attr('id').split('-')[1];
        goToStep($step);
    })

    $('.left_form_step').on('click',function(){
        if($(this).hasClass('form_step_publish_already_selected')){
            $step = $(this).attr('id').split('-')[1];
            goToStep($step);
        }
    })

    $('.image_type_of_property > div').on('click',function(){
        $type = $(this).attr('id').split('-')[1];
        $( 'input[name="sub_type_of_property"]' ).prop( "checked", false );
        $('.type_of_property_selected').removeClass('type_of_property_selected');
        $('.type_of_property_' + $type).addClass('type_of_property_selected');
        $('.image_type_of_property_selected').removeClass('image_type_of_property_selected');
        $(this).addClass('image_type_of_property_selected');
    })

    function goToStep($step){
        $('.form_step_publish_selected').removeClass('form_step_publish_selected');
        $('#left_form_step-' + $step).addClass('form_step_publish_selected');
        $('.form_publish_selected').removeClass('form_publish_selected');
        $('#form_publish_step-' + $step).addClass('form_publish_selected');
    }

    function validatePublishForm(){
        $('.error').hide();
        $step = parseInt($('.form_publish_selected').attr('id').split('-')[1]);
        $isValid = true;
        $errorClass= '';
        console.log($step);
        switch($step){
            case 0 :
                if(!$('.image_type_of_property_selected')[0]){
                    $isValid = false;
                    $errorClass = 'err_image_type_of_property';
                    break;
                }
                if($('input[name="sub_type_of_property"]').prop('checked') == false){
                    $isValid = false;
                    $errorClass = "err_type_of_property";
                }
        }
        if(!$isValid){
            $('.' + $errorClass).show();
        }
        return $isValid;
    }
});

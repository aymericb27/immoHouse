$(document).ready(function() {
    $('.nextPublishButton').on('click',function(){
        if(validatePublishForm()){
            $step = $(this).attr('id').split('-')[1];
            $('#left_form_step-' + $step).addClass('form_step_publish_already_selected');
            goToStep($step);
        }
    });

    $('input[name="sale_or_rent"]').on('change',function(){
        $value = parseInt($(this).val());
        $('#form_publish_step-2').removeClass('rent sale');
        ($value) ? $('#form_publish_step-2').addClass('sale') : $('#form_publish_step-2').addClass('rent');
    })

    $('.previousPublishButton').on('click',function(){
        $step = $(this).attr('id').split('-')[1];
        goToStep($step);
    })

    $('.left_form_step').on('click',function(){
        $step = $(this).attr('id').split('-')[1];
        goToStep($step);
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

    $('.less_or_plus_box .less').on('click',function(){
        $input = $(this).next();
        if(($val = parseInt($input.val())) > 0){
            changeLessOrPlusInput(--$val,$input);
        }
    })

    $('.less_or_plus_box .plus').on('click',function(){
        $input = $(this).prev();
        changeLessOrPlusInput(++$val,$input);
    })

    function changeLessOrPlusInput($val,$input){
        $input.val($val);
    }

    function validatePublishForm(){
        $('.error').hide();
        $step = parseInt($('.form_publish_selected').attr('id').split('-')[1]);
        $isValid = true;
        $errorClass= [];
        switch($step){
            case 0 :
                return true;
                if(!$('.image_type_of_property_selected')[0]){
                    $isValid = false;
                    $errorClass.push('err_image_type_of_property');
                    break;
                }
                if(!verifySubTypeProperty()){
                    $isValid = false;
                    $errorClass.push('err_type_of_property');
                }
                break;
            case 1:
                $arrAdress = ['street', 'town', 'postal_code', 'address_number'];
                $.each($arrAdress,function(index,value){
                    if(!$('input[name="' + value +'"]').val()){
                        $isValid = false;
                        $errorClass.push('err_' + value);
                    }
                })
            case 2:
                if(!$('input[name="price"]').val()){
                    $isValid = false;
                    $errorClass.push('err_price');
                }
        }
        if(!$isValid){
            $.each($errorClass,function(index,value){
                $('.' + value).show();

            })
        }
        return $isValid;
    }

    function verifySubTypeProperty(){
        $isValid = false;
        $('input[name="sub_type_of_property"]').each(function(){
            if($(this).prop('checked')){
               $isValid = true;
            }
        })
        return $isValid;
    }

    $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
        var fileIdCounter = 0;

        $("#property_picture").on('change',function (evt) {

            for (var i = 0; i < evt.target.files.length; i++) {
                fileIdCounter++;
                var file = evt.target.files[i];
                var fileId = sectionIdentifier + fileIdCounter;

                filesToUpload.push({
                    id: fileId,
                    file: file
                });
                var reader = new FileReader();

                reader.onload = function(fileId) {
                    return function(event){
                        var removeLink = "<a class='removeFile' href='#' data-fileid='" + fileId + "'><i class='fa fa-trash'></i></a>";
                        $html = "<li><img src='"+ event.target.result +"'>" + removeLink + "</li>";
                        $(".fileList").append($html);
                    }

                }(fileId);
                reader.readAsDataURL(file);

            };


            //reset the input to null - nice little chrome bug!
            evt.target.value = null;
        });

        $(this).on("click", ".removeFile", function (e) {
            e.preventDefault();
            var fileId = $(this).parent().children("a").data("fileid");

            // loop through the files array and check if the name of that file matches FileName
            // and get the index of the match
            for (var i = 0; i < filesToUpload.length; ++i) {
                if (filesToUpload[i].id === fileId){
                    filesToUpload.splice(i, 1);
                }
            }
            console.log(filesToUpload);
            $(this).parent().remove();
        });

        this.clear = function () {
            for (var i = 0; i < filesToUpload.length; ++i) {
                if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                    filesToUpload.splice(i, 1);
            }

            $(this).children(".fileList").empty();
        }

        return this;
    };

    (function () {
        var filesToUpload = [];

        var files1Uploader = $("#files1").fileUploader(filesToUpload, "img_property");

        $("#FormInfoDetailed").on('submit',function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            for (var i = 0, len = filesToUpload.length; i < len; i++) {
                formData.append("property_files[]", filesToUpload[i].file);
            }

            console.log(formData.entries());
            formData.delete('property_pictures');
            $.ajax({
                url: $('#FormInfoDetailed').attr('action'),
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                success: function (data) {
                    console.log(data);
                   // files1Uploader.clear();
                },
                error: function (data) {
                    alert("ERROR - " + data.responseText);
                }
            });
        });
    })()
});

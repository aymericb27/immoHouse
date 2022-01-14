$(function() {
    $('.nextPublishButton').on('click',function(){
        if(validatePublishForm()){
            $step = parseInt($('.form_publish_selected').attr('id').split('-')[1]) + 1;
            $('#left_form_step-' + $step).addClass('form_step_publish_already_selected');
            goToStep($step);
        }
    });

    $('.previousPublishButton').on('click',function(){
        if(validatePublishForm()){
            $step = parseInt($('.form_publish_selected').attr('id').split('-')[1]) - 1;
            goToStep($step);
        }

    })

    $('input[name="sale_or_rent"]').on('change',function(){
        $value = parseInt($(this).val());
        $('#formPublish').removeClass('rent sell');
        ($value === 1)? $('#formPublish').addClass('sell') : $('#formPublish').addClass('rent')

        $('.pack_selected').removeClass('pack_selected');
        $( 'input[name="pack"]' ).prop( "checked", false );
    })

    $('input[name="pack"]').on('change',function(){
        $('.pack_selected').removeClass('pack_selected');
        $(this).parent().parent().parent().addClass('pack_selected');
    })

    $('select[name="number_week"]').on('change',function(){
        selectPriceByWeek($(this).val());
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
        $typeId = $(this).attr('id').split('-')[1];
        $val = 1;
        switch($typeId){
            case '1' : $val = 1; break;
            case '2' : $val = 9; break;
            case '3' : $val = 16; break;
        }
        $('select[name="sub_type_property"]').val($val);
        $('.sub_type_property_option_selected').removeClass('sub_type_property_option_selected');
        $('.property_type-' + $typeId).addClass('sub_type_property_option_selected');
        $('.image_type_of_property_selected').removeClass('image_type_of_property_selected');
        $('.sub_type_property').show();
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

    $('.description_btn_box div').on('click', function(){
        $('.description_btn_selected').removeClass('description_btn_selected');
        $(this).addClass('description_btn_selected');
        $('.description_selected').removeClass('description_selected');
        $id = $(this).attr('id').split('-')[0];
        $('#'+ $id).addClass('description_selected');
    })

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

    $.fn.fileUploader = function (mainPhoto,filesToUpload, sectionIdentifier) {
        var fileIdCounter = 0;

        $("#property_picture").on('change',function (evt) {

            for (var i = 0; i < evt.target.files.length; i++) {
                fileIdCounter++;
                var file = evt.target.files[i];
                var fileId = sectionIdentifier + fileIdCounter;
                var classPhotoMain = '';
                if(filesToUpload.length == 0){
                    classPhotoMain = 'mainPhoto'
                    mainPhoto = fileId;
                }
                filesToUpload.push({
                    id: fileId,
                    file: file
                });
                var reader = new FileReader();

                reader.onload = function(fileId,classPhotoMain) {
                    return function(event){
                        var removeLink = "<a class='removeFile' href='#' data-fileid='" + fileId + "'><i class='fa fa-trash'></i></a>";
                        var star = "<a class='makePhotoMain "+ classPhotoMain +"' href='#'  data-fileid='" + fileId + "'><i class='fa fa-star'></i></a>";
                        $html = "<li><div style='background-image: url(\""+event.target.result +"\")'>" + removeLink + star +"</div></li>";
                        $(".fileList").append($html);
                    }

                }(fileId,classPhotoMain);
                reader.readAsDataURL(file);

            };


            //reset the input to null - nice little chrome bug!
            evt.target.value = null;
        });

        $(this).on("click", ".removeFile", function (e) {
            e.preventDefault();
            var fileId = $(this).data("fileid");

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

        $(this).on("click", ".makePhotoMain:not(.mainPhoto)", function (e) {
            $('.mainPhoto').removeClass('mainPhoto');
            $(this).addClass('mainPhoto');
            mainPhoto =  $(this).data("fileid");
            e.preventDefault();

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

    function selectPriceByWeek($idWeek){
        $('.week_selected').removeClass('week_selected');
        $('.price_week-'+ $idWeek).addClass('week_selected');
    }

    (function () {
        var filesToUpload = [];
        var mainPhoto = '';
        var files1Uploader = $("#files1").fileUploader(mainPhoto,filesToUpload, "img_property");

        selectPriceByWeek(1);


        $("#formPublish").on('submit',function (e) {
            e.preventDefault();
                        var formData = new FormData(this);

            for (var i = 0, len = filesToUpload.length; i < len; i++) {
                console.log('getFile');
                formData.append("property_files[]", filesToUpload[i]);
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
             }
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

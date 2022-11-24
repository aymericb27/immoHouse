$(function() {

    //** PUBLISH FORM  **/
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

    $('input[name="sell_or_rent"]').on('change',function(){
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
        $('.pack_selected').removeClass('pack_selected');
        $( 'input[name="pack"]' ).prop( "checked", false );
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
        $val = parseInt($input.val());
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
                break;
            case 1:
                $arrAdress = ['street', 'town', 'postal_code', 'address_number'];
                $.each($arrAdress,function(index,value){
                    if(!$('input[name="' + value +'"]').val()){
                        $isValid = false;
                        $errorClass.push('err_' + value);
                    }
                })
                break;
            case 2:
                if(!$('input[name="price"]').val()){
                    $isValid = false;
                    $errorClass.push('err_price');
                }
                break;
            case 3:
                if($('.fileList').children().length == 0){
                    $isValid = false;
                    $errorClass.push('err_property_pictures');
                }
                break;
            case 8:
                if(!$('input[name="type_payment"]').is(':checked')){
                    $isValid = false;
                    $errorClass.push('err_type_payment');
                }
                if(!$('input[name="pack"]').is(':checked')){
                    $isValid = false;
                    $errorClass.push('err_pack');
                }
                break;
        }
        if(!$isValid){
            $.each($errorClass,function(index,value){
                $('.' + value).show();

            })
        }
        return $isValid;
    }

    $.fn.fileUploader = function (mainPhoto,filesToUpload, sectionIdentifier) {
        var fileIdCounter = 0;
        var numberOfFile = 0;
        $("#property_picture").on('change',function (evt) {

            $('.err_size_picture').hide();
            for (var i = 0; i < evt.target.files.length; i++) {
                numberOfFile++;
                fileIdCounter++;
                var file = evt.target.files[i];
                if(file.size >= 5242880 ){
                    $('.err_size_picture').show();
                    return false;
                }
                $('#numberOfPicture').html(numberOfFile);
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
            $(this).parent().parent().remove();
            numberOfFile--;
            $('#numberOfPicture').html(numberOfFile);
        });

        $(this).on("click", ".makePhotoMain:not(.mainPhoto)", function (e) {
            console.log(mainPhoto);
            $('.mainPhoto').removeClass('mainPhoto');
            $(this).addClass('mainPhoto');
            mainPhoto =  $(this).data("fileid");
            console.log(mainPhoto);
            e.preventDefault();

        });

        this.mainPhoto = function(){
            return mainPhoto;
        }

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
        var stripe = Stripe('pk_test_bhE8iLRrJjBdRSlBjOucSzIy00G7xE6jW4');
        $pictures = $("#files1").fileUploader(mainPhoto,filesToUpload, "img_property");

        selectPriceByWeek(1);
        $("#formPublish").on('submit',function (e) {
            e.preventDefault();
        });

        $("#sendPublish").on('click',function (e) {
            if(validatePublishForm()){
                e.preventDefault();
                $form = $('#formPublish');
                var formData = new FormData(document.getElementById('formPublish'));
                formData.delete('property_pictures');
                for (var i = 0, len = filesToUpload.length; i < len; i++) {
                    formData.append("property_pictures[]", filesToUpload[i].file);
                    formData.append("property_pictures_id[]", filesToUpload[i].id);
                }
                formData.append('main_photo', $pictures.mainPhoto());

                $.ajax({
                    url: $form.attr('action'),
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data.redirect == "property"){
                            window.location.replace(data.url);
                        }
                        else if(data.redirect == "payment"){
                            if(data['payement_method'] === 'bancontact'){

                                window.location.replace(data.session.redirect.url);

                            } else if (data['payement_method'] === 'visa'){
                                stripe.redirectToCheckout({

                                    sessionId: data.session

                                }).then(function (result) {
                                    // If `redirectToCheckout` fails due to a browser or network
                                    // error, display the localized error message to your customer
                                    // using `result.error.message`.
                                    alert(result.error.message);
                                });
                              }
                        }
                    // files1Uploader.clear();
                    },
                    error: function (data) {
                        alert("ERROR - " + data.responseText);
                    }
                });
            }
        });
    })()

    //** MORE FILTER FORM **//

    if($("#searchPropertyInMoreFilterForm").length) {
        loadNumberProperty();
    }

    $('#searchPropertyInMoreFilterForm .less_or_plus_box').on('click',function(event){
        loadNumberProperty();
    })
    $('#searchPropertyInMoreFilterForm').on('keyup change paste', 'input, select, textarea', function(){
        loadNumberProperty();
    });

    function loadNumberProperty(){
        sendMoreFilterForm('getNumberPropertiesMoreFilter',function(result){
            $('.numberProperties').html(result);
        });
    }

    $('.searchInMoreFilter').on('click',function(event){
        sendMoreFilterForm('researchByMoreFilter',function(result){
            document.open();
            window.history.pushState('', '', '/moreFilter');
            document.write(data);
            document.close();
            console.log(result);
        });
    })

    $('.moreFilterPropertyType label').on('click',function(event){
        $id = $(this).attr('id').split('-')[1];
        ($(this).hasClass('isPropertyTypeSelected')) ? $(this).removeClass("isPropertyTypeSelected") : $(this).addClass("isPropertyTypeSelected");
        $("#propertyTypeSubTab_" + $id + " input").prop('checked',($(this).hasClass('isPropertyTypeSelected')));
        console.log($id);
    })

    $('.checkbox_sub_type_property').on('click',function(event){
        let isAlreadyChecked = 0;
        $idCheckBox = $(this).prev().attr('id');
        $id = $(this).parent().parent().attr('id').split('_')[1];
        let propTypeLabel = $('#property_type_label-' + $id);

        if(!$(this).prev().is(':checked')){

            isAlreadyChecked = 1;
            if(!propTypeLabel.hasClass('isPropertyTypeSelected')){
                propTypeLabel.addClass('isPropertyTypeSelected');
                propTypeLabel.prev().prop('checked',true);
            }
        }
        $("#propertyTypeSubTab_" + $id + " input").each(function(index,element){
            if($(element).is(':checked') && $(element).attr('id') !== $idCheckBox){
                isAlreadyChecked = 1;
            }
        });
        if(!isAlreadyChecked){
            propTypeLabel.removeClass('isPropertyTypeSelected');
            propTypeLabel.prev().prop('checked',false);
        }
    })

    $('.btnSwitchSubProperty').on('click',function(event){
        $(this).toggleClass('btnSwitchSubPropertySelected');
        $('.btnSwitchSubPropertySelected').not(this).removeClass('btnSwitchSubPropertySelected');
        $id = $(this).prev().attr('id').split('-')[1];
        $('.propertyTypeSubTab').addClass('d-none');
        if($(this).hasClass('btnSwitchSubPropertySelected')){
            $('#propertyTypeSubTab_' + $id).removeClass('d-none');
        }
    });

    function sendMoreFilterForm(url,callback){
        var formData = new FormData(document.getElementById('searchPropertyInMoreFilterForm'));
        for(var i = 0; i < $listPlaceResearch.length; ++i){
            formData.append("place_research[]", JSON.stringify($listPlaceResearch[i]));
        }
         $.ajax({
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                callback(data);
            },
            error: function (data) {
                alert("ERROR - " + data.responseText);
            }
        });
    }
});

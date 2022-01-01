$('.close_popup i').on('click',function(){
    $('#message_popup').hide();
});

$('input[type=radio][name=is_society]').change(function() {
    (this.value == 1) ? $('.company_register').removeClass('d-none') : $('.company_register').addClass('d-none');
});


$.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;

    $("#property_picture").on('change',function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });
            var reader = new FileReader();

            reader.onload = function(event) {
              //  $html = "<div><img src='"+ event.target.result +"'><a class='removeFile' href='#' onclick='removeFile()' data-fileid='" + fileId + "'><i class='fa fa-trash'></i></a></div>";
               // var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + fileId + "\">Remove</a>";

                var removeLink = "<a class='removeFile' href='#' data-fileid='" + fileId + "'><i class='fa fa-trash'></i></a>";
                output.push("<li><img src='"+ event.target.result +"'>", removeLink,"</li>");
                $(".fileList").append(output.join(""));
            }
            reader.readAsDataURL(file);

        };


        //reset the input to null - nice little chrome bug!
        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();
        console.log('remove')
        var fileId = $(this).parent().children("a").data("fileid");

        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }

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

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
    var files2Uploader = $("#files2").fileUploader(filesToUpload, "files2");
    var files3Uploader = $("#files3").fileUploader(filesToUpload, "files3");

    $("#FormInfoDetailed").on('submit',function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        console.log($('input[type=file]')[0].files[0]);
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

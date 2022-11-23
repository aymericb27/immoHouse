$(function () {
    var idProperty = '';
    let minimumPrice = '';
    let maximumPrice = '';
    $('.close_popup i').on('click', function () {
        $('#message_popup').hide();
    });

    $('.search_price_box_value input').on('keyup mouseup', function () {
        $html = '';

        ($(this).attr('name') === "minimum_price") ? minimumPrice = transformPrice($(this).val()) : maximumPrice = transformPrice($(this).val());
        if (minimumPrice && maximumPrice) {
            $html = minimumPrice + ' - ' + maximumPrice;
        } else if (minimumPrice) {
            $html = minimumPrice + ' < ';
        } else if (maximumPrice) {
            $html = '< ' + maximumPrice;
        }
        ($('input[name="minimum_price"]').val() || $('input[name="maximum_price"]').val()) ? addDisplayNone('.price_text') : removeDisplayNone('.price_text');
        $('.price_value').html($html);
    });

    function transformPrice($val) {
        $val = parseInt($val);
        if ($val >= 1000000) {
            $val = ($val / 1000000) + "M";
        }
        if ($val >= 1000) {
            $val = ($val / 1000) + 'K';
        }

        return $val;
    }

    $('.search_price_box').on('click', function () {
        $('.search_price_box_value').toggleClass('d-none');
    })

    $('.search_val').on('click', function () {
        addDisplayNone('.search_price_box_value');
    })

    $val_is_society = $('input[type=radio][name=is_society]').val();
    if ($val_is_society === '1' && $('input[type=radio][name=is_society]').is(':checked')) {
        $('.company_register').removeClass('d-none');
    }

    $('input[type=radio][name=is_society]').change(function () {
        (this.value == 1) ? $('.company_register').removeClass('d-none') : $('.company_register').addClass('d-none');
    });

    $('.deleteProperty').on('click', function () {
        $('.modaDeleteProperty').removeClass('d-none');
        idProperty = $(this).attr('id').split('-')[1];
    })

    $('.acceptDeleteProperty').on('click', function () {
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

    $('.contactByPhoneBtn').on('click', function () {
        $(this).addClass('d-none');
        $('.contact_phone_number').removeClass('d-none');
    })

    $('.contactByMailBtn').on('click', function () {
        $('.modalSendMail').removeClass('d-none');
    });

    $('.modal .close').on('click', function () {
        $('.modal').addClass('d-none');
    })

    $('.refuseDeleteProperty').on('click', function () {
        $('.modaDeleteProperty').addClass('d-none');
    })

    $('.openModalMapProperty').on('click', function (event) {
        event.preventDefault();
        $hrefExplode = $(this).attr('href').split('-');
        $lat = parseFloat($hrefExplode[0]);
        $lng = parseFloat($hrefExplode[1]);
        var myLatLng = { lat: $lat, lng: $lng };
        $('.modalMapProperty').removeClass('d-none');

        let map;

        map = new google.maps.Map(document.getElementById("mapProperty"), {
            center: myLatLng,
            zoom: 15,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
        });
    })

    function openModalLogin() {
        removeDisplayNone('.loginModal');
        $.ajax({
            url: '/saveRouteForLogin',
            data: { pathname: window.location.pathname },
            type: "GET",
            success: function (result) {
                console.log(result);
            },
            error: function (data) {
                alert("ERROR - " + data.message);
            }
        });
    }

    $('#openModalLogin').on('click', function (event) {
        event.preventDefault();
        openModalLogin();
    })
    $('.list_property .star_favorite').on('click', function (event) {
        event.preventDefault();
    });

    $('.property_horizontal .star_favorite').on('click', function (event) {
        event.preventDefault();
    });

    $('.star_favorite').on('click', function (event) {
        var th = $(this);
        var idProperty = th.attr('id').split('-')[1];

        isUserConnected(function (result) {
            if (result) {
                th.toggleClass('is_favorite');
                $.ajax({
                    url: '/toggleFavoris',
                    data: { idProperty: idProperty },
                    type: "GET",
                    success: function (result) {
                        console.log(result);
                        //(result === "add") ? th.addClass('is_favorite') : th.removeClass('is_favorite');
                    },
                    error: function (data) {
                        alert("ERROR - " + data.message);
                    }
                })
            } else {
                openModalLogin();
            }
        })

    })

    function isUserConnected(callback) {
        $.ajax({
            url: '/isUserConnected',
            cache: false,
            processData: false,
            contentType: false,
            type: "GET",
            success: function (result) {
                callback(result);
            },
            error: function (data) {
                alert("ERROR - " + data.message);
            }
        });
    }

    function removeDisplayNone($id) {
        $($id).removeClass('d-none');
    }

    function addDisplayNone($id) {
        $($id).addClass('d-none');
    }

})


$(".slider-btn.next").on('click', function () {
    var nameSlide = $(this).attr('id').split('-')[1];
    var sliderMain = document.getElementById("slider-main-" + nameSlide);
    var item = sliderMain.getElementsByClassName('item');
    sliderMain.append(item[0]);
})

$(".slider-btn.prev").on('click', function () {
    var nameSlide = $(this).attr('id').split('-')[1];
    var sliderMain = document.getElementById("slider-main-" + nameSlide);
    var item = sliderMain.getElementsByClassName('item');
    sliderMain.prepend(item[item.length - 1]);
})

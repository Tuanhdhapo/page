$(function () {
    $('.slick').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-angle-left prev"></i>',
        nextArrow: '<i class="fas fa-angle-right next"></i>',
        responsive: [{
            breakpoint: 995,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },]
    });

    $('#show').on('click', function () {
        $("#hide").css({ "display": "block" })
    });

    $('#close-mess').on('click', function () {
        $("#hide").css({ "display": "none" })
    });

    $('#showheader').on('click', function () {
        $("#hideheader").css({ "display": "block" })
        $("#showheader").css({ "display": "none" })
        $("#navbarNav").css({ "display": "block" })
    });

    $('#hideheader').on('click', function () {
        $("#showheader").css({ "display": "block" })
        $("#hideheader").css({ "display": "none" })
        $("#navbarNav").css({ "display": "none" })
    });

    $('#register-change').on('click', function () {
        if ($('#login-change').hasClass('active-tab')) {
            $('#login-change').removeClass('active-tab');
            $("#tabs-login").css({ "display": "none" })
        }

        $(this).addClass('active-tab');
    });

    $('#login-change').on('click', function () {
        if ($('#register-change').hasClass('active-tab')) {
            $('#register-change').removeClass('active-tab');
            $("#tabs-login").css({ "display": "block" })
        }

        $(this).addClass('active-tab');
    });
    var x = true;
    $('#showfilter').on('click', function () {
        if (x) {
            $("#filter").css({ "display": "block" });
            x = false;
        }
        else {
            $("#filter").css({ "display": "none" });
            x = true;
        }
    });

    $("#btn-reset-filter").on('click', function () {
        $("#filter-search").val("");
        $(".inp-filter").val("");
        $(".btn-latest").prop("checked", false);
        $(".btn-oldest").prop("checked", false);
    });

});

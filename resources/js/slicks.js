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
    },
    ]
});

$('#show').on('click', function () {
    $("#hide").css({ "display": "block" })
    $("#show").css({ "display": "none" })
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


$(function () {
    $("#draggable").draggable();
});

$(function () {
    $("#tabs").tabs();
});

$('#register-change').on('click', function () {
    if ($('#login-change').hasClass('active-tab')) {
        $('#login-change').removeClass('active-tab');
    }

    $(this).addClass('active-tab');
});

$('#login-change').on('click', function () {
    if ($('#register-change').hasClass('active-tab')) {
        $('#register-change').removeClass('active-tab');
    }

    $(this).addClass('active-tab');
});

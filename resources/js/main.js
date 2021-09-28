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

  $('#showHeader').on('click', function () {
    $("#hideHeader").css({ "display": "block" })
    $("#showHeader").css({ "display": "none" })
    $("#navbarNav").css({ "display": "block" })
  });

  $('#hideHeader').on('click', function () {
    $("#showHeader").css({ "display": "block" })
    $("#hideHeader").css({ "display": "none" })
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

  $('#showFilter').on('click', function () {
    $("#filter").toggle();
  });
});

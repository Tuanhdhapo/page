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

  $('#closeMess').on('click', function () {
    $("#hide").css({ "display": "none" })
  });

  $('#showHeader').on('click', function () {
    $("#hideHeader").css({ "display": "block" })
    $("#showHeader").css({ "display": "none" })
    $("#naBarNav").css({ "display": "block" })
  });

  $('#hideHeader').on('click', function () {
    $("#showHeader").css({ "display": "block" })
    $("#hideHeader").css({ "display": "none" })
    $("#navBarNav").css({ "display": "none" })
  });

  $('#registerChange').on('click', function () {
    if ($('#loginChange').hasClass('active-tab')) {
      $('#loginChange').removeClass('active-tab');
      $("#tabsLogin").css({ "display": "none" })
    }

    $(this).addClass('active-tab');
  });

  $('#loginChange').on('click', function () {
    if ($('#registerChange').hasClass('active-tab')) {
      $('#registerChange').removeClass('active-tab');
      $("#tabsLogin").css({ "display": "block" })
    }

    $(this).addClass('active-tab');
  });

});

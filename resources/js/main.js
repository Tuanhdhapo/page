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

  $(function () {
    var lengthReview = $('.show-comment-user').length;
    $('.total-review-txt').text(lengthReview + ' Review');
    $('.total-rating-txt').text(lengthReview + ' Review');

    $('#btn-send-review').on('click', function (e) {
      $('.err-review').css({ "display": "none" });
      if ($('#btn-regis-login').length > 0) {
        e.preventDefault();
        $("#myModal").modal("show");
        $("#login").addClass("active");
        $("#nav-login").addClass("active");
      }

      if ($('#input-review-course').val().trim().length <= 0) {
        e.preventDefault();
        $('.err-review').css({ "display": "inline-block" });
      }
    });

    $('#form-review').submit(function (e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });

      var content = $('#input-review-course').val();
      var courseId = $('#course-id').val();
      var userId = $('#user-id').val();
      var rate;

      $('.rate').each(function () {
        if ($(this).is(':checked')) {
          rate = $(this).val();
        }
      })

      $.ajax({
        url: "/addreview",
        method: "POST",
        data: {
          rate: rate,
          content: content,
          courseId: courseId,
          userId: userId
        },
        dataType: "json",
        success: function (result) {
          if (result) {
            var rating = '';
            for (var i = 0; i < result.review.rate; i++) {
              rating += '<i class="fas fa-star checked"></i>'
            }

            for (var j = 0; j < 5 - result.review.rate; j++) {
              rating += '<i class="fas fa-star"></i>'
            }

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var html = '<div class="col-lg-12 show-comment-user"><div class="row comment-header justify-content-start align-items-center"><div class="ava-user-cmt text-center"><img src="http://127.0.0.1:8000/storage/avatar_user/' + result.ava_user + '" alt="avatar user"></div><div class="name-user-cmt text-center"><p>' + result.user + '</p></div><div class="star-user-rating text-center">' + rating + '</div><div class="time-user-cmt text-center"><p>' + result.review.created_at + '</p></div></div><div class="row comment-body justify-content-start align-items-center"><p>' + result.review.content + '</p></div><div class="row btn-reply-comment m-0 justify-content-end align-items-center"><a href="#" class="btn-reply" data-id="' + result.review.id + '" onclick="return false">Reply</a></div><div data-id="' + result.review.id + '" class="row reply-comment-container justify-content-end align-items-center"></div><div class="row justify-content-end align-items-center"><div class="col-lg-11 input-reply-container"><form data-id="' + result.review.id + '" class="form-reply-comment ' + result.review.id + '"><input name="_token" value="' + csrf_token + '" type="hidden"><br><textarea name="review" data-id="' + result.review.id + '" class="form-control input-reply-comment" rows="4"></textarea><br><input type="hidden" data-id="' + result.review.id + '" value="' + result.review.id + '" class="review-id-reply"><input type="hidden"  data-id="' + result.review.id + '" value="' + result.user_id + '" class="user-id-reply"><input class="btn-sent-reply" data-id="' + result.review.id + '" type="submit" value="Send"></form></div></div><hr></div>';

            $('.show-cmt-container').append(html);
            $('#form-review')[0].reset();

            lengthReview = $('.show-comment-user').length;
            $('.total-rating-txt').text(lengthReview + ' Review');
            $('.total-review-txt').text(lengthReview + ' Review');
          }
        },
        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      })
    });
  })

  const { isNull } = require("lodash");

  $(function () {
    $('.btn-reply').on('click', function () {
      if ($('#btn-regis-login').length > 0) {
        $("#myModal").modal("show");
        $("#login").addClass("active");
        $("#nav-login").addClass("active");
      }

      var form = $(this).data('id');

      $('.form-reply-comment').each(function () {
        if ($(this).hasClass(form) && $('#btn-regis-login').length == 0 || $(this).data('id') == form) {
          console.log('an');
          if ($(this).css("display") == "none") {
            $(this).css({ "display": "block" })
          } else {
            $(this).css({ "display": "none" })
          }
        } else {
          $(this).css({ "display": "none" })
        }
      });

      $('.review-id-reply').each(function () {
        if ($(this).val() != form) {
          $(this).removeClass("get-review-id");
        }

        if ($(this).val() == form) {
          $(this).addClass("get-review-id");
        }
      });

      $('.input-reply-comment').each(function () {
        if ($(this).data('id') != form) {
          $(this).val("");
        }
      });
    });

    $('.form-reply-comment').submit(function (e) {
      e.preventDefault();

      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });

      var reply;
      var reviewId;
      $('.input-reply-comment').each(function () {
        if ($(this).val()) {
          reply = $(this).val();
          reviewId = $(this).data('id');
        }
      });

      var userId = $('.user-id-reply').first().val();

      if (!isNull(reply) && !isNull(reviewId) && !isNull(userId)) {
        $.ajax({
          url: "/replyreview",
          method: "POST",
          data: {
            reply: reply,
            reviewId: reviewId,
            userId: userId
          },
          dataType: "json",
          success: function (result) {
            var html = '<div class="col-lg-11"><hr><div class="comment-header row reply-comment-main align-items-center"><div class="ava-user-cmt text-center"><img src="http://127.0.0.1:8000/storage/avatar_user/' + result.ava_user + '" alt="avatar user"></div> <div class="name-user-cmt text-center"><p>' + result.user + '</p></div><div class="time-user-cmt text-center"><p>' + result.reply.created_at + '</p></div></div><div class="row pl-0 comment-body reply-comment-body"><p>' + result.reply.content + '</p></div></div>'
            console.log(result);

            $('.reply-comment-container').each(function () {
              if ($(this).attr("data-id") == result.reply.feedback_id) {
                $(this).append(html);
              }
            });

            $('.input-reply-comment').each(function () {
              $(this).val('');
            });
          },
          error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
          }
        })
      }
    });
  })

  $(function () {
    $('#btn-profile-header').on('click', function (e) {
      if ($('#btn-regis-login').length > 0) {
        e.preventDefault();
        $("#loginModal").modal("show");
        $("#tabs-login").addClass("active");
        $("#nav-login").addClass("active");
      }
    });

    $('#btn-join-course').on('click', function (e) {
      if ($('#btn-regis-login').length > 0) {
        e.preventDefault();
        $("#loginModal").modal("show");
        $("#tabs-login").addClass("active");
        $("#nav-login").addClass("active");
      }
    });
  });

});

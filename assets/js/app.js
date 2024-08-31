(function () {
  "use strict";

  function initialize() {
    const $window = $(window);
    const $document = $(document);
    const $body = $("body");
    const $html = $("html");

    function onWindowLoad() {
      $window.on("scroll", onScroll);
    }

    function onScroll() {
      var btn = $("#backto-top");
      if ($window.scrollTop() > 300) {
        btn.addClass("show");
      } else {
        btn.removeClass("show");
      }
    }

    function backToTop() {
      var btn = $("#backto-top");
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 300);
      });
    }

    function preloader() {
      setTimeout(function () {
        $("#preloader").hide();
      }, 500);
    }

    function hamburgerMenu() {
      if ($(".hamburger-menu").length) {
        $(".hamburger-menu").on("click", function () {
          $(".bar").toggleClass("animate");
          $(".mobile-navar").toggleClass("active");
          return false;
        });
        $(".has-children").on("click", function () {
          $(this).children("ul").slideToggle("slow", "swing");
          $(".icon-arrow").toggleClass("open");
        });
      }
    }

    function countdownInit(countdownSelector, countdownTime) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          if ($(".data-timer1").length) {
            $(this).html(
              e.strftime(
                "<li>%D <small>Días</small></li>\
                <li>%H <small>Hrs</small></li>\
                <li>%M <small>Min</small></li>\
                <li>%S <small>Seg</small></li>"
              )
            );
          }
          if ($(".data-timer2").length) {
            $(this).html(
              e.strftime(
                '<li>%D<span>Días</span></li>\
                <li>%H<span>Hrs</span></li>\
                <li>%M<span>Min</span></li>\
                <li class="m-0">%S<span>Seg</span></li>'
              )
            );
          }
        });
      }
    }

    function initializeSlick() {
      if ($(".card-slider").length) {
        $(".card-slider").slick({
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          autoplay: false,
          autoplaySpeed: 2000,
          responsive: [
            {
              breakpoint: 1399,
              settings: { slidesToShow: 3 },
            },
            {
              breakpoint: 1199,
              settings: { slidesToShow: 2 },
            },
            {
              breakpoint: 575,
              settings: { slidesToShow: 1 },
            },
          ],
        });
      }
    }

    function videoPlay() {
      $("#videoModal").on("hidden.bs.modal", function () {
        $("#videoModal video").get(0).pause();
      });
      $("#closeVideoModalButton").click(function () {
        $("#videoModal").modal("hide");
      });
    }

    function VideoPlayer() {
      if ($("#video").length) {
        var path = $("#video").data("img");
        $("#video").aksVideoPlayer({
          file: [
            { file: "assets/media/videos/video-1080.mp4", label: "1080p" },
            { file: "assets/media/videos/video-720.mp4", label: "720p" },
            { file: "assets/media/videos/video-540.mp4", label: "540p" },
            { file: "assets/media/videos/video-360.mp4", label: "360p" },
            { file: "assets/media/videos/video-240.mp4", label: "240p" },
          ],
          poster: path,
          forward: true,
        });
      }
    }

    function continueEmail() {
      $("#continue-email").on("click", function () {
        $(".hide-link").hide();
        $(".login-sec").show();
      });
    }

    function backToLogin() {
      $("#backtologin").on("click", function () {
        $(".hide-form").hide();
        $(".hide-link").show();
      });
    }

    // Initialize all functions
    onWindowLoad();
    backToTop();
    preloader();
    hamburgerMenu();
    countdownInit(".countdown", "2024/12/30");
    initializeSlick();
    videoPlay();
    VideoPlayer();
    continueEmail();
    backToLogin();
  }

  // Execute the initialization
  initialize();
})();

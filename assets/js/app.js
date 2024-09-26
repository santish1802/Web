$(document).ready(function () {
  function ajustarAlturas() {
    if ($(window).width() <= 992) {
      var maxAlturaNombre = 0;
      var alturaDescripBase = 0;
      var bloques = $(".banner.banner-slider .banner-block");

      // Primera pasada: encontrar la altura máxima de anime-nombre
      bloques.each(function () {
        var alturaNombre = $(this).find(".anime-nombre").outerHeight(true);
        if (alturaNombre > maxAlturaNombre) {
          maxAlturaNombre = alturaNombre;
          // Guardar la altura del anime-descrip correspondiente al anime-nombre más alto
          alturaDescripBase = $(this).find(".anime-descrip").outerHeight(true);
        }
      });

      // Segunda pasada: ajustar alturas
      bloques.each(function () {
        var $this = $(this);
        var $nombre = $this.find(".anime-nombre");
        var $descrip = $this.find(".anime-descrip");

        var alturaNombre = $nombre.outerHeight(true);

        // Solo ajustar si no es el elemento con la altura máxima de anime-nombre
        if (alturaNombre < maxAlturaNombre) {
          var diferenciaNombre = maxAlturaNombre - alturaNombre;
          // Usar calc() con la altura base calculada dinámicamente
          $descrip.css(
            "min-height",
            `calc(${alturaDescripBase}px + ${diferenciaNombre}px)`
          );
        } else {
          // Para el elemento con altura máxima, mantener su altura original
          $descrip.css("min-height", "");
        }
      });
    } else {
      // Restablecer estilos para pantallas más grandes
      $(".banner.banner-slider .banner-block .anime-descrip").css(
        "min-height",
        ""
      );
    }
  }
  function mostrarAnchoPantalla() {
    // Obtiene el ancho de la pantalla
    var anchoPantalla = window.innerWidth;

    // Selecciona el elemento con la clase .size
    var elemento = document.querySelector('.size');

    // Muestra el ancho de la pantalla en el elemento
    if (elemento) {
        elemento.textContent = `Ancho de la pantalla: ${anchoPantalla}px`;
    }}
  function recalcularAltura() {
    if ($(window).width() >= 992) {
      $(".banner.banner-slider .banner-block").each(function () {
        var $this = $(this);
        var alturaTotal = $this.find(".banner-img").outerHeight(true);
        var alturaOcupada = [
          ".anime-nombre",
          ".etiq",
          ".anime-play"
        ].reduce((sum, selector) => sum + $this.find(selector).outerHeight(true), 0);
  
        var alturaDisponible = Math.max(0, alturaTotal - alturaOcupada);
  
        $this.find(".anime-descrip").css("max-height", alturaDisponible + "px");
      });
    } else {
      $(".banner.banner-slider .banner-block .anime-descrip").css("max-height", "");
    }
  }
  ajustarAlturas();
  recalcularAltura();
  mostrarAnchoPantalla();
  // Usar ResizeObserver para manejar cambios de tamaño
  const observer = new ResizeObserver(() => {
    ajustarAlturas();
    recalcularAltura();
    mostrarAnchoPantalla();
  });
  observer.observe(document.body);

  // Opcional: manejar orientación en dispositivos móviles
  $(window).on("orientationchange", function () {
    ajustarAlturas();
    recalcularAltura();
    mostrarAnchoPantalla();
  });
});


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
      }
    }
    $(document).on("click", function (event) {
      if (!$(event.target).closest(".has-children").length) {
        $(".has-children").children("ul").hide();
        $(".icon-arrow").removeClass("open");
      }
    });

    $(".has-children").on("click", function (event) {
      event.stopPropagation();
      $(".has-children").not(this).children("ul").hide();
      $(this).children("ul").slideToggle(400, "swing");
      $(this).find(".icon-arrow").toggleClass("open");
      $(".has-children").not(this).find(".icon-arrow").removeClass("open");
    });
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
    // @c-red ANIME SLIDER
    function initializeSlick() {
      if ($(".card-slider").length) {
        $(".card-slider").slick({
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          autoplay: false,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 992,
              settings: { slidesToShow: 4 },
            },
            {
              breakpoint: 768,
              settings: { slidesToShow: 3 },
            },
            {
              breakpoint: 576,
              settings: { slidesToShow: 2 },
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

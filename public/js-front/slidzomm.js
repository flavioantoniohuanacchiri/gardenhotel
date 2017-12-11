// JavaScript Document
function hansermarConstructor() {
    var self = this;
    /* animacion desplazar */ this.animacionDesplazar = function () {
        $(window).load(function () {
            var animacion = function (a) {
                $(".animacion_contenedor").each(function (i) {
                    if ($(window).scrollTop() + $(window).height() - 235 >= $(".animacion_contenedor").eq(i).position().top + $(".animacion_contenedor").eq(i).height() || $(window).scrollTop() + $(window).height() * 3/4 >= $(".animacion_contenedor").eq(i).position().top) {
                        setTimeout(function () {
                            $(".animacion_contenedor").eq(i).addClass("activa");
                            var esto = $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.inmediata");
                            esto.addClass("activa");
                            esto.find(".animacion_item.nivel2.inmediata").addClass("activa");
                            for (var a = 0; a < 10; a++) {
                                $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.secuencia" + a).each(function (ii) {
                                    var este = $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.secuencia" + a);
                                    setTimeout(function () {
                                        este.eq(ii).addClass("activa");
                                        este.eq(ii).find(".animacion_item.nivel2.inmediata").addClass("activa");
                                        for (var b = 0; b < 10; b++) {
                                            este.eq(ii).find(".animacion_item.nivel2.secuencia" + b).each(function (iii) {
                                                var esta = este.eq(ii).find(".animacion_item.nivel2.secuencia" + b);
                                                setTimeout(function () {
                                                    esta.eq(iii).addClass("activa");
                                                }, iii * 1000 / esta.length);
                                            });
                                        }
                                    }, ii * 1000 / este.length);
                                });
                            }
                            $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.ubicacion").each(function (ii) {
                                if ($(window).scrollTop() + $(window).height() / 2 >= $(".animacion_contenedor").eq(i).position().top + $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.ubicacion").eq(ii).position().top + $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.ubicacion").eq(ii).height()) {
                                    setTimeout(function () {
                                        $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.ubicacion").eq(ii).addClass("activa");
                                        $(".animacion_contenedor").eq(i).find(".animacion_item.nivel1.ubicacion").eq(ii).find(".animacion_item.nivel2.inmediata").addClass("activa");
                                    }, a);
                                }
                            });
                        }, i * a);
                    }
                });
            };
            animacion(200);
            $(window).scroll(function () {
                animacion(0);
            });
            $(window).resize(function () {
                animacion(0);
            });
            $(document).ajaxSuccess(function () {
                animacion(0);
            });
            $(document).ajaxComplete(function () {
                animacion(0);
            });
        });
    };
    /* anchor scroll */ this.anchorScroll = function () {
        $(".anchor").click(function () {
            $("html,body").animate({"scrollTop": $("#anchor").position().top + "px"}, 600);
        });
    };
    /* tab panel */ this.tabPanel = function () {
        $(".tab_panel").each(function (i) {
            $(".tab_panel").eq(i).find(".tab").each(function (ii) {
                $(this).click(function () {
                    $(".tab_panel").eq(i).find(".tab").removeClass("activo");
                    $(".tab_panel").eq(i).find(".tab").eq(ii).addClass("activo");
                    $(".tab_panel").eq(i).find(".panel").removeClass("activo");
                    $(".tab_panel").eq(i).find(".panel").eq(ii).addClass("activo");
                });
            });
        });
    };
    /* campo archivo */ this.campoArchivo = function () {
        $(".form_field input").each(function (i) {
            $(this).change(function () {
                $(".form_field small").eq(i).html("Archivo: " + $(".form_field input").eq(i).val().split("\\").pop());
            });
        });
    };
    /* owlcarousel banner */ this.owlcarouselBanner = function () {
        var bucle = ($("#inicio_banner .owl-carousel .item").length > 1) ? true : false;
        $("#inicio_banner .owl-carousel").owlCarousel({animateIn: "fadeIn", animateOut: "fadeOut", autoplay: true, autoplayHoverPause: true, autoWidth: false, center: true, dots: false, items: 1, loop: bucle, margin: 0, nav: true, navText: [], slideBy: 1, smartSpeed: 500, stagePadding: 0, startPosition: "", URLhashListener: false});
    };
    /* owlcarousel puertos */ this.owlcarouselPuertos = function () {
        var bucle = ($("#puertos_fotos .owl-carousel .item").length > 1) ? true : false;
        var navegador = ($(".agenciamiento .popup .owl-carousel .item").length > 1) ? true : false;
        $(".agenciamiento .popup .owl-carousel").owlCarousel({animateIn: "", animateOut: "", autoplay: true, autoplayHoverPause: true, autoWidth: false, center: true, dots: false, items: 1, loop: bucle, margin: 0, nav: navegador, navText: [], slideBy: 1, smartSpeed: 500, stagePadding: 0, startPosition: "", URLhashListener: false});
    };
    /* owlcarousel galeria max */ this.owlcarouselGaleriaMax = function () {
        var navegador = ($("#galeria_max .owl-carousel .item").length > 1) ? true : false;
        $("#galeria_max .owl-carousel").owlCarousel({animateIn: "", animateOut: "", autoplay: true, autoplayHoverPause: true, autoWidth: false, center: false, dots: false, loop: true, nav: navegador, navText: [], slideBy: 1, smartSpeed: 500, stagePadding: 0, startPosition: 'URLHash', URLhashListener: false, responsive: {0: {items: 1, margin: 10}, 569: {items: 2, margin: 20}, 1025: {items: 3, margin: 30}}});
    };
    /* owlcarousel galeria min */ this.owlcarouselGaleriaMin = function () {
        var bucle = ($("#galeria_min .owl-carousel").eq(0).length > 1) ? true : false;
        var puntos = ($("#galeria_min .owl-carousel .item").length > 1) ? true : false;
        $("#galeria_min .owl-carousel").owlCarousel({animateIn: "", animateOut: "", autoplay: true, autoplayHoverPause: true, autoWidth: false, center: true, dots: puntos, items: 1, loop: bucle, margin: 0, nav: false, navText: [], slideBy: 1, smartSpeed: 500, stagePadding: 0, startPosition: "", URLhashListener: false});
    };
    /* fancybox ajax */ this.fancyboxAjax = function () {
        $(".popup_ajax").fancybox({autoCenter: true, autoResize: true, autoSize: true, closeEffect: "fade", margin: 15, openEffect: "fade", padding: 0, type: "ajax", fitToView: true});
    };
    /* fancybox image */ this.fancyboxImage = function () {
        $(".popup_image").fancybox({autoCenter: true, autoResize: true, autoSize: true, closeEffect: "fade", margin: 30, openEffect: "elastic", padding: 0, type: "image", fitToView: true});
    };
    /* placeholder form */ this.placeholderForm = function () {
        $("input,textarea").placeholder();
    };
    this.init = function () {
        this.animacionDesplazar();
    };
    return this.init();
}
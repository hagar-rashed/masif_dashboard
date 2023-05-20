// Aos
AOS.init();

setTimeout(() => {
    $(".loading").fadeOut(1000);
}, 3000);

window.onload = function () {
    setTimeout(() => {
        $(".header-pages").addClass("active");
    }, 300);
};

$(".click-dropdown-mune").click(function (e1) {
    e1.preventDefault();
    $(".dropdowm-language-mune").slideToggle();
});

//silder-index
if ($("#slider-blog").length) {
    $("#slider-blog").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        rtl: true,
        // autoplay: true,
        dots: false,
        smartSpeed: 2500,
        responsiveClass: true,
        responsive: {
            1400: {
                item: 1,
            },
        },
    });
}

if ($("#slider_him").length) {
    $("#slider_him").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        items: 1,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        rtl: true,
        // autoplay: true,
        dots: true,
        smartSpeed: 2500,
        responsiveClass: true,
        responsive: {
            1400: {
                item: 1,
            },
        },
    });
}

if ($("#slider_1").length) {
    $("#slider_1").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsiveClass: true,
        items: 1,
        dots: true,
        rtl: true,

        // autoplay:true,
        smartSpeed: 2500,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 2,
            },
        },
    });
}

if ($("#slider_2").length) {
    $("#slider_2").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsiveClass: true,
        items: 4,
        dots: false,
        rtl: true,

        // autoplay:true,
        smartSpeed: 2500,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });
}

$(".remove_mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
});

function open() {
    $(".navicon").addClass("is-active");
    $("#menu-div").addClass("active");
    $("#times-ican").addClass("active");
    $(".bg_menu").addClass("active");
}

function close() {
    $(".navicon").removeClass("is-active");
    $("#menu-div").removeClass("active");
    $("#times-ican").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".dropdowm-language").slideUp();
    $(".dropdowm-language-mune").slideUp();

    $(".remove-mune").click(function () {
        $("#menu-div").removeClass("active");
        $(".bg_menu").removeClass("active");
        $(".times-ican").removeClass("active");
    });
}

$("#times-ican").click(function () {
    if ($(this).hasClass("active")) {
        close();
    } else {
        open();
    }
});

$(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
    $(".navicon").removeClass("is-active");
});

$("#menu-div a").click(function () {
    e.preventDefault();
});

var $winl = $(window); // or $box parent container
var $boxl = $("#menu-div, #times-ican , .click-dropdown , .dropdowm-language");
$winl.on("click.Bst", function (event) {
    if (
        $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
        !$boxl.is(event.target) //checks if the $box itself was clicked
    ) {
        close();
    }
});

// scorll Top
$("#scroll").click(function () {
    $("html, body").animate(
        {
            scrollTop: $($(this).attr("href")).offset().top - 100,
        },
        800
    );
    return false;
});

// scroll top bar

$(function () {
    var header = $("header");
    var headers = $(".top-par").offset().top;
    var menu = $(".top-par");
    var hieghtThreshold = $("#app").offset().top;
    var hieghtThreshold_end = $("#app").offset().top + $("#app").height();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll > (headers * 1) / 2) {
            header.removeClass("active");
        } else {
            header.addClass("active");
        }
        if (scroll >= hieghtThreshold && scroll <= hieghtThreshold_end) {
            menu.addClass("active");
        } else {
            menu.removeClass("active");
        }
    });
});

// hover Element links

window.addEventListener("load", function () {
    // btn-13 : Hover Moving Dot
    var movingDot = new MovingDot(".element");
});

function MovingDot() {
    var $navMovingDotBar = document.querySelector(".element ul "),
        $btnMenu13 = $navMovingDotBar.querySelectorAll(".element ul li"),
        bar2 = document.createElement("span"),
        width2,
        left2;

    bar2.classList.add("dot");
    $navMovingDotBar.appendChild(bar2);

    for (var i = 0, max = $btnMenu13.length; i < max; i++) {
        $btnMenu13[i].addEventListener("mouseenter", function () {
            (width2 = this.offsetWidth), (left2 = this.offsetLeft);
            barMovingCurrentMenu2(width2, left2);
        });
    }

    function barMovingCurrentMenu2(width, left) {
        bar2.style.left = left + width / 2 + "px";
        bar2.style.opacity = 1;
    }
}

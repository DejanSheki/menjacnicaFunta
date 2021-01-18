/// sticky nav 

$(document).ready(function() {

    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $('.sticky').addClass('stickyAdd');
            $('.sticky2').addClass('add');
        } else {
            $('.sticky').removeClass('stickyAdd');
            $('.sticky2').removeClass('add');
        }
    });
});
/// hamburger 
$(function() {
    $('.bars').on('click', function() {
        $('.bars').toggleClass('bars-open');
        $('.menu').slideToggle(700);
    });
    $('.menu a').on('click', function() {
        var ww = $(window).width();
        if (ww < 768) {
            $('.menu').slideToggle(700);
            $('.bars-open').toggleClass('bars-open');
        }
    });
});


//slider
var slideIndex = 1;
var myTimer;
var slideshowContainer;

window.addEventListener('load', function() {
    showSlides(slideIndex);
    myTimer = setInterval(function() { plusSlides(1) }, 7000);

    slideshowContainer = document.getElementsByClassName('carousel-item')[0];

});

function plusSlides(n) {
    clearInterval(myTimer);
    if (n < 0) {
        showSlides(slideIndex -= 1);
    } else {
        showSlides(slideIndex += 1);
    }

    if (n === -1) {
        myTimer = setInterval(function() { plusSlides(n + 2) }, 7000);
    } else {
        myTimer = setInterval(function() { plusSlides(n + 1) }, 7000);
    }
}

function currentSlide(n) {
    clearInterval(myTimer);
    myTimer = setInterval(function() { plusSlides(n + 1) }, 7000);
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName('carousel-item');

    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slides[slideIndex - 1].style.display = 'flex';
}

// effects
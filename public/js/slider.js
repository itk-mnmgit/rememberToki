$(document).ready(function(){
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        // arrows: false,
        autoplaySpeed: 3000,
        autoplay: true,
        prevArrow: '<span class="prev-arrow">&lt;</span>',
        nextArrow: '<span class="next-arrow">&gt;</span>',
    });

    $('.slider2').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        autoplaySpeed: 1000,
        autoplay: true
    });
});
require('./bootstrap');

// resources/assets/js/app.js

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

require('/js/owl.carousel.min.js');


$(document).ready(function(){
    $('.home-owl').owlCarousel({
        autoplay:true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            400:{
                items:1,
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:4,
                nav:true
            }
        }
    });
//profile carousal
    $('.profile-toprated-carusal').owlCarousel({
        items:1,
        autoplay:true,
        loop:( $('.profile-salesof-owl .items').length > 4 ),
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
    });

    //profile sales of 
    $('.profile-salesof-owl').owlCarousel({
        items:4,
        autoplay:true,
        loop:( $('.profile-salesof-owl .items').length > 4 ),
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
    });

    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));



});







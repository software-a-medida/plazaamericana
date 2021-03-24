"use strict";

$(document).ready(function ()
{
    var slideshow = $('.slideshow > .owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 1,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        rewind: true,
        loop: true
    });

    $('.slideshow > .prev').on('click', function ()
    {
        slideshow.trigger('prev.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });

    $('.slideshow > .next').on('click', function ()
    {
        slideshow.trigger('next.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });

    $('[data-fancybox]').fancybox({
        padding: 0
    });
});

function map()
{
    var locations = [
        {
            title: 'Company',
            lat: 21.1214886,
            lng: -86.9192734,
            zoom: 12
        }
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: locations[0].zoom,
        center: {
            lat: locations[0].lat,
            lng: locations[0].lng
        }
    });

    var marker = new google.maps.Marker({
        position: {
            lat: locations[0].lat,
            lng: locations[0].lng
        },
        map: map
    });

    var title = new google.maps.InfoWindow({
        content: locations[0].title
    });

    title.open(map, marker);
}

'use strict';

$(document).ready(function()
{
    $('[data-action="play_video"]').on('click', function()
    {
        $('#video').removeClass('pause');
        $('#video').addClass('play');
        $('#video > video').get(0).play();
    });

    $('[data-action="pause_video"]').on('click', function()
    {
        $('#video').removeClass('play');
        $('#video').addClass('pause');
        $('#video > video').get(0).pause();
    });

    var slideshow = $('#slideshow > .owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 3,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        rewind: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
        }
    });

    $('[data-action="prev_slideshow"]').on('click', function()
    {
        slideshow.trigger('prev.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });

    $('[data-action="next_slideshow"]').on('click', function()
    {
        slideshow.trigger('next.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });
});

function map()
{
    var locations = [
        {
            title: 'Plaza Americana',
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

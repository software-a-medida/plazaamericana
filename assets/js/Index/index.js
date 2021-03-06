'use strict';

$(document).ready(function()
{
    $('[data-action="play_video"]').on('click', function()
    {
        $('#video').removeClass('unplay');
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
        autoplay: false,
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
    });

    $('[data-action="next_slideshow"]').on('click', function()
    {
        slideshow.trigger('next.owl.carousel');
    });
});

function map()
{
    var locations = [
        {
            title: 'Plaza Americana',
            lat: 20.9767911,
            lng: -89.6182829,
            zoom: 17
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
        map: map,
        icon: '/assets/images/marker.png'
    });

    // var title = new google.maps.InfoWindow({
    //     content: locations[0].title
    // });
    //
    // title.open(map, marker);
}

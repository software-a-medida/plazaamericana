<?php

defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}owlcarousel/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}fancybox/source/jquery.fancybox.css']);
$this->dependencies->add(['js', '{$path.plugins}fancybox/source/jquery.fancybox.pack.js']);
$this->dependencies->add(['js', '{$path.js}Index/index.js?v=1.0']);
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

?>

<main>
    <section id="video" class="pos-relative pause" style="width:100%;height:100vh;overflow:hidden;">
        <video class="pos-absolute" style="width:auto;min-width:100%;height:auto;min-height:100%;right:0px;bottom:0px;background-size:cover;">
            <source src="{$path.images}video.mp4" type="video/mp4">
        </video>
        <a data-action="play_video" class="pos-absolute d-flex align-items-center justify-content-center text-light" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(0,0,0,0.4);font-size:100px;"><i class="fas fa-play-circle"></i></a>
        <a data-action="pause_video" class="pos-absolute d-flex align-items-center justify-content-center text-light" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(0,0,0,0.4);font-size:100px;"><i class="fas fa-stop-circle"></i></a>
    </section>
    <section id="map" style="height:400px;"></section>
    <section class="p-20 p-md-40">
        <div class="container">
            <h1 class="m-b-20 text-center text-dark">{$lang.h_tt_1}</h1>
            <p class="text-center">{$lang.h_tt_2}</p>
        </div>
    </section>
    <section style="background-color:#eee;">
        <div class="row d-flex align-items-center no-gutters">
            <div class="col-md-6">
                <figure style="height:400px;overflow:hidden;">
                    <img src="{$path.images}h_bg_1.png" class="img-cover">
                </figure>
            </div>
            <div class="col-md-6 p-20 p-md-40 text-center text-md-left">
                <h4 class="m-b-20">{$lang.h_bg_1_t}</h4>
                <p class="m-b-20">{$lang.h_bg_1_d}</p>
                <a href="javascript:void(0);" class="btn btn-b-none p-l-40 p-r-40 text-dark" style="border-radius:40px;background-color:#ffeb3b;">{$lang.go_now}</a>
            </div>
        </div>
        <div class="row d-flex align-items-center no-gutters">
            <div class="col-md-6 p-20 p-md-40 text-center text-md-right order-2 order-md-1">
                <h4 class="m-b-20">{$lang.h_bg_2_t}</h4>
                <p class="m-b-20">{$lang.h_bg_2_d}</p>
                <a href="javascript:void(0);" class="btn btn-b-none p-l-40 p-r-40 text-dark" style="border-radius:40px;background-color:#e1bee7;">{$lang.go_now}</a>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <figure style="height:400px;overflow:hidden;">
                    <img src="{$path.images}h_bg_2.png" class="img-cover">
                </figure>
            </div>
        </div>
        <div class="row d-flex align-items-center no-gutters">
            <div class="col-md-6">
                <figure style="height:400px;overflow:hidden;">
                    <img src="{$path.images}h_bg_3.png" class="img-cover">
                </figure>
            </div>
            <div class="col-md-6 p-20 p-md-40 text-center text-md-left">
                <h4 class="m-b-20">{$lang.h_bg_3_t}</h4>
                <p class="m-b-20">{$lang.h_bg_3_d}</p>
                <a href="javascript:void(0);" class="btn btn-b-none p-l-40 p-r-40 text-dark" style="border-radius:40px;background-color:#ffeb3b;">{$lang.go_now}</a>
            </div>
        </div>
    </section>
    <section class="p-20 p-md-40">
        <div class="container">
            <h2 class="m-b-20 text-center text-dark">{$lang.h_tt_3}</h2>
            <figure class="d-flex justify-content-center">
                <img src="{$path.images}line.png">
            </figure>
        </div>
    </section>
    <section id="slideshow" class="pos-relative">
        <div class="owl-carousel owl-theme">
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_1.png" class="img-cover">
            </figure>
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_2.png" class="img-cover">
            </figure>
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_3.png" class="img-cover">
            </figure>
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_4.png" class="img-cover">
            </figure>
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_5.png" class="img-cover">
            </figure>
            <figure class="item" style="height:400px;">
                <img src="{$path.images}h_gl_6.png" class="img-cover">
            </figure>
        </div>
        <a data-action="prev_slideshow" class="btn btn-dark pos-absolute" style="top:180px;left:20px;z-index:97;"><i class="fas fa-chevron-left"></i></a>
        <a data-action="next_slideshow" class="btn btn-dark pos-absolute" style="top:180px;right:20px;z-index:97;"><i class="fas fa-chevron-right"></i></a>
    </section>
</main>

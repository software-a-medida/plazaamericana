<?php defined('_EXEC') or die; ?>

<main>
    <section class="d-flex align-items-end p-20 p-md-40" style="height:40vh;min-height:360px;background-color:#757575;">
        <div class="container m-b-40">
            <div class="m-b-10 m-l-auto m-r-auto" style="width:60px;height:10px;background-color:#ffeb3b;"></div>
            <h1 class="m-b-10 text-center text-light">{$lang.ab_tt_1}</h1>
            <p class="text-center text-light">{$lang.ab_tt_2}</p>
        </div>
    </section>
    <section class="p-20 p-md-40">
        <div class="container">
            <p class="p-l-0 p-l-md-40 p-r-0 p-r-md-40 text-center">{$lang.ab_tt_3}</p>
        </div>
    </section>
    <section>
        <div class="row d-flex align-items-center no-gutters">
            <div class="col-md-6 pos-relative">
                <figure style="height:400px;overflow:hidden;">
                    <img src="{$path.images}ab_bg_1.png" class="img-cover">
                </figure>
                <div id="mision" class="pos-absolute d-flex align-items-center justify-content-center flex-column p-20 p-md-40" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(0,0,0,0.4);">
                    <div class="m-b-20 m-l-auto m-r-auto" style="width:40px;height:5px;background-color:#fff;"></div>
                    <h4 class="m-b-20 text-light">{$lang.ab_tt_4}</h4>
                    <p class="p-l-0 p-l-md-40 p-r-0 p-r-md-40 text-center text-light">{$lang.ab_tt_5}</p>
                </div>
            </div>
            <div class="col-md-6">
                <figure style="height:400px;overflow:hidden;">
                    <img src="{$path.images}ab_bg_2.png" class="img-cover">
                </figure>
                <div id="vision" class="pos-absolute d-flex align-items-center justify-content-center flex-column p-20 p-md-40" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(0,0,0,0.4);">
                    <div class="m-b-20 m-l-auto m-r-auto" style="width:40px;height:5px;background-color:#fff;"></div>
                    <h4 class="m-b-20 text-light">{$lang.ab_tt_6}</h4>
                    <p class="p-l-0 p-l-md-40 p-r-0 p-r-md-40 text-center text-light">{$lang.ab_tt_7}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="p-20 p-md-40" style="background-color:#eee;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 m-b-20 m-b-md-0">
                    <figure>
                        <img src="{$path.images}ab_bg_3.png" class="img-fluid">
                    </figure>
                </div>
                <div class="col-md-6 text-center text-md-left">
                    <h4 class="m-b-20">{$lang.ab_tt_8}</h4>
                    <p class="m-b-20">{$lang.ab_tt_9}</p>
                    <a href="javascript:void(0);" class="btn btn-b-none p-l-40 p-r-40 text-dark" style="border-radius:40px;background-color:#ffeb3b;">{$lang.go_now}</a>
                </div>
            </div>
        </div>
    </section>
</main>

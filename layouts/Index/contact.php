<?php

defined('_EXEC') or die;

$this->dependencies->add(['js', '{$path.js}Index/contact.js?v=1.0']);
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

?>

<main>
    <section class="d-flex align-items-end p-20 p-md-40" style="height:40vh;min-height:360px;background-color:#03a9f4;">
        <div class="container m-b-40">
            <div class="m-b-10 m-l-auto m-r-auto" style="width:60px;height:10px;background-color:#f44336;"></div>
            <h1 class="m-b-10 text-center text-light">{$lang.ct_tt_1}</h1>
            <p class="text-center text-light">{$lang.ct_tt_2}</p>
        </div>
    </section>
    <section id="map" style="height:400px;"></section>
    <section class="p-20 p-md-40">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 m-b-20 m-b-md-0">
                    <h2>{$lang.ct_tt_3}</h2>
                    <p class="m-b-20">{$lang.ct_tt_4}</p>
                    <form name="contact" class="text-right">
                        <input type="text" name="name" placeholder="{$lang.complete_name}" class="m-b-10 p-10" style="width:100%;height:40px;border:0px;border-radius:5px;background-color:#fafafa;">
                        <input type="email" name="email" placeholder="{$lang.email}" class="m-b-10 p-10" style="width:100%;height:40px;border:0px;border-radius:5px;background-color:#fafafa;">
                        <input type="text" name="phone" placeholder="{$lang.phone}" class="m-b-10 p-10" style="width:100%;height:40px;border:0px;border-radius:5px;background-color:#fafafa;">
                        <textarea name="message" placeholder="{$lang.message}" class="m-b-10 p-10" style="width:100%;height:100px;border:0px;border-radius:5px;background-color:#fafafa;"></textarea>
                        <button type="submit" class="btn btn-b-none" style="background-color:#4caf50;">{$lang.send}</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4 class="m-b-20">{$lang.ct_tt_5}</h4>
                    <a href="tel:<?php echo Configuration::$vars['contact']['phone']; ?>" class="d-flex align-items-center text-dark"><?php echo Configuration::$vars['contact']['phone']; ?></a>
                    <a href="mailto:<?php echo Configuration::$vars['contact']['email']; ?>" class="d-flex align-items-center text-dark"><?php echo Configuration::$vars['contact']['email']; ?></a>
                    <a href="<?php echo Configuration::$vars['map']; ?>" target="_blank" class="d-flex align-items-start m-b-20 text-dark"><?php echo Configuration::$vars['address']; ?></a>
                    <a href="<?php echo Configuration::$vars['rrss']['facebook']; ?>" target="_blank" class="btn btn-dark d-inline-flex align-items-center justify-content-center m-r-5 p-0" style="width:24px;height:24px;font-size:12px;border-radius:50%;"><i class="fab fa-facebook"></i></a>
                    <a href="<?php echo Configuration::$vars['rrss']['instagram']; ?>" target="_blank" class="btn btn-dark d-inline-flex align-items-center justify-content-center p-0" style="width:24px;height:24px;font-size:12px;border-radius:50%;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

defined('_EXEC') or die;

$this->dependencies->add(['js', '{$path.js}Index/contact.js?v=1.0']);
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

?>

<main>
    <form name="contact">
        <input type="text" name="name" placeholder="{$lang.complete_name}">
        <input type="email" name="email" placeholder="{$lang.email}">
        <input type="text" name="phone" placeholder="{$lang.phone}">
        <textarea name="message" placeholder="{$lang.message}"></textarea>
        <button type="submit">{$lang.send}</button>
    </form>
</main>

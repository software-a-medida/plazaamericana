<?php

defined('_EXEC') or die;

$this->dependencies->add(['js', '{$path.js}Index/logout.js?v=1.0']);

?>

<main>
    <section style="height:110px;background-color:#000;"></section>
    <section class="d-flex align-items-center justify-content-center p-40" style="height:calc(100vh - 110px);">
        <div class="p-20 p-md-40 text-center" style="width:100%;max-width:500px;background-color:#eee;">
            <h1 class="m-b-20 text-center">¿{$lang.logout}?</h1>
            <a data-action="logout" class="btn">{$lang.accept}</a>
        </div>
    </section>
</main>

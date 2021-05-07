<?php

defined('_EXEC') or die;

$this->dependencies->add(['js', '{$path.js}Index/login.js?v=1.0']);

?>

<main>
    <section style="height:110px;background-color:#000;"></section>
    <section class="d-flex align-items-center justify-content-center p-40" style="height:calc(100vh - 110px);">
        <form name="login" class="p-20 p-md-40 text-right" style="width:100%;max-width:500px;background-color:#eee;">
            <h1 class="m-b-20 text-center">{$lang.login}</h1>
            <input type="text" name="username" placeholder="{$lang.username}" class="p-l-10 p-r-10 m-b-20" style="width:100%;height:40px;">
            <input type="password" name="password" placeholder="{$lang.password}" class="p-l-10 p-r-10 m-b-20" style="width:100%;height:40px;">
            <button type="submit" class="btn">{$lang.login}</button>
        </form>
    </section>
</main>

<?php defined('_EXEC') or die; ?>

<main>
    <?php if ($global['render'] == 'list') : ?>
        <section class="d-flex align-items-end p-20 p-md-40" style="height:40vh;min-height:360px;background-color:#E91E63;">
            <div class="container m-b-40">
                <div class="m-b-20 m-l-auto m-r-auto" style="width:60px;height:10px;background-color:#4caf50;"></div>
                <h1 class="m-b-10 text-center text-light">{$lang.bs_tt_1}</h1>
                <p class="text-center text-light">{$lang.bs_tt_2}</p>
            </div>
        </section>
        <section>
            <div class="row no-gutters">
                <?php foreach ($global['business'] as $value) : ?>
                    <div class="col-6 col-md-3 pos-relative">
                        <figure style="height:300px;overflow:hidden;">
                            <img src="{$path.uploads}<?php echo $value['background']; ?>" class="img-cover">
                        </figure>
                        <figure class="pos-absolute d-flex align-items-center justify-content-center" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(255,255,255,0.6);">
                            <img src="{$path.uploads}<?php echo $value['logotype']; ?>" style="width:200px;">
                        </figure>
                        <a href="/negocios/<?php echo $value['token']; ?>" class="pos-absolute" style="top:0px;right:0px;bottom:0px;left:0px;"></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php elseif ($global['render'] == 'details') : ?>
        <section class="pos-relative" style="height:40vh;min-height:360px;">
            <figure style="height:100%;">
                <img src="{$path.uploads}<?php echo $global['business']['cover']; ?>" class="img-cover">
            </figure>
            <span class="pos-absolute" style="top:0px;right:0px;bottom:0px;left:0px;background-color:rgba(0,0,0,0.4);"></span>
        </section>
        <section class="p-20 p-md-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-b-20 m-b-md-0">
                        <h6 class="m-b-20">{$lang.local} <?php echo $global['business']['local']; ?></h6>
                        <h2 class="m-b-5"><?php echo $global['business']['name']; ?></h2>
                        <h6 class="m-b-20">{$lang.turn}: <?php echo $global['business']['turn']; ?></h6>
                        <p class="m-b-20 text-justify"><?php echo $global['business']['description'][Session::get_value('lang')]; ?></p>
                        <figure>
                            <img src="{$path.uploads}<?php echo $global['business']['background']; ?>" class="img-cover">
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo !empty($global['business']['email']) ? 'mailto:' . $global['business']['email'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>{$lang.email}</strong> <?php echo !empty($global['business']['email']) ? $global['business']['email'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['phone']) ? 'tel:' . $global['business']['phone'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>{$lang.phone}</strong> <?php echo !empty($global['business']['phone']) ? $global['business']['phone'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['whatsapp']) ? 'https://api.whatsapp.com/send?phone=' . $global['business']['whatsapp'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Whatsapp</strong> <?php echo !empty($global['business']['whatsapp']) ? $global['business']['whatsapp'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['facebook']['url']) ? $global['business']['facebook']['url'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Facebook</strong> <?php echo !empty($global['business']['facebook']['user']) ? '@' . $global['business']['facebook']['user'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['instagram']['url']) ? $global['business']['instagram']['url'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Instagram</strong> <?php echo !empty($global['business']['instagram']['user']) ? '@' . $global['business']['instagram']['user'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['website']) ? 'https://' . $global['business']['website'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column"><strong>{$lang.website}</strong> <?php echo !empty($global['business']['website']) ? $global['business']['website'] : '{$lang.not_available}'; ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

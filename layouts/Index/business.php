<?php

defined('_EXEC') or die;

$this->dependencies->add(['js', '{$path.js}Index/business.js?v=1.0']);

?>

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
                <?php if (Session::exists_var('session') AND Session::get_value('session') == true) : ?>
                    <div class="col-12 p-40">
                        <a data-button-modal="create_business" class="d-flex align-items-center justify-content-center p-40 text-dark" style="height:100%;border:1px dashed #bdbdbd;box-sizing:border-box;"><i class="fas fa-plus m-r-5"></i>{$lang.create_business}</a>
                    </div>
                <?php endif; ?>
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
                        <h6 class="m-b-20">{$lang.local} <?php echo (!empty($global['business']['local']) ? $global['business']['local'] : '{$lang.not_available}'); ?></h6>
                        <h2 class="m-b-5"><?php echo $global['business']['name']; ?></h2>
                        <h6 class="m-b-20">{$lang.turn}: <?php echo (!empty($global['business']['turn'][Session::get_value('lang')]) ? $global['business']['turn'][Session::get_value('lang')] : '{$lang.not_available}'); ?></h6>
                        <p class="m-b-20 text-justify"><?php echo $global['business']['description'][Session::get_value('lang')]; ?></p>
                        <figure>
                            <img src="{$path.uploads}<?php echo $global['business']['background']; ?>" class="img-cover">
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo !empty($global['business']['email']) ? 'mailto:' . $global['business']['email'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>{$lang.email}</strong> <?php echo !empty($global['business']['email']) ? $global['business']['email'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['phone']) ? 'tel:' . $global['business']['phone'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>{$lang.phone}</strong> <?php echo !empty($global['business']['phone']) ? $global['business']['phone'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['whatsapp']) ? 'https://api.whatsapp.com/send?phone=' . $global['business']['whatsapp'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Whatsapp</strong> <?php echo !empty($global['business']['whatsapp']) ? $global['business']['whatsapp'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['facebook']) ? 'https://facebook.com/' . $global['business']['facebook'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Facebook</strong> <?php echo !empty($global['business']['facebook']) ? '@' . $global['business']['facebook'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['instagram']) ? 'https://instagram.com/' . $global['business']['instagram'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column m-b-20"><strong>Instagram</strong> <?php echo !empty($global['business']['instagram']) ? '@' . $global['business']['instagram'] : '{$lang.not_available}'; ?></a>
                        <a href="<?php echo !empty($global['business']['website']) ? 'https://' . $global['business']['website'] : ''; ?>" target="_blank" class="btn btn-light bx-shadow d-flex align-items-start justify-content-center flex-column"><strong>{$lang.website}</strong> <?php echo !empty($global['business']['website']) ? $global['business']['website'] : '{$lang.not_available}'; ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php if (Session::exists_var('session') AND Session::get_value('session') == true) : ?>
    <section class="modal" data-modal="create_business">
        <div class="content">
            <main>
                <form name="create_business">
                    <div class="row">
                        <div class="col-12 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>{$lang.name}</p>
                            <input type="text" name="name" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>(ES) {$lang.description}</p>
                            <textarea name="description_es" class="p-10" style="width:100%;height:100px;"></textarea>
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>(EN) {$lang.description}</p>
                            <textarea name="description_en" class="p-10" style="width:100%;height:100px;"></textarea>
                        </div>
                        <div class="col-md-4 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>(ES) {$lang.turn}</p>
                            <input type="text" name="turn_es" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-4 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>(EN) {$lang.turn}</p>
                            <input type="text" name="turn_en" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-4 m-b-20">
                            <p class="m-b-5"><small class="m-r-5" style="color:#f44336;">*</small>{$lang.local}</p>
                            <input type="text" name="local" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">{$lang.email}</p>
                            <input type="email" name="email" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">{$lang.phone}</p>
                            <input type="text" name="phone" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">Whatsapp</p>
                            <input type="text" name="whatsapp" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">Facebook</p>
                            <input type="text" name="facebook" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">Instagram</p>
                            <input type="text" name="instagram" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <p class="m-b-5">{$lang.website}</p>
                            <input type="text" name="website" class="p-l-10 p-r-10" style="width:100%;height:40px;">
                        </div>
                        <div class="col-12 m-b-20">
                            <p class="m-b-5">{$lang.logotype}</p>
                            <figure class="d-none">
                                <img src="" alt="Logotype">
                            </figure>
                            <input type="file" name="logotype" style="width:100%;height:40px;">
                        </div>
                        <div class="col-12 m-b-20">
                            <p class="m-b-5">{$lang.background}</p>
                            <figure class="d-none">
                                <img src="" alt="Background">
                            </figure>
                            <input type="file" name="background" style="width:100%;height:40px;">
                        </div>
                        <div class="col-12 m-b-20">
                            <p class="m-b-5">{$lang.cover}</p>
                            <figure class="d-none">
                                <img src="" alt="Cover">
                            </figure>
                            <input type="file" name="cover" style="width:100%;height:40px;">
                        </div>
                        <div class="col-md-12 text-right">
                            <a button-close class="text-dark">{$lang.cancel}</a>
                            <button type="submit" class="btn m-l-20 btn-dark">{$lang.submit}</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </section>
<?php endif; ?>

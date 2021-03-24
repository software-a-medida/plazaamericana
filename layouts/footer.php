<?php defined('_EXEC') or die; ?>

        <footer class="p-20 p-md-40" style="background-color:#000;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 m-b-40 m-b-md-0">
                        <figure>
                            <img class="img-fluid" src="{$path.images}logotype.png">
                        </figure>
                    </div>
                    <div class="col-md-3 m-b-40 m-b-md-0">
                        <h4 class="m-b-20 text-light">{$lang.contact_us}</h4>
                        <nav>
            				<ul class="list-unstyled">
            					<li class="m-b-10"><a href="tel:<?php echo Configuration::$vars['phone']; ?>" class="d-flex align-items-center text-light"><i class="fas fa-phone-alt m-r-10" style="width:13px;"></i><?php echo Configuration::$vars['phone']; ?></a></li>
            					<li class="m-b-10"><a href="mailto:<?php echo Configuration::$vars['email']; ?>" class="d-flex align-items-center text-light"><i class="fas fa-envelope m-r-10" style="width:13px;"></i><?php echo Configuration::$vars['email']; ?></a></li>
            					<li><a href="<?php echo Configuration::$vars['map']; ?>" target="_blank" class="d-flex align-items-start text-light"><i class="fas fa-map-marker-alt m-t-5 m-r-10" style="width:13px;"></i><?php echo Configuration::$vars['address']; ?></a></li>
            				</ul>
            			</nav>
                    </div>
                    <div class="col-md-3 m-b-40 m-b-md-0">
                        <h4 class="m-b-20 text-light">{$lang.website}</h4>
                        <nav>
            				<ul class="list-unstyled">
            					<li class="m-b-10"><a href="/" class="text-uppercase text-light">{$lang.home}</a></li>
            					<li class="m-b-10"><a href="/nosotros" class="text-uppercase text-light">{$lang.about}</a></li>
            					<li class="m-b-10"><a href="/merida" class="text-uppercase text-light">{$lang.merida}</a></li>
            					<li class="m-b-10"><a href="/negocios" class="text-uppercase text-light">{$lang.business}</a></li>
            					<li class="m-b-10"><a href="/contacto" class="text-uppercase text-light">{$lang.contact}</a></li>
            					<li><a href="/privacy" class="text-uppercase text-light">{$lang.privacy}</a></li>
            				</ul>
            			</nav>
                    </div>
                    <div class="col-md-3">
                        <h4 class="m-b-20 text-left text-md-right text-light">{$lang.follow_us}</h4>
                        <nav>
                            <ul class="d-flex justify-content-start justify-content-md-end list-unstyled">
                                <li><a href="<?php echo Configuration::$vars['facebook']; ?>" target="_blank" class="btn btn-light d-flex align-items-center justify-content-center m-r-10 p-0" style="width:40px;height:40px;font-size:18px;border-radius:50%;"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="<?php echo Configuration::$vars['instagram']; ?>" target="_blank" class="btn btn-light d-flex align-items-center justify-content-center p-0" style="width:40px;height:40px;font-size:18px;border-radius:50%;"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-12 m-t-40">
                        <p class="text-center text-light">Copyright © 2021 <strong><?php echo Configuration::$web_page; ?></strong> <i class="fas fa-heart" style="color:#f44336;"></i> {$lang.website} {$lang.design_by} <a href="mailto:gmafud@temasoluciona.mx" class="text-light"><strong>Tema Soluciona</strong></a> & {$lang.development_by} <a href="https://codemonkey.com.mx" target="_blank" class="text-light"><strong>Code Monkey</strong></a></p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{$path.js}jquery-3.4.1.min.js"></script>
        <script src="https://cdn.codemonkey.com.mx/js/valkyrie.js"></script>
        <script src="https://cdn.codemonkey.com.mx/js/codemonkey.js"></script>
        <script src="{$path.js}scripts.js?v=1.0"></script>
        <script defer src="https://kit.fontawesome.com/743152b0c5.js"></script>
        {$dependencies.js}
        {$dependencies.other}
    </body>
</html>

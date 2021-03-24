<?php defined('_EXEC') or die; ?>

        <footer>
            <nav>
                <ul>
                    <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
            <p>Copyright © 2021 <strong><?php echo Configuration::$web_page; ?></strong> <i class="fas fa-heart" style="color:#f44336;"></i> {$lang.website} {$lang.design_by} <a href="mailto:gmafud@temasoluciona.mx" class="text-dark"><strong>Tema Soluciona</strong></a> & {$lang.development_by} <a href="https://codemonkey.com.mx" class="text-dark" target="_blank"><strong>Code Monkey</strong></a></p>
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

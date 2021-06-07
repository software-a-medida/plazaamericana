<?php defined('_EXEC') or die; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$vkye_lang}">
	<head>
		<meta charset="UTF-8" />
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		{$dependencies.meta}
		<base href="{$vkye_base}">
		<title>{$vkye_title}</title>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<meta name="author" content="codemonkey.com.mx" />
		<meta name="description" content="" />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="https://cdn.codemonkey.com.mx/css/valkyrie.css" type="text/css" media="all" />
		<link rel="stylesheet" href="{$path.css}styles.css?v=1.0" type="text/css" media="all" />
		{$dependencies.css}
	</head>
	<body>
		<header id="desktop_menu" class="pos-fixed p-t-10 p-b-10 p-l-10 p-l-md-0 p-r-10 p-r-md-0" style="width:100%;transition:400ms;z-index:98;">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-4 col-md-2">
						<figure>
							<img class="img-fluid" style="height:80px;transition:400ms;" src="{$path.images}logotype.png">
						</figure>
					</div>
					<div data-desktop class="col-10">
						<nav>
							<ul class="d-flex align-items-center justify-content-end list-unstyled">
								<li><a href="/" class="text-uppercase text-light">{$lang.home}</a></li>
								<li class="m-l-40"><a href="/acerca-de-nosotros" class="text-uppercase text-light">{$lang.about_us}</a></li>
								<li class="m-l-40"><a href="/negocios" class="text-uppercase text-light">{$lang.business}</a></li>
								<li class="m-l-40"><a href="/contactanos" class="text-uppercase text-light">{$lang.contact_us}</a></li>
								<li class="m-l-40"><a href="?lang=es" class="text-uppercase text-light"><strong>ES</strong></a></li>
								<li class="m-l-20"><a href="?lang=en" class="text-uppercase text-light"><strong>EN</strong></a></li>
								<?php if (Session::exists_var('session') AND Session::get_value('session') == true) : ?>
									<li class="m-l-40"><a href="/cerrar-sesion" class="text-uppercase text-light">{$lang.logout}</a></li>
				                <?php endif; ?>
							</ul>
						</nav>
					</div>
					<div data-mobile-flex class="col-8 d-flex align-items-center justify-content-end">
						<a data-action="open_mobile_menu" class="btn btn-light"><i class="fas fa-bars"></i></a>
					</div>
				</div>
			</div>
		</header>
		<header id="mobile_menu" data-mobile-flex class="pos-fixed d-flex align-items-center justify-content-center p-20" style="width:300px;height:100vh;right:-300px;background-color:#000;transition:400ms;z-index:99;">
			<a data-action="close_mobile_menu" class="btn btn-light pos-absolute" style="top:20px;right:20px;"><i class="fas fa-times"></i></a>
			<nav>
				<ul class="d-flex align-items-center flex-column list-unstyled">
					<li class="m-b-20"><a href="/" class="text-uppercase text-light">{$lang.home}</a></li>
					<li class="m-b-20"><a href="/acerca-de-nosotros" class="text-uppercase text-light">{$lang.about_us}</a></li>
					<li class="m-b-20"><a href="/negocios" class="text-uppercase text-light">{$lang.business}</a></li>
					<li class="m-b-20"><a href="/contactanos" class="text-uppercase text-light">{$lang.contact_us}</a></li>
					<li><a href="?lang=es" class="m-r-20 text-uppercase text-light"><strong>ES</strong></a><a href="?lang=en" class="text-uppercase text-light"><strong>EN</strong></a></li>
				</ul>
			</nav>
		</header>

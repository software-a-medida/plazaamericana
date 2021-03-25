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
		<header id="desktop_menu" class="p-t-10 p-t-md-20 p-b-10 p-b-md-20 p-l-10 p-l-md-0 p-r-10 p-r-md-0" style="width:100%;position:fixed;background-color:#000;transition:400ms;z-index:98;">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-4 col-md-2">
						<figure>
							<img class="img-fluid" src="{$path.images}logotype.png">
						</figure>
					</div>
					<div data-desktop class="col-10">
						<nav>
							<ul class="d-flex align-items-center justify-content-end list-unstyled">
								<li><a href="/" class="text-uppercase text-light" style="font-size:18px;">{$lang.home}</a></li>
								<li class="m-l-40"><a href="/nosotros" class="text-uppercase text-light" style="font-size:18px;">{$lang.about}</a></li>
								<li class="m-l-40"><a href="/merida" class="text-uppercase text-light" style="font-size:18px;">{$lang.merida}</a></li>
								<li class="m-l-40"><a href="/negocios" class="text-uppercase text-light" style="font-size:18px;">{$lang.business}</a></li>
								<li class="m-l-40"><a href="/contacto" class="text-uppercase text-light" style="font-size:18px;">{$lang.contact}</a></li>
								<li class="m-l-40"><a href="?lang=es" class="text-uppercase text-light" style="font-size:18px;"><strong>ES</strong></a></li>
								<li class="m-l-20"><a href="?lang=en" class="text-uppercase text-light" style="font-size:18px;"><strong>EN</strong></a></li>
							</ul>
						</nav>
					</div>
					<div data-mobile-flex class="col-8 d-flex align-items-center justify-content-end">
						<a data-action="open_mobile_menu" class="btn btn-light" style="font-size:18px;"><i class="fas fa-bars"></i></a>
					</div>
				</div>
			</div>
		</header>
		<header id="mobile_menu" data-mobile-flex class="pos-fixed d-flex align-items-center justify-content-center p-20" style="width:300px;height:100vh;right:-300px;background-color:#000;transition:400ms;z-index:99;">
			<a data-action="close_mobile_menu" class="btn btn-light pos-absolute" style="top:20px;left:20px;font-size:18px;"><i class="fas fa-times"></i></a>
			<nav>
				<ul class="d-flex align-items-center flex-column list-unstyled">
					<li class="m-b-20"><a href="/" class="text-uppercase text-light" style="font-size:18px;">{$lang.home}</a></li>
					<li class="m-b-20"><a href="/nosotros" class="text-uppercase text-light" style="font-size:18px;">{$lang.about}</a></li>
					<li class="m-b-20"><a href="/merida" class="text-uppercase text-light" style="font-size:18px;">{$lang.merida}</a></li>
					<li class="m-b-20"><a href="/negocios" class="text-uppercase text-light" style="font-size:18px;">{$lang.business}</a></li>
					<li class="m-b-20"><a href="/contacto" class="text-uppercase text-light" style="font-size:18px;">{$lang.contact}</a></li>
					<li><a href="?lang=es" class="m-r-20 text-uppercase text-light" style="font-size:18px;"><strong>ES</strong></a><a href="?lang=en" class="text-uppercase text-light" style="font-size:18px;"><strong>EN</strong></a></li>
				</ul>
			</nav>
		</header>

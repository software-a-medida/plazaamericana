<?php

defined('_EXEC') or die;

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		define('_title', Configuration::$web_page . ' | {$lang.index}');

		$template = $this->view->render($this, 'index');

		echo $template;
	}

	public function about()
	{
		define('_title', Configuration::$web_page . ' | {$lang.about}');

		$template = $this->view->render($this, 'about');

		echo $template;
	}

	public function merida()
	{
		define('_title', Configuration::$web_page . ' | {$lang.merida}');

		$template = $this->view->render($this, 'merida');

		echo $template;
	}

	public function business()
	{
		define('_title', Configuration::$web_page . ' | {$lang.business}');

		$template = $this->view->render($this, 'business');

		echo $template;
	}

	public function contact()
	{
		if (Format::exist_ajax_request() == true)
		{
			if ($_POST['action'] == 'contact')
			{
				$errors = [];

				if (empty($_POST['name']))
					array_push($errors, ['{$lang.name}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['email']))
					array_push($errors, ['{$lang.email}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['phone']))
					array_push($errors, ['{$lang.phone}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['message']))
					array_push($errors, ['{$lang.message}: {$lang.dont_leave_this_field_empty}']);

				if (empty($errors))
				{
					$mail = new Mailer(true);

					try
					{
						$mail->setFrom(Configuration::$smtp_emailer, Configuration::$web_page);
						$mail->addAddress(Configuration::$contact_email, Configuration::$web_page);
						$mail->Subject = 'Nuevo contacto';
						$mail->Body = 'Nombre: ' . $_POST['name'] . '<br>Correo electrónico: ' . $_POST['email'] . '<br>Teléfono: ' . $_POST['phone'] . '<br>Mensaje: ' . $_POST['message'];
						$mail->send();
					}
					catch (Exception $e) {}

					echo json_encode([
						'status' => 'success',
						'message' => '{$lang.thanks_for_contact_us}'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}
		}
		else
		{
			define('_title', Configuration::$web_page . ' | {$lang.contact}');

			$template = $this->view->render($this, 'contact');

			echo $template;
		}
	}
}

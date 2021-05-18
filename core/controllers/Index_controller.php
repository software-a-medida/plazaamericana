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
		define('_title', Configuration::$web_page . ' | {$lang.home}');

		$template = $this->view->render($this, 'index');

		echo $template;
	}

	public function about_us()
	{
		define('_title', Configuration::$web_page . ' | {$lang.about_us}');

		$template = $this->view->render($this, 'about_us');

		echo $template;
	}

	public function business($params)
	{
		if (Format::exist_ajax_request() == true)
		{
			if ($_POST['action'] == 'create_business' OR $_POST['action'] == 'update_business')
			{
				$errors = [];

				if (empty($_POST['name']))
					array_push($errors, ['{$lang.name}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['description_es']))
					array_push($errors, ['(ES) {$lang.description}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['description_en']))
					array_push($errors, ['(EN) {$lang.description}: {$lang.dont_leave_this_field_empty}']);

				if ($_POST['action'] == 'create_business' AND empty($_FILES['logotype']['name']))
					array_push($errors, ['{$lang.logotype}: {$lang.dont_leave_this_field_empty}']);

				if ($_POST['action'] == 'create_business' AND empty($_FILES['background']['name']))
					array_push($errors, ['{$lang.background}: {$lang.dont_leave_this_field_empty}']);

				if ($_POST['action'] == 'create_business' AND empty($_FILES['cover']['name']))
					array_push($errors, ['{$lang.cover}: {$lang.dont_leave_this_field_empty}']);

				if (empty($errors))
				{
					if ($_POST['action'] == 'create_business')
						$query = $this->model->create_business($_POST, $_FILES);
					else if ($_POST['action'] == 'update_business')
						$query = $this->model->update_business($_POST, $_FILES);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => '{$lang.operation_success}'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => '{$lang.operation_error}'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}

			if ($_POST['action'] == 'read_business')
			{
				$query = $this->model->read_business($_POST['token']);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'data' => $query
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => '{$lang.operation_error}'
					]);
				}
			}

			if ($_POST['action'] == 'delete_business')
			{
				$query = $this->model->delete_business($_POST['token']);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'message' => '{$lang.operation_success}'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => '{$lang.operation_error}'
					]);
				}
			}
		}
		else
		{
			define('_title', Configuration::$web_page . ' | {$lang.business}');

			global $global;

			$global['render'] = !empty($params) ? 'details' : 'list';

			if ($global['render'] == 'list')
				$global['business'] = $this->model->read_business();
			else if ($global['render'] == 'details')
				$global['business'] = $this->model->read_business($params[0]);

			$template = $this->view->render($this, 'business');

			echo $template;
		}
	}

	public function contact_us()
	{
		if (Format::exist_ajax_request() == true)
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
					$mail->addAddress(Configuration::$vars['contact']['email'], Configuration::$web_page);
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
		else
		{
			define('_title', Configuration::$web_page . ' | {$lang.contact_us}');

			$template = $this->view->render($this, 'contact_us');

			echo $template;
		}
	}

	public function login()
	{
		if (Session::exists_var('session') AND Session::get_value('session') == true)
			header('Location: /cerrar-sesion');
		else
		{
			if (Format::exist_ajax_request() == true)
			{
				$errors = [];

				if (empty($_POST['username']))
					array_push($errors, ['{$lang.username}: {$lang.dont_leave_this_field_empty}']);

				if (empty($_POST['password']))
					array_push($errors, ['{$lang.password}: {$lang.dont_leave_this_field_empty}']);

				if (empty($errors))
				{
					if ($_POST['username'] == 'admin' AND $_POST['password'] == 'admin')
					{
						Session::set_value('session', true);

						echo json_encode([
							'status' => 'success',
							'path' => '/negocios'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => '{$lang.wrong_login}'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}
			else
			{
				define('_title', Configuration::$web_page . ' | {$lang.login}');

				$template = $this->view->render($this, 'login');

				echo $template;
			}
		}
	}

	public function logout()
	{
		if (Session::exists_var('session') AND Session::get_value('session') == true)
		{
			if (Format::exist_ajax_request() == true)
			{
				Session::unset_value('session');

				echo json_encode([
					'status' => 'success',
					'path' => '/'
				]);
			}
			else
			{
				define('_title', Configuration::$web_page . ' | {$lang.logout}');

				$template = $this->view->render($this, 'logout');

				echo $template;
			}
		}
		else
			header('Location: /iniciar-sesion');
	}

	public function privacy_notice()
	{
		define('_title', Configuration::$web_page . ' | {$lang.privacy_notice}');

		$template = $this->view->render($this, 'privacy_notice');

		echo $template;
	}
}

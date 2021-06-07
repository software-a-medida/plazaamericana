<?php

defined('_EXEC') or die;

class Index_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create_business($post, $files)
	{
		$security = new Security;

		$query = $this->database->insert('business', [
			'token' => $security->random_string(8),
			'name' => $post['name'],
			'description' => json_encode([
				'es' => $post['description_es'],
				'en' => $post['description_en']
			]),
			'turn' => json_encode([
				'es' => !empty($post['turn_es']) ? $post['turn_es'] : '',
				'en' => !empty($post['turn_en']) ? $post['turn_en'] : ''
			]),
			'local' => !empty($post['local']) ? $post['local'] : null,
			'email' => !empty($post['email']) ? $post['email'] : null,
			'phone' => !empty($post['phone']) ? $post['phone'] : null,
			'whatsapp' => !empty($post['whatsapp']) ? $post['whatsapp'] : null,
			'facebook' => !empty($post['facebook']) ? $post['facebook'] : null,
			'instagram' => !empty($post['instagram']) ? $post['instagram'] : null,
			'website' => !empty($post['website']) ? $post['website'] : null,
			'background' => Upload::upload_file($files['background'])['file'],
			'cover' => Upload::upload_file($files['cover'])['file'],
			'logotype' => Upload::upload_file($files['logotype'])['file']
		]);

		return $query;
	}

	public function read_business($token = null)
	{
		if (!empty($token))
		{
			$query = Functions::decode_json_to_array($this->database->select('business', '*', [
				'token' => $token
			]));
		}
		else
		{
			$query = Functions::decode_json_to_array($this->database->select('business', '*', [
				'ORDER' => [
					'id' => 'DESC'
				]
			]));
		}

		return !empty($token) ? (!empty($query) ? $query[0] : null) : $query;
	}

	public function update_business($post, $files)
	{
		$query = null;

		$edited = $this->database->select('business', [
			'background',
			'cover',
			'logotype'
		], [
			'token' => $post['token']
		]);

		if (!empty($edited))
		{
			$query = $this->database->update('business', [
				'name' => $post['name'],
				'description' => json_encode([
					'es' => $post['description_es'],
					'en' => $post['description_en']
				]),
				'turn' => json_encode([
					'es' => !empty($post['turn_es']) ? $post['turn_es'] : '',
					'en' => !empty($post['turn_en']) ? $post['turn_en'] : ''
				]),
				'local' => !empty($post['local']) ? $post['local'] : null,
				'email' => !empty($post['email']) ? $post['email'] : null,
				'phone' => !empty($post['phone']) ? $post['phone'] : null,
				'whatsapp' => !empty($post['whatsapp']) ? $post['whatsapp'] : null,
				'facebook' => !empty($post['facebook']) ? $post['facebook'] : null,
				'instagram' => !empty($post['instagram']) ? $post['instagram'] : null,
				'website' => !empty($post['website']) ? $post['website'] : null,
				'background' => !empty($files['background']['name']) ? Upload::upload_file($files['background'])['file'] : $edited[0]['background'],
				'cover' => !empty($files['cover']['name']) ? Upload::upload_file($files['cover'])['file'] : $edited[0]['cover'],
				'logotype' => !empty($files['logotype']['name']) ? Upload::upload_file($files['logotype'])['file'] : $edited[0]['logotype']
			], [
				'token' => $post['token']
			]);

			if (!empty($query))
			{
				if (!empty($files['background']['name']))
					unlink(PATH_UPLOADS . $edited[0]['background']);

				if (!empty($files['cover']['name']))
					unlink(PATH_UPLOADS . $edited[0]['cover']);

				if (!empty($files['logotype']['name']))
					unlink(PATH_UPLOADS . $edited[0]['logotype']);
			}
		}

		return $query;
	}

	public function delete_business($token)
	{
		$query = null;

		$deleted = $this->database->select('business', [
			'background',
			'cover',
			'logotype'
		], [
			'token' => $token
		]);

		if (!empty($deleted))
		{
			$query = $this->database->delete('business', [
				'token' => $token
			]);

			if (!empty($query))
			{
				unlink(PATH_UPLOADS . $deleted[0]['background']);
				unlink(PATH_UPLOADS . $deleted[0]['cover']);
				unlink(PATH_UPLOADS . $deleted[0]['logotype']);
			}
		}

		return $query;
	}
}

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
		$query = $this->database->create('business', [
			'token' => Functions::generate_token(),
			'name' => $post['name']
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
			'background' => Functions::fileloader($files['background'], 'up'),
			'cover' => Functions::fileloader($files['cover'], 'up'),
			'logotype' => Functions::fileloader($files['logotype'], 'up')
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
			$query = Functions::decode_json_to_array($this->database->select('business', '*'));

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
				'name' => $post['name']
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
				'background' => !empty($files['background']['name']) ? Functions::fileloader($files['background'], 'up') : $edited[0]['background'],
				'cover' => !empty($files['cover']['name']) ? Functions::fileloader($files['cover'], 'up') : $edited[0]['cover'],
				'logotype' => !empty($files['logotype']['name']) ? Functions::fileloader($files['logotype'], 'up') : $edited[0]['logotype']
			], [
				'token' => $post['token']
			]);

			if (!empty($query))
			{
				if (!empty($files['background']['name']))
					Functions::fileloader($edited[0]['background'], 'down');

				if (!empty($files['cover']['name']))
					Functions::fileloader($edited[0]['cover'], 'down');

				if (!empty($files['logotype']['name']))
					Functions::fileloader($edited[0]['logotype'], 'down');
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
				Functions::fileloader($deleted[0]['background'], 'down');
				Functions::fileloader($deleted[0]['cover'], 'down');
				Functions::fileloader($deleted[0]['logotype'], 'down');
			}
		}

		return $query;
	}
}

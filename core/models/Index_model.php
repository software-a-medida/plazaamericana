<?php

defined('_EXEC') or die;

class Index_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function read_business($token = null)
	{
		if (!empty($token))
			$query = Functions::decode_json_to_array($this->database->select('business', '*', ['token' => $token]));
		else
			$query = Functions::decode_json_to_array($this->database->select('business', '*'));

		return !empty($token) ? (!empty($query) ? $query[0] : null) : $query;
	}
}

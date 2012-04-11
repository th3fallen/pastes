<?php

class Paste extends Eloquent {

	public static $table = 'pastes';
	public static $timestamps = true;

	/**
	 * Validate a new paste.
	 *
	 * @param  array  $input
	 * @return array
	 */
	public static function validate($input)
	{
		$validator = Validator::make($input, array('paste' => 'required'));

		$validator->valid();

		return $validator->errors->all();
	}

}

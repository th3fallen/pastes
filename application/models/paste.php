<?php

class Paste extends Eloquent {

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
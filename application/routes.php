<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Display the "new paste" view...
	|--------------------------------------------------------------------------
	*/

	'GET /' => array('name' => 'new', 'do' => function()
	{
		return View::of_layout()->bind('content', View::of_home());
	}),

	/*
	|--------------------------------------------------------------------------
	| Create a new paste...
	|--------------------------------------------------------------------------
	*/

	'POST /' => function()
	{
		$errors = Paste::validate(Input::get());

		if (count($errors) > 0)
		{
			return Redirect::to_new()->with('errors', $errors);
		}

		$paste = new Paste(array('paste' => Input::get('paste')));

		$paste->save();

		return Redirect::to_paste(array(Math::to_base($paste->id)));
	},

	/*
	|--------------------------------------------------------------------------
	| View a raw paste...
	|--------------------------------------------------------------------------
	*/

	'GET /(:any)/raw' => array('name' => 'raw', 'do' => function($id)
	{
		if ( ! is_null($paste = Paste::find($id = Math::to_base_10($id))))
		{
			return Response::make($paste->paste)->header('Content-Type', 'text/plain');
		}
		
		return Response::make(View::make('error/404'), 404);
	}),

	/*
	|--------------------------------------------------------------------------
	| View an existing paste...
	|--------------------------------------------------------------------------
	*/

	'GET /(:any)' => array('name' => 'paste', 'do' => function($id)
	{
		$paste = Paste::find(Math::to_base_10($id));

		if (is_null($paste))
		{
			return Response::make(View::make('error/404'), 404);
		}

		return View::of_layout()->bind('content', View::of_paste()->bind('paste', htmlentities($paste->paste)))
							    ->bind('id', $id);
	}),

);
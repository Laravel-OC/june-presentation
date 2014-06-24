<?php

class DevelopersController extends \BaseController {

	/**
	 * Display a listing of the developers
	 * GET /developers
	 *
	 * @return Response
	 */
	public function index()
	{
		$developers = Developer::all();
		return View::make('developers.index', compact('developers'));
	}

	/**
	 * Show the form for creating a new developer.
	 * GET /developers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('developers.create');
	}

	/**
	 * Store a newly created developer in storage
	 * POST /developers
	 *
	 * @return Response
	 */
	public function store()
	{
		$developer = new Developer;
		$developer->first_name = Input::only("first_name");
		$developer->last_name = Input::only("last_name");
		$developer->save();

		// Developer::create([
		// 	"first_name" => Input::only("first_name"),
		// 	"last_name" => Input::only("first_name"),
		// ]);

		return Redirect::route('developers.index');
	}

	/**
	 * Display the specified developer.
	 * GET /developers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$developer = Developer::findOrFail($id);
		return View::make('developers.show', compact('developer');
	}

	/**
	 * Show the form for editing the developer resource.
	 * GET /developers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$developer = Developer::findOrFail($id);
		return View::make('developers.edit', compact('developer');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /developers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$developer = Developer::findOrFail($id);
		$developer->fill(Input::all());
		$developer->save();

		return Redirect::route('developers.show', ['id' => $id]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /developers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$developer = Developer::findOrFail($id);
		$developer->delete();

		return Redirect::route('developers.index');
	}

}

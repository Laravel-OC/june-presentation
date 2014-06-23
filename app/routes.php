<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get("/", "LaravelOC\SlideController@showSlides");

// In addition to the already available syntatic sugar, the advantage to the Database Query Builder
// is that it returns an array collection of objects. Objects that are readily available to use in your
// application. It persisted the database through a gateway and rendered the object from a factory.
Route::get("/dump", function() {
	$pile = DB::table('developers')
		->select('developers.first_name', 'developers.last_name', 'projects.project_name', 'projects.due_date')
		->join('projects', 'developers.id', '=', 'projects.developer_id')
		->where('projects.due_date', '<', '2015-01-01 00:00:00')
		->orderBy('projects.due_date', 'ASC')
		->get();
	dd($pile);
});

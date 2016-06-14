<?php

/*
 * Organisers
 */
Route::group([
	'middleware' => ['web', 'auth'],
	'prefix' => 'module/{event_id}/volunteers',
	'namespace' => 'Modules\Volunteers\Http\Controllers\Organiser'], function()
{
	Route::get('/', 'VolunteersController@index');
});

/*
 * Attendees
 */
<?php

/*
 * ---------
 * Organisers
 * ---------
 */

Route::group([
    'middleware' => ['web', 'auth'],
    'prefix'     => 'module/{event_id}/volunteers',
    'namespace'  => 'Modules\Volunteers\Http\Controllers\Organiser'
], function () {
    Route::get('/', 'VolunteersController@index');
});


/*
 * ---------
 * Attendees
 * ---------
 */

Route::group([
    'middleware' => ['web'],
    'prefix'     => 'm/{event_id}/volunteers',
    'namespace'  => 'Modules\Volunteers\Http\Controllers\Attendee'
], function () {
    Route::get('/', 'VolunteersController@index');

    /* Register Form */
    Route::post('register', 'VolunteersController@register');
    Route::post('login', 'VolunteersController@login');

});

/*
 * ---------
 * API
 * ---------
 *
 */
Route::group([
    'middleware' => ['api'],
    'prefix'     => 'api/volunteer',
    'namespace'  => 'Modules\Volunteers\Http\Controllers\Api',
], function () {
    Route::get('zip/{zip}', 'ZipController@getCity');
});
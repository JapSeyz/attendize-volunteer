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
    Route::post('update/tasks', 'VolunteersController@updateTasks');
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
    Route::get('/', [
        'as' => 'volunteers.login',
        'uses' => 'VolunteersController@index',
    ]);

    /*
     * ---------
     * Auth
     * ---------
     */
    Route::post('register', 'VolunteersController@register');
    Route::post('login', 'VolunteersController@login');
    Route::get('logout', 'VolunteersController@logout');

    /*
     * ---------
     * Profile
     * ---------
     */
    Route::post('update', 'VolunteersController@update');
    Route::post('update/password', 'VolunteersController@updatePassword');

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
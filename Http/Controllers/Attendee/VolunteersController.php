<?php namespace Modules\Volunteers\Http\Controllers\Attendee;

use App\Http\Controllers\MyModuleController;

class VolunteersController extends MyModuleController
{
    public function index()
    {
        return view('volunteers::index');
    }

}
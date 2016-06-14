<?php namespace Modules\Volunteers\Http\Controllers\Organiser;

use App\Http\Controllers\MyModuleController;

class VolunteersController extends MyModuleController {
	
	public function index()
	{
		return view('volunteers::Organiser.index');
	}
}
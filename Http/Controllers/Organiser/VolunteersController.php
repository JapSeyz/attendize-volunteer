<?php namespace Modules\Volunteers\Http\Controllers\Organiser;

use App\Http\Controllers\MyModuleController;
use Modules\Volunteers\Models\Volunteer;

class VolunteersController extends MyModuleController {
	
	public function index()
	{
		$volunteers = Volunteer::event($this->event->id)->get();
		return view('volunteers::Organiser.index');
	}
}
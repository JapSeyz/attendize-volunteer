<?php namespace Modules\Volunteers\Http\Controllers\Attendee;

use App\Http\Controllers\MyModuleController;
use Illuminate\Http\Request;
use Modules\Volunteers\Http\Requests\RegisterVolunteerRequest;
use Modules\Volunteers\Models\Task;
use Modules\Volunteers\Models\Volunteer;
use Session;
use Response;

class VolunteersController extends MyModuleController
{
    public function index()
    {
        $tasks = Task::get();
        return view('volunteers::Attendee.index')->withTasks($tasks);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if(\Auth::guard('volunteer')->attempt(['email' => $email, 'password' => $password])){
            dd(auth()->guard('volunteer')->user());
        }

        dd('not found');
    }

    public function register(RegisterVolunteerRequest $request)
    {
        $inputs = $request->all();
        $inputs['event_id'] = $this->event->id;

        // Ensure that different priorities have been selected
        for($i = 2; $i < 4; $i++){
            if($inputs['priority1'] == ($inputs['priority'.$i])){

                // Duplicate priority set
                return Response::json([
                    'status' => 422,
                    'priority'.$i => ['The Priorities have to be unique']
                ], 422);
            }
        }

        $volunteer = Volunteer::create($inputs);

        dd($volunteer);
    }

}
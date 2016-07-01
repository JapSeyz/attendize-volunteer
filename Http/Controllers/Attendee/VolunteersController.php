<?php namespace Modules\Volunteers\Http\Controllers\Attendee;

use App\Http\Controllers\MyModuleController;
use Illuminate\Http\Request;
use Modules\Volunteers\Http\Requests\RegisterVolunteerRequest;
use Modules\Volunteers\Models\Task;
use Modules\Volunteers\Models\Volunteer;
use Response;
use Session;

class VolunteersController extends MyModuleController
{
    protected $guard = 'volunteer';

    public function index()
    {
        $tasks = Task::get();

        if (auth()->guard($this->guard)->check()) {

            $user = auth()->guard($this->guard)->user();

            return view('volunteers::Attendee.show')->withUser($user)->withTasks($tasks);
        }

        return view('volunteers::Attendee.auth')->withTasks($tasks);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (\Auth::guard($this->guard)->attempt(['email' => $email, 'password' => $password])) {
            Session()->set('message', 'Successfully logged in');
        } else {
            Session()->set('message', 'The User was not found');
        }

        return redirect()->back();
    }

    public function register(RegisterVolunteerRequest $request)
    {
        $inputs = $request->all();
        $inputs['event_id'] = $this->event->id;

        // Ensure that different priorities have been selected
        for ($i = 2; $i < 4; $i++) {
            if ($inputs['priority1'] == ($inputs['priority' . $i])) {

                // Duplicate priority set
                return Response::json([
                    'status'        => 422,
                    'priority' . $i => ['The Priorities have to be unique']
                ], 422);
            }
        }

        $volunteer = Volunteer::create($inputs);

        Session()->set('message', 'Your account has been created');

        return redirect()->back();
    }

}
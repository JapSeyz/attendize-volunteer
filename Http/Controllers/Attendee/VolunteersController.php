<?php namespace Modules\Volunteers\Http\Controllers\Attendee;

use App\Http\Controllers\MyModuleController;
use Illuminate\Http\Request;
use Modules\Volunteers\Http\Requests\RegisterVolunteerRequest;
use Modules\Volunteers\Models\Task;
use Modules\Volunteers\Models\Volunteer;
use Session;

class VolunteersController extends MyModuleController
{
    protected $guard = 'volunteer';

    protected $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        if (auth()->guard($this->guard)->check()) {
            $this->user = auth()->guard($this->guard)->user();
        }
    }

    public function index()
    {
        $tasks = Task::get();

        if ($this->user) {

            return view('volunteers::Attendee.show')->withUser($this->user)->withTasks($tasks);
        }

        return view('volunteers::Attendee.auth')->withTasks($tasks);
    }

    public function register(RegisterVolunteerRequest $request)
    {
        $inputs = $request->all();
        $inputs['event_id'] = $this->event->id;

        // Ensure that different priorities have been selected
        for ($i = 2; $i < 4; $i++) {
            if ($inputs['priority1'] == ($inputs['priority' . $i])) {

                // Duplicate priority set
                return response()->json([
                    'status'        => 422,
                    'priority' . $i => ['The Priorities have to be unique']
                ], 422);
            }
        }

        $this->user = Volunteer::create($inputs);

        Session()->set('message', 'Your account has been created');

        return redirect()->back();
    }

    public function login(Request $request)
    {
        if (auth()->guard($this->guard)->attempt($request->only('email', 'password'))) {
            session()->set('message', 'Successfully logged in');
        } else {
            session()->set('message', 'The User was not found');
        }

        return redirect()->back();
    }

    public function logout()
    {
        auth()->guard($this->guard)->logout();
        Session()->set('message', 'Successfully logged out');

        return redirect($this->url);
    }


    public function update(Request $request)
    {
        $inputs = $request->all();

        // Ensure that different priorities have been selected
        for ($i = 2; $i < 4; $i++) {
            if ($inputs['priority1'] == ($inputs['priority' . $i])) {

                // Duplicate priority set
                return response()->json([
                    'status'        => 422,
                    'priority1'     => ['The Priorities have to be unique'],
                    'priority' . $i => ['The Priorities have to be unique'],
                ], 422);
            }
        }

        if ($inputs['priority2'] == $inputs['priority3']) {
            // Duplicate priority set
            return response()->json([
                'status'    => 422,
                'priority2' => ['The Priorities have to be unique'],
                'priority3' => ['The Priorities have to be unique']
            ], 422);
        }

        $this->user->update($inputs);

        return response()->json([
            'status'  => 'success',
            'message' => 'Success, user has been updated',
        ], 200);

    }
}
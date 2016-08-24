<?php namespace Modules\Volunteers\Http\Controllers\Organiser;

use App\Http\Controllers\MyModuleController;
use Illuminate\Http\Request;
use Modules\Volunteers\Models\FoodDay;
use Modules\Volunteers\Models\Task;
use Modules\Volunteers\Models\Volunteer;

class VolunteersController extends MyModuleController
{

    public function index()
    {
        $volunteers = Volunteer::event($this->event->id)->get();
        $tasks = Task::event($this->event->id)->get();
        $fooddays = FoodDay::event($this->event->id)->get();

        return view('volunteers::Organiser.index')
            ->withVolunteers($volunteers)
            ->withTasks($tasks)
            ->withFooddays($fooddays);
    }

    public function updateTasks(Request $request)
    {
        foreach ($request->task as $id => $task) {
            Task::findOrFail($id)->update(['name' => $task]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Success, the Tasks have been updated',
        ], 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {


        // $this->validate($request, [
        //     'title' => 'required',
        //     'emails.*' => 'required|email'
        // ]);

        return $request->all();


        Task::create([
            'title' => request('title'),
            'emails' => request('emails'),
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
    }


    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->title = request('title');
        $task->emails = request('emails');
        $task->save();

        return redirect()->back();
    }
}

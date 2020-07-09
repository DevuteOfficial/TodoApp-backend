<?php

namespace App\Http\Controllers;

use App\Task;
use App\Todo;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function store($todo_id, Request $request)
    {
        $todo = Todo::findorfail($todo_id);
        $task = Task::create([
            "title" => $request->title,
            "todo_id" => $todo->id,
        ]);
        return response()->json($task, 201);
    }

    public function update($todo_id, $task_id)
    {
          $task = Task::where('todo_id', $todo_id)->where("id", $task_id)->firstorfail();
          $task->update(request(["title", 'is_complete']));
          return response()->json($task, 200);
    }

    public function destroy($todo_id, $task_id)
    {
        $task = Task::where('todo_id', $todo_id)->where("id", $task_id)->firstorfail();
        $task->delete();
        return response()->json("Task Removed", 200);
    }
}

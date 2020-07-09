<?php

namespace App\Http\Controllers;

use App\Note;
use App\Task;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store($task_id, Request $request)
    {
        $task = Task::findorfail($task_id);
        $note = Note::create([
            "note" => $request->note,
            "task_id" => $task->id,
        ]);
        return response()->json($note, 201);
    }

    public function update($task_id, $note_id, Request $request)
    {
        $note = Note::where('task_id', $task_id)->where("id", $note_id)->firstorfail();
        $note->note = $request->note;
        $note->save();
        return response()->json($note[0], 200);
    }

    public function destroy($task_id, $note_id)
    {
        $note = Note::where('task_id', $task_id)->where("id", $note_id)->firstorfail();
        $note->delete();
        return response()->json("Note Removed", 200);
    }
}

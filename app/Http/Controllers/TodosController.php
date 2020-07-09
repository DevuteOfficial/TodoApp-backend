<?php

namespace App\Http\Controllers;


use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodosController extends Controller
{
public function index(){

    $user = auth()->user();

    $data = User::where("id", $user->id)->with('Todos.Tasks.Notes')->get();
    return response()->json($data, 200);
}
public function store(Request $request){
    $user = auth()->user();
    $todo = Todo::create([
        "title" => $request->title,
        "user_id"=> $user->id,
    ]);
    return response()->json($todo, 201);
}
    public function update(Todo $todo, Request $request){
        $todo->title = $request->title;
        $todo->save();
        return response()->json($todo, 200);
    }
    public function destroy( $todo_id){
        $todo = Todo::findorfail($todo_id);
        $todo->delete();
        return response()->json("Todo Removed",200);
    }
    public function image(Todo $todo, Request $request){
        $image =  $request->file('image');
        $fileName = $image->getClientOriginalName();
        $path = public_path() . '/images/';
        $image->move($path, $fileName);
        $imagepath = asset("/"). 'images/' . $fileName;
        $todo->image_path = $imagepath;
        $todo->save();
        return response()->json($todo, 201);
    }
}

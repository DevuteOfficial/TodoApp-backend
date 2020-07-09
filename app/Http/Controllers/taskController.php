<?php

namespace App\Http\Controllers;

use App\task;
use App\todo;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function index(todo $todo)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, todo $todo)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo, task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo, task $task)
    {
        //
    }
}

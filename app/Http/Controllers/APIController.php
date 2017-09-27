<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\task;
use App\User;

use App\Repository\UserRepository;
use App\Repository\TaskRepository;
use App\Repository\CommentRepository;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $user,$task,$comment;

    public function __construct(UserRepository $user,TaskRepository $task,CommentRepository $comment)
    {
        //$this->middleware('auth');
        $this->user = $user;
        $this->task = $task;
        $this->comment = $comment;
    }
    public function index(Request $request)
    {
        $user = $this->user->getAllusers();
        return response(array(
                'error' => false,
                'message' =>response()->json($user),
               ),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                $task = $this->task->createTask($request->task_array);
        return response(array(
                'error' => false,
                'message' =>'Task created successfully',
               ),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = $this->task->createTask($request->task_array,$id);
        return response(array(
                'error' => false,
                'message' =>'Task updated successfully',
               ),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

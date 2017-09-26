<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taskmanagement;
use App\User;

use App\Repository\UserRepository;
use App\Repository\TaskmanagementRepository;
use App\Repository\CommentRepository;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $user,$taskmanagement,$comment;

    public function __construct(UserRepository $user,TaskmanagementRepository $taskmanagement,CommentRepository $comment)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->taskmanagement = $taskmanagement;
        $this->comment = $comment;
    }
    public function index(Request $request)
    {
        $taskmanagement = $this->taskmanagement->getAlltasks();
        return response(array(
                'error' => false,
                'message' =>response()->json($taskmanagement),
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
                $taskmanagement = $this->taskmanagement->createTask($request->task_array);
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
        $taskmanagement = $this->taskmanagement->createTask($request->task_array,$id);
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
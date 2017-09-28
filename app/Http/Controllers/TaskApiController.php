<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Repository\UserRepository;
use App\Repository\TaskRepository;
use App\Repository\CommentRepository;
class TaskApiController extends Controller
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
    public function index()
    {
         try{
            $response = $this->task->getAlltasks();
            $statusCode = 200;
            if ($response['error'] == true){
                throw new \Exception($response['message']);

            }

        }catch(\Exception $e){
            $response = [
                "error" => $e->getMessage()
            ];
            $statusCode = 404;
        }finally{
             return response($response,$statusCode);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //echo $request->token;die;
        try{
            $response = $this->task->createTask($request->toArray());
            $statusCode = 200;
            if ($response['error'] == true){
                throw new \Exception($response['message']);

            }

        }catch(\Exception $e){
            $response = [
                "error" => $e->getMessage()
            ];
            $statusCode = 404;
        }finally{
             return response($response,$statusCode);

        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $response = $this->task->getById($id);
            $statusCode = 200;
            if ($response['error'] == true){
                throw new \Exception($response['message']);
            }            
        }catch(\Exception $e){
            $response = [
                "error" => $e->getMessage()
            ];
            $statusCode = 404;
        }finally{
             return response($response,$statusCode);

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mytask()
    {
        echo $request->token;die;
        try{
            $response = $this->task->getMytasks();
            $statusCode = 200;
            if ($response['error'] == true){
                throw new \Exception($response['message']);
            }            
        }catch(\Exception $e){
            $response = [
                "error" => $e->getMessage()
            ];
            $statusCode = 404;
        }finally{
             return response($response,$statusCode);

        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $task = $this->task->createTask($request->toArray(),$id);
        
        $response = response()->json($task);
        return response(array(
                'error' => false,
                'message' =>$response,
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

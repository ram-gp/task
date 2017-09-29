<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Repository\UserRepository;
use App\Repository\TaskRepository;
use App\Repository\CommentRepository;
class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $user,$task,$comment;

    public function __construct(UserRepository $user,TaskRepository $task,CommentRepository $comment)
    {
        $this->user = $user;
        $this->task = $task;
        $this->comment = $comment;
    }    
    public function index()
    {
        //
        try{
            $response = $this->comment->getAllcomments();
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
        try{
            $response = $this->comment->createComment($request->toArray());
            $statusCode = 201;
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
            $response = $this->comment->getById($id);
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
        try{
            $response = $this->comment->createComment($request->toArray(),$id);
            $statusCode = 201;
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

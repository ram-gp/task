<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\Handler;
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
    protected $availableFilters = [ 
                                     'task_type', //defaut any
                                     'task_status' , //default any
                                     'q', //=> elastic query search term to task and comment desc
                                     'search_type', // => default task and can search task or comment or both..
                                     'created_by', // => default all  or own or specific  
                                     'task_id',
                                     'offset',
                                     'limit'
                                  ];
    public function __construct(UserRepository $user,TaskRepository $task,CommentRepository $comment)
    {

        $this->user = $user;
        $this->task = $task;
        $this->comment = $comment;
    }
    public function search(Request $request)
    {
    
        try{
            $input = $request->all();
            $response = $this->filterTasks($input);
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


  /*** Filter tasks with the given filter options ***/
  public function filterTasks($inputData)
  {
     // $inputData = $request->all();
      $filters = array_intersect($this->availableFilters,array_keys($inputData));
      $filterOptions = [];
      foreach($filters as $filter)
      {
         $filterOptions[$filter] = $inputData[$filter];
      }
      return $filterdList = $this->task->filterTasks($filterOptions,$inputData['token']);
  }
}

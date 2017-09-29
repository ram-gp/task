<?php

namespace App\Repository;

use Auth;
use App\Task;


class TaskRepository
{
	 
	 /**
	  * Create task
	  **/
	  public function createTask($task_array = array(),$id=null)
	  {
	  	  $user =\JWTAuth::toUser($task_array['token']);
		  if( $id != null )
			  $task = Task::findOrFail($id);
		  else
			$task = new Task;
		  
		  	$task->task_type=$task_array['task_type'];
			$task->task_desc=$task_array['task_desc'];
			$task->task_status=$task_array['task_status'];
			$task->created_by=$user->id;
			$task->updated_by=$user->id;
			$task->save(); 
		 return $task;
	  }
	
	/**
	 * Get all tasks
	 **/
	 public function getAlltasks()
	 {
           $task = Task::with('comment')->orderBy('created_at','desc');
           $task =  $task->get();
           if ($task == null){
		    	return array(
                'error' => true,
                'message' =>'Task not available ...',
               );
		    }
		    return array(
                'error' => false,
                'message' =>$task,
               );
			return $task; 
	 }
	/**
	 * Get my tasks
	 **/
	 public function getMytasks($token)
	 {
	 	   $user =\JWTAuth::toUser($token);
           $task = Task::with('comment')->where('created_by',$user->id)->orderBy('created_at','desc');

           $task =  $task->get();
           if ($task == null){
		    	return array(
                'error' => true,
                'message' =>'Task not available ...',
               );
		    }
		    return array(
                'error' => false,
                'message' =>$task,
               );
			return $task; 
	 }	 
	 /**
	 * Get task by id
	 **/
	 public function getById($id)
	 {
			$task = Task::with('comment','created_by','updated_by')->where('id',$id)->get();

		    if ($task == null){
		    	return array(
                'error' => true,
                'message' =>'Task not Available ...',
               );
		    	}

			return array(
                'error' => false,
                'message' =>$task,
               );
	 }	
   
	
	/**
	 * Get the count of the task(s)
	 **/
	public function getTaskCount()
	{
		$count = Task::count();
		return $count;
	}
 	/**
	 * Get the Filter of the task(s)
	 **/
	public function filterTasks($filterData,$token=''){
		$task = Task::with('comment','created_by','updated_by');
		if (!empty($filterData['q']))
			$task = $task->where('task_desc', 'LIKE', '%'.$filterData['q'].'%');
		if (isset($filterData['task_type']))
			$task = $task->where('task_type',$filterData['task_type']);
		if (isset($filterData['task_id']))
			$task = $task->where('id',$filterData['task_id']);
		if (isset($filterData['created_by'])){
			if ($filterData['created_by'] == 'own'){
				$user =\JWTAuth::toUser($token);
				$task = $task->where('created_by',$user->id);
			}else
				$task = $task->where('created_by',$filterData['created_by']);
		}
		if (!isset($filterData['offset']))
				$filterData['offset'] = 0;	
		if (isset($filterData['limit'])){
			$task = $task->offset($filterData['offset'])->limit($filterData['limit']);
		}	
		    if ($task == null){
		    	return array(
                'error' => true,
                'message' =>'Task not Available ...',
               );
		    	}

			return array(
                'error' => false,
                'message' =>$task->get(),
               );
	}
}
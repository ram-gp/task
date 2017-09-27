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
		   if( $id != null )
		  {
			  $task = Task::findOrFail($id);
			  
			  $task->task_type=$task_array['task_type'];
			$task->task_desc=$task_array['task_desc'];
			$task->task_status=$task_array['task_status'];
			$task->user()->user_id=$task_array['user']['user_id'];
			 $task->save(); 			 
		  }
		  else
		  {
			  $task = new Task();
			  
			  $task->task_type=$task_array['task_type'];
			$task->task_desc=$task_array['task_desc'];
			$task->task_status=$task_array['task_status'];
			$task->user()->user_id=$task_array['user']['user_id'];
			 $task->save(); 	
		  }
		  
		 return $user;
	  }
	
	/**
	 * Get all tasks
	 **/
	 public function getAlltasks()
	 {
           $task = Task::whereHas('user')->with('user')->get();
            
			return $task; 
	 }
	 
	 /**
	 * Get task by id
	 **/
	 public function getById($id)
	 {
		    $task = Task::find($id);
			return $task; 
	 }	
   
	
	/**
	 * Get the count of the task(s)
	 **/
	public function getTaskCount()
	{
		$count = Task::count();
		return $count;
	}
 
}
<?php

namespace App\Repository;

use Auth;
use App\Taskmanagement;


class TaskmanagementRepository
{
	 
	 /**
	  * Create task
	  **/
	  public function createTask($task_array = array(),$id=null)
	  {
		   if( $id != null )
		  {
			  $taskmanagement = Taskmanagement::findOrFail($id);
			  
			  $taskmanagement->task_type=$task_array['task_type'];
			$taskmanagement->task_desc=$task_array['task_desc'];
			$taskmanagement->task_status=$task_array['task_status'];
			$taskmanagement->user()->user_id=$task_array['user']['user_id'];
			 $taskmanagement->save(); 			 
		  }
		  else
		  {
			  $taskmanagement = new Taskmanagement();
			  
			  $taskmanagement->task_type=$task_array['task_type'];
			$taskmanagement->task_desc=$task_array['task_desc'];
			$taskmanagement->task_status=$task_array['task_status'];
			$taskmanagement->user()->user_id=$task_array['user']['user_id'];
			 $taskmanagement->save(); 	
		  }
		  
		 return $user;
	  }
	
	/**
	 * Get all tasks
	 **/
	 public function getAlltasks()
	 {
           $taskmanagement = Taskmanagement::whereHas('user')->get();
            
			return $taskmanagement; 
	 }
	 
	 /**
	 * Get task by id
	 **/
	 public function getById($id)
	 {
		    $taskmanagement = Taskmanagement::find($id);
			return $taskmanagement; 
	 }	
   
	
	/**
	 * Get the count of the task(s)
	 **/
	public function getTaskCount()
	{
		$count = Taskmanagement::count();
		return $count;
	}
 
}
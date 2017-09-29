<?php

namespace App\Repository;

use Auth;
use App\Comment;
use App\Task;
use Carbon\Carbon;

class CommentRepository
{
	 protected $userId;
	 
	 /**
	  * Create Comment
	  **/
	  public function createComment($comment_array = array(),$id=null)
	  {
		  $user =\JWTAuth::toUser($comment_array['token']);
		  if( $id != null )
			  {
			  	$comment = Comment::findOrFail($id);
			  	$comment->comments=$comment_array['comments'];
			  	//$dt = Carbon::parse($comment->remainder_date);
			    $comment->remainder_date = Carbon::now()->addDay(2); // add from current date
			    $task = Task::findOrFail($comment->task_id);
			}
		  else{
			  $comment = new Comment;		 
			  $comment->comments=$comment_array['comments'];
			  $comment->created_by=$user->id;
			  $comment->remainder_date = Carbon::now()->addDay(2);
			  if (isset($comment_array['task_id']))
		  		$task = Task::findOrFail($comment_array['task_id']);
		  	  else
		  	  	return array(
                'error' => true,
                'message' =>'Task id is mandatory',
               );
			 }

			$comment->updated_by=$user->id;
			$task->comment()->save($comment); 
		 return $comment;

	  }
	
	/**
	 * Get all comment
	 **/
	 public function getAllcomments()
	 {
		   $comment =  Comment::with('task','created_by','updated_by')->orderBy('created_at','desc');
           $comment =  $comment->get();
           if ($comment == null){
		    	return array(
                'error' => true,
                'message' =>'Comment not available ...',
               );
		    }
		    return array(
                'error' => false,
                'message' =>$comment,
               ); 
	 }
	 
	 /**
	 * Get comment by id
	 **/
	 public function getById($id)
	 {
		    
			$comment = Comment::with('task','created_by','updated_by')->where('id',$id)->get();

		    if ($comment == null){
		    	return array(
                'error' => true,
                'message' =>'Comment not Available ...',
               );
		    	}

			return array(
                'error' => false,
                'message' =>$comment,
               );
	 }	
}
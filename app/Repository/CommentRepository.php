<?php

namespace App\Repository;

use Auth;
use App\User;


class CommentRepository
{
	 protected $userId;
	 
	 /**
	  * Create Comment
	  **/
	  public function createComment($comment_array = array(),$id=null)
	  {
		   if( $id != null )
		  {
			$comment = Comment::findOrFail($id);
			  
			$comment->comments=$comment_array['comments'];
			$comment->taskmanagement_d=$comment_array['taskmanagement_id'];
			$comment->remainder_date=''; //need to generate some future date
    		 $comment->save(); 			 
		  }
		  else
		  {
			$comment = new Comment();  
			  
			$comment->comments=$comment_array['comments'];
			$comment->taskmanagement_d=$comment_array['taskmanagement_id'];
			$comment->remainder_date=''; //need to generate some future date
    		 $comment->save(); 		
		  }
		  
		 return $user;
	  }
	
	/**
	 * Get all comment
	 **/
	 public function getAllcomments($task_id)
	 {
		    
           $comment = Comment::with('taskmanagement')->orderBy('created_at','desc');
            
			return $comment; 
	 }
	 
	 /**
	 * Get comment by id
	 **/
	 public function getById($id)
	 {
		    $comment = Comment::find($id);
			return $comment; 
	 }	
}
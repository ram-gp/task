<?php

namespace App\Repository;

use Auth;
use \App\User;
use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

class UserRepository
{
	 protected $userId;
	 
	/**
	 * Constructor
	 **/
	 public function __construct()
	 {
		 if(Auth::check())
		{
		 $this->userId = Auth::user()->id;
		}

	 }
	 public function currentUserId(){
	 	return $this->userId;
	 }
	 /**
	  * Create user
	  **/
	  public function createUser($user_array = array(),$id=null)
	  {

	  		$result = $this->checkEmail($user_array['email'],$id);
	  		if ($result->count() > 0){
				return array(
                'error' => true,
                'message' =>'Email Already Exist...',
               );
	  		}
		  if( $id != null )		  
			  $user = User::findOrFail($id);
   	      else	
		      $user = new \App\User;

		  	  $user->name = $user_array['name'];
			  $user->email = $user_array['email'];
			  $user->password = \Hash::make($user_array['password']);
			  $user->save(); 			 
			  $user->token = \JWTAuth::fromUser($user);
			  $user->save();
		 return array(
                'error' => false,
                'message' =>$user,
               );;
	  }
	
	/**
	 * Get all users
	 **/
	 public function getAllUsers()
	 {
		    
           $users = User::orderBy('created_at','desc');
           $users =  $users->get();
           if ($users == null){
		    	return array(
                'error' => true,
                'message' =>'User not available ...',
               );
		    }
		    return array(
                'error' => false,
                'message' =>$users,
               );
 
	 }
	 
	 /**
	 * Get user by id
	 **/
	 public function getById($id)
	 {
		    $user = User::find($id);
		    if ($user == null){
		    	return array(
                'error' => true,
                'message' =>'User not Available ...',
               );
		    	}

			return array(
                'error' => false,
                'message' =>$user,
               );; 
	 }	

	 /**
	 * Get user by email
	 **/
	 public function checkEmail($email,$id=null)
	 {
		    $user = User::where('email',$email);
		    if ($id != null)
		    	$user = $user->where('id','!=',$id);

			return $user; 
	 }		 
      
	
	/**
	 * Get the count of the user(s)
	 **/
	public function getUserCount()
	{
		$count = User::count();
		return $count;
	}
	  
    /**
     * Get user by email
     **/
    public function getUserIdByEmail($email)
    {
    	$user = User::where('email','=',$email)->where('id','=',$this->userId);
    	return $user;
    }

    /**
     * Get user by email
     **/
    public function getByEmail($email)
    {
    	$user = User::where('email','=',$email);
    	return $user;
    }
}
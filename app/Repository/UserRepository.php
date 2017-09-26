<?php

namespace App\Repository;

use Auth;
use App\User;


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
		   if( $id != null )
		  {
			  $user = User::findOrFail($id);
			  $user->name = $user_array['name'];
			  $user->email = $user_array['email'];
			 /*  if(isset($user_array['password']))
			  {
				 $user->password =  bcrypt($user_array['password']); 
			  } */
			  $user->isActive = $user_array['isActve'];
			  $user->save(); 			 
		  }
		  else
		  {
			  $user = new User;
			  $user->name = $user_array['name'];
			  $user->email = $user_array['email'];
			 // $user->password =  bcrypt($user_array['password']);
			  $user->isActive = $user_array['isActve'];
			  $user->save(); 
		  }
		  
		 return $user;
	  }
	
	/**
	 * Get all users
	 **/
	 public function getAllUsers()
	 {
		    
           
            $curUserRole = Auth::user()->roles()->get()[0]->id;
            if($curUserRole == '4')
            {
               $users = User::with('roles')->orderBy('created_at','desc');
            }
		    else
		    {
               $users = User::with('roles')->whereHas('roles', function($q) {
                                                                    
                                                                    $q->where('role.id','!=','4');
                                                                }
                                                      )->orderBy('created_at','desc');
		    }
			return $users; 
	 }
	 
	 /**
	 * Get user by id
	 **/
	 public function getById($id)
	 {
		    $user = User::find($id);
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
    public function getByEmail($email)
    {
    	$user = User::where('email','=',$email)->where('id','=',$this->userId);
    	return $user;
    }

    /**
     * Get user by email
     **/
    public function getUserIdByEmail($email)
    {
    	$user = User::where('email','=',$email);
    	return $user;
    }
    /**
     * Get users from group
     **/
    public function getGroupUsers()
    {
    	$users = User::whereHas('group')->OrderBy("name","DESC")->paginate(100);
    	return $users;
    }    
}
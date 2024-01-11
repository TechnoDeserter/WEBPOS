<?php

/**
 * 
 */
class User extends Model
{
	protected $table = "users";
	protected $allowed_columns = [

	            'username',
	            'email',
	            'password',
	            'role',
	            'gender',
	            'date',
	            'image',
	        ];
	
	public function validate($data, $id = null)
	{

	    $errors = [];

	        if(empty($data['username']))
	        {
	            $errors['username'] = "Please enter a Username";
	        }else
	        if(!preg_match('/^[a-zA-Z0-9 ]+$/', $data['username']))
	        {
	            $errors['username'] = "Please use letters only";
	        }

	        if(empty($data['email']))
	        {
	            $errors['email'] = "Please enter a email";
	        }else
	        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
	        {
	            $errors['email'] = "Email is not valid";
	        }

	        if(!$id){
		        if(empty($data['password']))
		        {
		            $errors['password'] = "Please enter a password";
		        }else
		        if($data['password'] !== $data['password_retype'])
		        {
		            $errors['password_retype'] = "Password do not match";
		        }else
		        if(strlen($data['password']) <8)
		        {
		            $errors['password'] = "Password must be 8 characters long";
		        }
	    	}else{

	    		if(!empty($data['password']))
		        {
			        if($data['password'] !== $data['password_retype'])
			        {
			            $errors['password_retype'] = "Password do not match";
			        }else
			        if(strlen($data['password']) <8)
			        {
			            $errors['password'] = "Password must be 8 characters long";
			        }
		    	}
	    	
	    	}

	    return $errors;
	}

}
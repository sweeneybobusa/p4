<?php

class UserController extends BaseController {


	public function __construct() {
        $this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));	
    }

	
	public function getSignup() {
		
		return View::make('user_signup');
		
	}
	
	public function postSignup() {
		
		# Step 1) Define the rules			
			$rules = array(
				'email' 	=> 'required|email|unique:users,email',
				'password'	=> 'required|min:6',
				'my_name'   => 'honeypot',
				'my_time'   => 'required|honeytime:5'
			);			
			
		# Step 2) validate
			$validator = Validator::make(Input::all(), $rules);
		
		# Step 3) if not validated
			if($validator->fails()) {
			
				return Redirect::to('/signup')
					->with('flash_message', 'Sign up failed; please fix the errors listed below.')
					->withInput()
					->withErrors($validator);
			}
					
			$user = new User;
			$user->email    = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->nickname	= Input::get('nickname');
			$user->remember_token = 1;
		
			try { $user->save(); }
			
			catch (Exception $e) {
				
				return Redirect::to('/signup')
					->with('flash_message', 'Sign up failed;  please try again.')
					->withInput()
					->withErrors($validator);
					
			}
		
			# Log in
			Auth::login($user);
		
			return Redirect::to('/')->with('flash_message', 'Welcome to the Hoedown!');
				
	}
	
	public function getLogin() {
	
			return View::make('user_login');
	}
	
	public function postLogin() {
		
		$credentials = Input::only('email', 'password');
	
		if (Auth::attempt($credentials, $remember = true)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
			}
		else {	return Redirect::to('/login')
				->with('flash_message', 'Log in failed; (post login) please try again.')
				->withInput();
			}
		
		return Redirect::to('login');
				
	}
	
	
	public function getLogout() {
		
		# Log out
		Auth::logout();
	
		# Send them to the homepage
		return Redirect::to('/');

	}
		
}
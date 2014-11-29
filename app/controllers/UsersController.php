<?php

use Illuminate\Support\Facades\Request;
use Sorskod\Larasponse\Larasponse;
use AndroidLogin\Transformers\UserTransformer;

class UsersController extends \BaseController {


	protected $fractal;

	function __construct(Larasponse $fractal)
	{
		$this->fractal = $fractal;
	}

	/**
	 * Displays a list of all users in the database, transformed response with Fractal
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::all();

		return $this->fractal->collection($users, new UserTransformer());

	}




	/**
	 * Creates a new user in the database
	 *
	 * @return Response
	 */
	public function postNewUser()
	{
		try
		{
			$user = Sentry::createUser(array(
				'first_name' => Request::get('first_name'),
				'last_name' => Request::get('last_name'),
				'email'     => Request::get('email'),
				'password'  => Request::get('password'),
				'activated' => true,
			));


			$userGroup = Sentry::findGroupById(2);
			$user->addGroup($userGroup);

			return Response::json(array(
					'error' => false,
					'message' => 'User has been saved.'),
				201
			);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Email address is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'A password is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'A user with this login already exists.';
		}

	}




	/**
	 * Creates a new administrator in the database
	 *
	 * @return Response
	 */
	public function postNewAdmin()
	{
		try
		{
			$user = Sentry::createUser(array(
				'first_name' => Request::get('first_name'),
				'last_name' => Request::get('last_name'),
				'email'     => Request::get('email'),
				'password'  => Request::get('password'),
				'activated' => true,
			));

			$adminGroup = Sentry::findGroupById(1);
			$user->addGroup($adminGroup);


			return Response::json(array(
					'error' => false,
					'message' => 'User has been saved.'),
				201
			);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User with this login already exists.';
		}

	}



	/**
	 *
	 * Logs a user into the applications using Auth
	 *
	 * @return Response
	 */
	public function postUserLogin()
	{
		try
		{
			$credentials = array(
				'email' => Request::get('email'),
				'password' => Request::get('password'),
			);

			// Authenticate the user

			$user = Sentry::authenticate($credentials, false);

			return Response::json(array(
					'error' => false,
					'message' => "Login successful"),
				200
			);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User could not be found.';
		}


	}



	/**
	 * Update the specified resource in storage, lets a user edit their account
	 * NEEDS WORK
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function patchUserAccount($id)
	{
		//PATCH request to update the user details by their email, password reset?

		$id = Auth::id();
		$user = User::find($id);

		if(Request::get('email'))
		{
			$user->username = Request::get('email');
		}

		if(Request::get('name'))
		{
			$user->username = Request::get('name');
		}

		if(Request::get('password'))
		{
			$user->password = Request::get('password');
		}

		$user->save();

		return Response::json(array(
				'error' => false,
				'message' => 'User profile updated.'),
			200
		);

	}




	/**
	 * Remove the specified resource from storage, deletes a users account
	 * NEEDS WORK
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteUserAccount()
	{
		$id = Auth::id();
		$user = User::find($id);

		$user->delete;

		return Response::json(array(
				'error' => false,
				'message' => 'User account deleted.'),
			200
		);



	}




	/**
	 * Method done if no other methods worked, default
	 *
	 * @param array $parameters
	 */
	public function missingMethod($parameters = array())
	{

		return('No other routes have been successful.');
	}

}

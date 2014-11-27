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
	 * Creates a new user in the database, with the parameters passed in from the API request
	 *
	 * @return Response
	 */
	public function postNewUser()
	{
		$user = new User;

		$user->name = Request::get('name');
		$user->email = Request::get('email');
		$user->password = Hash::make(Request::get('password'));

		//validation goes here

		$user->save();

		return Response::json(array(
				'error' => false,
				'message' => 'User has been saved.'),
			200
		);

	}



	/**
	 * Displays a users details?
	 *
	 * @return Response
	 */
	public function getUserProfile()
	{
		if (Auth::check())
		{
//			$id = Auth::id();
//			$user = User::find($id);
//
//			return Response::json(array(
//					'error' => false,
//					'data' => $user->toArray()),
//				200
//			);


		}

		return ('TESTING');

	}



	/**
	 * Update the specified resource in storage, lets a user edit their account
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function patchUserDetails($id)
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteUser()
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
	 * Logs a user into the applications using Auth
	*/
	public function postUserLogin()
	{
		//logs users in using authentication

		$users = array(
			'email' => Request::get('email'),
			'password' => Request::get('password')

		);


		if (Auth::attempt($users)){
			return Response::json(array(
					'error' => false,
					'message' => "Login successful"),
				200
			);
		}

		return Response::json(array(
				'error' => true,
				"message" => 'Incorrect e-mail/password, please try again.'),
			401
		);

	}

	/**
	 * Method done if no other methods worked, default
	 *
	 * @param array $parameters
	 */
	public function missingMethod($parameters = array())
	{

	}

}

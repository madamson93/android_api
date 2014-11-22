<?php

use Illuminate\Support\Facades\Request;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return ('Route is functioning.');
	}




	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;

		$user->name = Request::get('name');
		$user->email = Request::get('email');
		$user->encrypted_password = Hash::make(Request::get('encrypted_password'));

		$result = $user->save();

		return Response::json(array(
				'message' => 'User has been saved.'),
			200
		);

	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//will get a user by their email and password




	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//PATH request to update the user details by their email, password reset?

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//delete a user from the table, delete account

	}


}

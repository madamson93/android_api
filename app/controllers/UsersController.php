<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//displays all users

		//assigns the users table to the $users variable
		$users = DB::table('users')->get();

		//loops through the users and returns them as a JSON response
		foreach ($users as $user)
		{
			return Response::json([
				'data'	=>	$users
			], 200);
		}

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//creates a new user
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

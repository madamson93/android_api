<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		Sentry::createGroup(array(
			'name'        => 'Administrator',
			'permissions' => array(
				"admin" => 1,
				"users"	=> 1,
			),
		));


		Sentry::createGroup(array(
			'name'        => 'User',
			'permissions' => array(
				"admin" => 0,
				"users"	=> 1,
			),
		));
	}



}
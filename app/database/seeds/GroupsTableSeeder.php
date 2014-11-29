<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		Sentry::createGroup(array(
			'name'        => 'Administrator',
			'permissions' => array(
				"user.view" => 1,
			),
		));


		Sentry::createGroup(array(
			'name'        => 'User',
			'permissions' => array(
				"user.view" => 0,
			),
		));
	}



}
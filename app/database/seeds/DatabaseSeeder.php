<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');

		$this->command->info('User table has been seeded.');

		$this->call('GroupsTableSeeder');

		$this->command->info('Group table has been seeded.');

	}

}

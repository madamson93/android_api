<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'name' => 'Hans Shephard',
            'email' => 'hans_shepard@booksmart.com',
            'password' => Hash::make('ZymAHana`U')
        ));

        User::create(array(
            'name' => 'Zana Sheaffer',
            'email' => 'zan_sheaf@freespace.com',
            'password' => Hash::make('%y*U=E^aSu')
        ));

        User::create(array(
            'name' => 'Martha Kammerer',
            'email' => 'martha-kam@webmine.com',
            'password' => Hash::make('GuVyTARu*a')
        ));
    }

}
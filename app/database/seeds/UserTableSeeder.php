<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        User::create(array(
            'email' => 'martha-kam@yoho.com',
            'first_name' => 'Martha',
            'last_name' => 'Kammerer',
            'password' => Hash::make('GuVyTARu*a'),
            'activated' => true,
        ));

        User::create(array(
            'email' => 'acario_re@yoohoo.com',
            'first_name' => 'Acario',
            'last_name' => 'Renda',
            'password' => Hash::make('me3yTe(a-u'),
            'activated' => true
        ));

        User::create(array(
            'email' => 'an.mun@yahoo.com',
            'first_name' => 'Andre',
            'last_name' => 'Munos',
            'password' => Hash::make('a.yhYhy(A.'),
            'activated' => true
        ));

        User::create(array(
            'email' => 'shavonn_geh@webmail.com',
            'first_name' => 'Shavonne',
            'last_name' => 'Gehrke',
            'password' => Hash::make('y2Eby~U)U~'),
            'activated' => true
        ));

    }

}
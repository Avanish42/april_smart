<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->delete();
        DB::table('users')->insert(array(
            array('name'=>'admin','email'=>'admin@aquad.com','password'=>bcrypt('123456')),
            array('name'=>'manager','email'=>'manager@aquad.com','password'=>bcrypt('123456') ),
            array('name'=>'cash','email'=>'cash@aquad.com','password'=>bcrypt('123456')),
            array('name'=>'godown','email'=>'godown@aquad.com','password'=>bcrypt('123456') ),
            array('name'=>'operator','email'=>'operator@aquad.com','passowrd'=>bcrypt('123456')),
            array('name'=>'field', 'email'=>'field@aquad.com','password'=>bcrypt('123456') ),
            array('name'=>'field1','email'=>'field1@aquad.com','password'=>bcrypt('123456') ),
            array('name'=>'field2','email'=>'field2@aquad.com','password'=>bcrypt('123456') ),
            array('name'=>'field3','email'=>'field3@aquad.com','password'=> bcrypt('123456')),

        ));

    }
}

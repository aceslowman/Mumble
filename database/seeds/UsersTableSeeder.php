<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 User::create([
			 'name' => 'Austin Slominski',
			 'avatar_filename' => 'img/avatars/slominski_avatar.jpg',
             'email' => 'aceslowman@gmail.com',
             'nick' => 'aceslowman',
             'status' => 'Available for film work',
             'available' => 1,
			 'password' => bcrypt('test'),
		 ]);
         User::create([
             'name' => 'Jonah Hill',
             'avatar_filename' => 'img/avatars/jonah_avatar.jpg',
             'email' => 'jonahhill@gmail.com',
             'nick' => 'jonah',
             'status' => "I'm a celebrity.",
             'available' => 0,
             'password' => bcrypt('test'),
         ]);
         User::create([
             'name' => 'Sarah Korn',
             'avatar_filename' => 'img/avatars/sarah_avatar.jpg',
             'email' => 'sarahkorn15@gmail.com',
             'nick' => 'sarko',
             'status' => "I'm Sarah Korn",
             'available' => 1,
             'password' => bcrypt('test'),
         ]);
         User::create([
             'name' => 'Bobby Tables',
             'avatar_filename' => 'img/avatars/bobby_avatar.jpg',
             'email' => 'bobbytables@gmail.com',
             'nick' => 'sqlinjector',
             'status' => 'Available to destroy your db',
             'available' => 0,
             'password' => bcrypt('test'),
         ]);
         User::create([
             'name' => 'Bart Noname',
             'avatar_filename' => 'img/avatars/bart_avatar.jpg',
             'email' => 'bartnoname@gmail.com',
             'nick' => 'nameless',
             'status' => 'My parents never named me',
             'available' => 1,
             'password' => bcrypt('test'),
         ]);       

        $user = User::find(1);    //Austin
        $user->tags()->attach(1);
        $user->tags()->attach(2);
        $user->tags()->attach(4);
        $user->tags()->attach(5);

        $user = User::find(2);    //Jonah
        $user->tags()->attach(3);
        $user->tags()->attach(4);
        $user->tags()->attach(5);

        $user = User::find(3);    //Sarah
        $user->tags()->attach(3);
        $user->tags()->attach(1);
        $user->tags()->attach(2);                                 
    }
}

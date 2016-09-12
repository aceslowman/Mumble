<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Tag;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /////////////////////////////////////////////////////////////////   

		 User::create([
			 'name' => 'Austin Slominski',
			 'avatar_filename' => 'd6569622db2d79726253ed75d6316282.jpg',
             'email' => 'guest@example.com',
             'nick' => 'aceslowman',
             'status' => 'Available for film work',
             'available' => 1,
			 'password' => bcrypt('test'),
		 ]);     

        $user = User::find(1);
        $user->tags()->attach(Tag::create(['name' => 'Programming']));
        $user->tags()->attach(Tag::create(['name' => 'Live Visuals']));
        $user->tags()->attach(Tag::create(['name' => 'Guitar']));   

        /////////////////////////////////////////////////////////////////   

        User::create([
             'name' => 'Joey Hunter',
             'avatar_filename' => '2b7fcfb297c9396f684591834283df89.jpg',//
             'email' => 'joeyhunter@example.com',
             'nick' => 'joeyhunter',
             'status' => 'Busy building with arduino!',
             'available' => 0,
             'password' => bcrypt('test'),
        ]);     

        $user = User::find(2); 
        $user->tags()->attach(Tag::create(['name' => 'Electronics']));
        $user->tags()->attach(Tag::create(['name' => 'Arduino']));
        $user->tags()->attach(Tag::create(['name' => 'Live Sound']));

        /////////////////////////////////////////////////////////////////

        User::create([
             'name' => 'Alyssa Wong',
             'avatar_filename' => '7fdf701f1ccffa59d853f588c46fdca9.jpg',//
             'email' => 'alyssawong@example.com',
             'nick' => 'alyssawong',
             'status' => 'Looking for help recording my EP',
             'available' => 1,
             'password' => bcrypt('test'),
        ]);     

        $user = User::find(3); 
        $user->tags()->attach(Tag::create(['name' => 'Voice']));
        $user->tags()->attach(Tag::create(['name' => 'Piano']));
        $user->tags()->attach(Tag::create(['name' => 'Woodworking']));

        /////////////////////////////////////////////////////////////////

        User::create([
             'name' => 'Jessie Morales',
             'avatar_filename' => '0d2376f9a1b19dcc73a0232b262ee467.jpg',//
             'email' => 'jessiemorales@example.com',
             'nick' => 'jessiemorales',
             'status' => 'Wanting to get better with photography',
             'available' => 1,
             'password' => bcrypt('test'),
        ]);     

        $user = User::find(4); 
        $user->tags()->attach(Tag::create(['name' => 'Photography']));
        $user->tags()->attach(Tag::create(['name' => 'Screenprinting']));
        $user->tags()->attach(Tag::create(['name' => 'Drawing']));

        /////////////////////////////////////////////////////////////////

        User::create([
             'name' => 'Charlene Casey',
             'avatar_filename' => '44b0542fb5d9f9008137a6dd61e5e196.jpg',
             'email' => 'charlenecasey@example.com',
             'nick' => 'charlenecasey',
             'status' => 'Studying synthesis',
             'available' => 0,
             'password' => bcrypt('test'),
        ]);     

        $user = User::find(5); 
        $user->tags()->attach(Tag::create(['name' => 'Guitar']));
        $user->tags()->attach(Tag::create(['name' => 'Voice']));
        $user->tags()->attach(Tag::create(['name' => 'Keys']));
    }
}

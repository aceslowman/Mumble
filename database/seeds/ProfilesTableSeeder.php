<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\Carousel;
use App\Photo;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Profile::create([
			'profileable_id' => 1,
			'profileable_type' => 'App\User',
			'info' => "<h2>Uuummmm, this is a tasty burger!</h2>
 							<p>Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case, it don't belong to me. Besides, I've already been through too much shit this morning over this case to hand it over to your dumb ass. </p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		
		Profile::find(1)->carousel()->save($carousel);
		
		$carousel = Carousel::where('profile_id',1)->first();
		
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => '994899ce6c045eb7c2d9c53462fa2a7d.jpg']),
			new App\Photo(['filename' => '9104dcb95bf2ed1a055835e09124efff.jpg']),
			new App\Photo(['filename' => '8b1b43a92c1c6a8f4a4196b9ab3d13b3.jpg']),
		]);

		Profile::create([
			'profileable_id' => 2,
			'profileable_type' => 'App\User',
			'info' => 'aceslowman@gmail.com',
			'show-info' => 1,
			'show-status' => 1,
		]);
		Profile::create([
			'profileable_id' => 3,
			'profileable_type' => 'App\User',
			'info' => 'aceslowman@gmail.com',
			'show-info' => 1,
			'show-status' => 1,
		]);
		Profile::create([
			'profileable_id' => 4,
			'profileable_type' => 'App\User',
			'info' => 'aceslowman@gmail.com',
			'show-info' => 1,
			'show-status' => 1,
		]);
		Profile::create([
			'profileable_id' => 5,
			'profileable_type' => 'App\User',
			'info' => 'aceslowman@gmail.com',
			'show-info' => 1,
			'show-status' => 1,
		]);


    }
}

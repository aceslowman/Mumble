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
			'info' => "<h2>Programmer, sound designer, and visualist</h2>
 							<p>I'm an artist based in Missoula, MT, looking to make audiovisual work. I spent time in college at the University of Montana studying music composition before I moved more towards sound design, programming, and visual arts, graduating with a BFA in Sonic Arts.</p>
 							<p>
 							I'm working on Mumble (or whatever it'll be called by the time it's released) because I know so many incredible artists in my town that have so much to offer through collaboration. My own art has been helped time after time by friends with certain skills, certain gear, and I know that we can all accomplish so much more working together than we ever could working alone. If you need help recording the drums to your album, if you need help with printing t-shirts for your bands first tour, I want this site to be a place where you can find that help, and offer help of your own. 
 							</p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		Profile::find(1)->carousel()->save($carousel);
		$carousel = Carousel::where('profile_id',1)->first();
	
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => '84b013874c430d85f460d46ce3a60c7b.jpg']),
			new App\Photo(['filename' => '2989937a6c4efa57ddd13c7832871e68.jpg']),
			new App\Photo(['filename' => 'df03b7b8557608e9159132e05539da10.jpg']),
		]);

		/////////////////////////////////////////////////////////////////  

		Profile::create([
			'profileable_id' => 2,
			'profileable_type' => 'App\User',
			'info' => "<h2>Lorem ipsum dolor sit amet</h2>
 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 							<p>
 							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 							</p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		Profile::find(2)->carousel()->save($carousel);
		$carousel = Carousel::where('profile_id',2)->first();
	
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => '1109da981439b8d6b00a2e14cfccab2b.jpg']),
			new App\Photo(['filename' => '9d7114ade37cd7a0c36aa98a5fbeb2a9.jpg']),
			new App\Photo(['filename' => '34fffb9dbbc48959ccd124576e0e99c0.jpg']),
		]);

		/////////////////////////////////////////////////////////////////  

		Profile::create([
			'profileable_id' => 3,
			'profileable_type' => 'App\User',
			'info' => "<h2>Lorem ipsum dolor sit amet</h2>
 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 							<p>
 							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 							</p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		Profile::find(3)->carousel()->save($carousel);
		$carousel = Carousel::where('profile_id',3)->first();
	
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => '1c14022a0a2182e8e97a3c0d52cbd7a7.jpg']),
			new App\Photo(['filename' => '6bf0f7241271b154c3ab737d6ad77107.jpg']),
			new App\Photo(['filename' => '6f762c7add1dbfaca92a31da3119fd2e.jpg']),
		]);

		/////////////////////////////////////////////////////////////////  

		Profile::create([
			'profileable_id' => 4,
			'profileable_type' => 'App\User',
			'info' => "<h2>Lorem ipsum dolor sit amet</h2>
 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 							<p>
 							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 							</p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		Profile::find(4)->carousel()->save($carousel);
		$carousel = Carousel::where('profile_id',4)->first();
	
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => '2e64dba1323359fa7f1c88df9ccb165b.jpg']),
			new App\Photo(['filename' => '4f51b8554768386046e570ff56389f71.jpg']),
			new App\Photo(['filename' => 'fe4a733a6d441ab72726b27d03a67c25.jpg']),
		]);

		/////////////////////////////////////////////////////////////////  

		Profile::create([
			'profileable_id' => 5,
			'profileable_type' => 'App\User',
			'info' => "<h2>Lorem ipsum dolor sit amet</h2>
 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 							<p>
 							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 							</p>",
			'show-info' => 1,
			'show-status' => 1,
		]);	

		$carousel = new Carousel();
		Profile::find(5)->carousel()->save($carousel);
		$carousel = Carousel::where('profile_id',5)->first();
	
		$carousel->photos()->saveMany([
			new App\Photo(['filename' => 'ff9e0e12b7b69f18fc686585eb5aa925.jpg']),
			new App\Photo(['filename' => '0d8cb6900df6d081affdc2bd7eb63051.jpg']),
			new App\Photo(['filename' => 'c5e2f00455c4197ff2277ce0439cfdc5.jpg']),
		]);
    }
}

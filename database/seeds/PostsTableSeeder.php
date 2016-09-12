<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Post::create([
			'user_id' => 1,
			'post_type' => 2,
			'title' => 'First forum post',
			'body' => "                            <a href=''>
                                <img class='img-responsive' src='img/user_photos/large_34fffb9dbbc48959ccd124576e0e99c0.jpg'>
                            </a>
                                <h2>Skill tagging</h2>                
                                <p>This forum should be a place where anyone in a group can post an update to their projects, ask for feedback or critique, or find help. Soon, if a skill is tagged in the post, anyone that claims that tag on their own profile will be notified. For example, if someone says \"Hey, I need some help with #film for an upcoming event.\", a notification will go out to anyone in their local group that claims a film tag.</p>",
		]);

        Post::create([
            'user_id' => 2,
            'post_type' => 2,
            'title' => 'Lorem ipsum dolor sit amet',
            'body' => "                            <a href=''>
                                <img class='img-responsive' src='img/user_photos/large_2c813f3eb1aa3b06db612a9d8e4b7cb3.jpg'>
                            </a>
                                <h2>Lorem ipsum dolor sit amet</h2>                
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>",
        ]);
    }
}

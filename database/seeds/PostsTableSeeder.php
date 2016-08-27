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
			'title' => 'The first forum post',
			'body' => "                            <a href=''>
                                <img class='img-responsive' src='img/landscape_fullSize_2.jpg'>
                            </a>
                                <h2>This is a title</h2>                
                                <p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb. </p>",
		]);
        Post::create([
            'user_id' => 2,
            'post_type' => 2,
            'title' => 'The second forum post',
            'body' => "
                                <h2>Some other title</h2>                
                                <p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb. </p>",
        ]);
    }
}

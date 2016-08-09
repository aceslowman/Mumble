<?php

use Illuminate\Database\Seeder;
use App\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Guitar']);
        Tag::create(['name' => 'Programming']);
        Tag::create(['name' => 'Writing']);
        Tag::create(['name' => 'Composition']);
        Tag::create(['name' => 'Visuals']);
    }
}

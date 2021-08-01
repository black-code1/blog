<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis labore molestias quis odio velit unde est excepturi distinctio eius, expedita ad ipsam nulla! Maxime quisquam explicabo officiis consequuntur voluptates fugiat exercitationem, debitis vero! Minus quod, ipsum quibusdam eveniet similique odit?</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis labore molestias quis odio velit unde est excepturi distinctio eius, expedita ad ipsam nulla! Maxime quisquam explicabo officiis consequuntur voluptates fugiat exercitationem, debitis vero! Minus quod, ipsum quibusdam eveniet similique odit?</p>'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Status::create([
            'name' => 'draft'
        ]);
        Status::create([
            'name' => 'publish'
        ]);

        Category::create([
            'name' => 'Marketing',
            'slug' => 'marketing'
        ]);
        Category::create([
            'name' => 'Business Development',
            'slug' => 'business-development'
        ]);
        Category::create([
            'name' => 'Finance',
            'slug' => 'finance'
        ]);
        Category::create([
            'name' => 'Human Resource',
            'slug' => 'human-resource'
        ]);
        Category::create([
            'name' => 'Support',
            'slug' => 'support'
        ]);

        Post::factory(30)->create();

        Comment::factory(60)->create();
    }
}

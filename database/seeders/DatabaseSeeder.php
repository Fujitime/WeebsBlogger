<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Fuji Halim Rabbani',
        //     'email' => 'fuji@gmail.com',
        //     'password' => bcrypt('rahasiabro'),
        // ]);
        User::create([
            'name' => 'Fuji Halim Rabbani',
            'username' => 'Fuhara',
            'email' => 'racun1601@gmail.com',
            'password' => bcrypt('rahasia123451601121301015'),
        ]);

        User::factory(3)->create();
        Category::create([
            'name'=> "Web programming",
            'slug'=> "Web programming",
        ]);
        Category::create([
            'name'=> "Anime",
            'slug'=> "Anime",
        ]);
        Category::create([
            'name'=> "Personal",
            'slug'=> "Pesonal",
        ]);

        Post::factory(20)->create();
    }
}

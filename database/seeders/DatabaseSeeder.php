<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        $this->call(RoleSeeder::class);
        //User::factory(2)->create();

        User::factory()->create([
            'name' => 'Joshua Mclean',
            'email' => 'joshua15mclean@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole(['Admin']);

        // Category::factory(4)->create();
        // Tag::factory(8)->create();
        // $this->call(PostSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for calling the BlogSeeder 
        // $this->call(BlogsSeeder::class);

        // create 3 rows namely tech lifestyl and business
        $categories = ['technology', 'lifestyle', 'business'];
        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category]);
        }
        
        // para magcreate ng 2 rows with only active and inactive
        $statuses = ['active', 'inactive'];
        foreach ($statuses as $status) {
            Status::updateOrCreate(['status' => $status]);
        }

        Blog::factory(50)->create();
    }
}

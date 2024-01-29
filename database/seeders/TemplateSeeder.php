<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\User;
use App\Models\Category;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Assuming you have at least 3 users and 3 categories in your database
        $users = User::pluck('id');
        $categories = Category::pluck('id');
    
        // Check if there are users and categories available
        if ($users->isEmpty() || $categories->isEmpty()) {
            // Handle the case where there are no users or categories available
            $this->command->info('No users or categories available. Please seed users and categories first.');
            return;
        }
    
        // Generate 10 sample templates
        for ($i = 1; $i <= 10; $i++) {
            Template::create([
                'user_id' => $users->random(),
                'category_id' => $categories->random(),
                'header' => "Template $i Header",
                'banner' => "banner_$i.jpg",
                'logo' => "logo_$i.jpg",
            ]);
        }
    
        $this->command->info('Templates seeded successfully.');
    }    
}

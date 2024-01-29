<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Description;
use App\Models\Template;

class DescriptionSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have at least 5 templates in your database
        $templates = Template::pluck('id');

        // Generate 10 sample descriptions
        for ($i = 1; $i <= 10; $i++) {
            Description::create([
                'temp_id' => $templates->random(),
                'text' => "Description $i",
            ]);
        }
    }
}

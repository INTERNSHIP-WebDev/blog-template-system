<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Title;
use App\Models\Template;

class TitleSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have at least 5 templates in your database
        $templates = Template::pluck('id');

        // Generate 10 sample titles
        for ($i = 1; $i <= 10; $i++) {
            Title::create([
                'temp_id' => $templates->random(),
                'text' => "Title $i",
            ]);
        }
    }
}


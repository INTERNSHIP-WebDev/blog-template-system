<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subtitle;
use App\Models\Template;

class SubtitleSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have at least 5 templates in your database
        $templates = Template::pluck('id');

        // Generate 10 sample subtitles
        for ($i = 1; $i <= 10; $i++) {
            Subtitle::create([
                'temp_id' => $templates->random(),
                'text' => "Subtitle $i",
            ]);
        }
    }
}


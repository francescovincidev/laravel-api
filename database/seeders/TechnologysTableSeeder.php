<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologys = ['html & css', 'bootstrap', 'javascript', 'vue', 'php', 'laravel'];
        foreach ($technologys as $technology_value) {
            $new_technology = new Technology;
            $new_technology->name = $technology_value;
            $new_technology->slug = Str::slug($technology_value);
            $new_technology->save();
        }
    }
}

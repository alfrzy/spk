<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\Schedule;
use App\Models\Report;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Area::factory(10)->create();
        Schedule::factory(5)->create();
        Report::factory(3)->create();
    }
}

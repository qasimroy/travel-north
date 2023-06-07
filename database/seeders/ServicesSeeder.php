<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        Service::create(['name' => 'Tour(Tour Includes all services)']);
        Service::create(['name' => 'Hotel']);
        Service::create(['name' => 'Coach']);
        Service::create(['name' => 'Shuttle']);
    }
}

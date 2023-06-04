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
        Service::create(['name' => 'Cab Booking']);
        Service::create(['name' => 'Some Service']);
    }
}

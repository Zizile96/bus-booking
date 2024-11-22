<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    // LocationSeeder
public function run()
{
    DB::table('locations')->insert([
        ['name' => 'Johannesburg'],
        ['name' => 'Cape Town'],
        ['name' => 'Durban'],
        ['name' => 'Pretoria'],
        ['name' => 'Port Elizabeth'],
    ]);

    // Example routes with departure times
    DB::table('routes')->insert([
        ['from' => 'Johannesburg', 'to' => 'Cape Town', 'departure_time' => '08:00:00'],
        ['from' => 'Johannesburg', 'to' => 'Cape Town', 'departure_time' => '12:00:00'],
        ['from' => 'Johannesburg', 'to' => 'Durban', 'departure_time' => '09:00:00'],
        ['from' => 'Cape Town', 'to' => 'Durban', 'departure_time' => '15:00:00'],
        ['from' => 'Pretoria', 'to' => 'Cape Town', 'departure_time' => '10:00:00'],
        ['from' => 'Port Elizabeth', 'to' => 'Durban', 'departure_time' => '16:00:00'],
    ]);
}
}


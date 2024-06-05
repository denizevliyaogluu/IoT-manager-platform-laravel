<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeviceData;
use App\Models\Devices;
use Faker\Factory as Faker;

class DeviceDataSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $devices = Devices::all();

        foreach ($devices as $device) {
            foreach (range(1, 50) as $index) {
                DeviceData::create([
                    'device_id' => $device->uniqid,
                    'temperature' => $faker->randomFloat(2, 10, 35),
                    'humidity' => $faker->randomFloat(2, 40, 90),
                    'soil_moisture' => $faker->randomFloat(2, 10, 60),
                ]);
            }
        }
    }
}

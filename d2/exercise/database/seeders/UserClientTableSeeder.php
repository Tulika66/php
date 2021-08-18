<?php

namespace Database\Seeders;

use App\Models\UserClient;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserClient::truncate();

        $faker = Factory::create();

        // And now, let's create a few UserClient in our database:
        for ($i = 0; $i < 50; $i++) {
            UserClient::create([
                'name' => $faker->sentence,
                'surname' => $faker->sentence,
            ]);
        }
    }
}

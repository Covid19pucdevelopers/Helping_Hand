<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class ReliefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index)
        {
            DB::table('reliefs')->insert([
            'division_id' => $faker->numberBetween(1,20),
            'district_id' => $faker->numberBetween(1,20),
            'area_id' => $faker->numberBetween(1,20),
            'address' => $faker->address,
            'nid' => $faker->numberBetween(123456789101,123456789102),
            'members_in_family' => $faker->numberBetween(1,10),
            'earning_members' => $faker->numberBetween(1,5),
            'image' => $faker->imageUrl($width = 200, $height = 200), //image('images/default.jpg'),
            'lat' => $faker->numberBetween(1,100),
            'long' => $faker->numberBetween(1,100),
            'contact_no' => $faker->numberBetween(10234567890,10234567891),
            'date_given' => $faker->date(),
            'given_by' => $faker->randomDigit,
            'given_to' => $faker->randomDigit,
            ]);
        }
        
    }
}

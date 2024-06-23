<?php

namespace Database\Seeders;

use App\Models\receiver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();

        foreach(range(1,6) as $index){
            receiver::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->safeEmail
            ]);
        }
    }
}

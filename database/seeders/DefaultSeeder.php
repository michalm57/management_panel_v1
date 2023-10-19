<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\DietPreference;
use App\Models\Employee;
use App\Models\PhoneNumber;
use Faker\Factory as Faker;

class DefaultSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Company::create([
                'name' =>  ucfirst($faker->unique()->words(2, true)),
            ]);

            DietPreference::create([
                'preference' =>  ucfirst($faker->unique()->words(2, true)),
            ]);

            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
            ]);

            PhoneNumber::create([
                'number' => $faker->phoneNumber,
            ]);
        }
    }
}
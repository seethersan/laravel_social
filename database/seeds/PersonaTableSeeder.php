<?php

use Illuminate\Database\Seeder;
use ucsp\User;
use ucsp\Persona;
use Illuminate\Support\Facades\Hash;

class PersonaTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $password = Hash::make('123456');

        for ($i = 0; $i < 20; $i++) {
            $email = $faker->email;
            $firstname = $faker->firstNameMale;
            $lastname = $faker->lastName;
            User::create([
                'name' => $firstname.' '.$lastname,
                'email' => $email,
                'password' => $password,
            ]);
            Persona::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password,
                'birthdate' => $faker->date(),
                'gender' => "Male",
                'city' => "Arequipa",
                'pais' => 'PER',
                'description' => $faker->sentence,
                'slug' => $firstname.'-'.$lastname,
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            $email = $faker->email;
            $firstname = $faker->firstNameFemale;
            $lastname = $faker->lastName;
            User::create([
                'name' => $firstname.' '.$lastname,
                'email' => $email,
                'password' => $password,
            ]);
            Persona::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password,
                'birthdate' => $faker->date(),
                'gender' => "Female",
                'city' => "Lima",
                'pais' => 'PER',
                'description' => $faker->sentence,
                'slug' => $firstname.'-'.$lastname,
            ]);
        }
    }
}

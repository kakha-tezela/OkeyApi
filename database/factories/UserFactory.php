<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(App\User::class, function (Faker\Generator $faker) {
    

    return [

        "person_status" => "I",
		"firstname" => $faker->name,
		"lastname"	=> $faker->name,
		"citizenship" => mt_rand(1,3),
		"gender"	=> mt_rand(1,2),
		"birth_date" => Carbon\Carbon::now(),
		"reg_address" => str_random(23),
		"phys_address" => str_random(23),
		"city_id" => mt_rand(1,2),
		"phone" => mt_rand(678243890,837222221),
		"pid_number" => str_random(23),
		"personal_id" => mt_rand(1,222222245),
		'email' => $faker->unique()->safeEmail,
		"username" => str_random(23),
		'password' => bcrypt('secret'),
		"company_id" => mt_rand(1,2),
		"social_id"  => mt_rand(1,2),
		"politic_person" => 0,
		"work_place" => str_random(23),
		"salary_id" => 5,
		"balance" => mt_rand(10,300),
		"status" => 1,

    ];
});









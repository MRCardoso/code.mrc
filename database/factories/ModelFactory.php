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

$factory->define(CodeMRC\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeMRC\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'observation' => $faker->sentence,
    ];
});

$factory->define(CodeMRC\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
        'progress' => $faker->numberBetween(0,4),
        'status' => $faker->numberBetween(0,1),
        'due_date' => $faker->date(),
        'owner_id' => rand(1,10),
        'client_id' => rand(1,10),
    ];
});
$factory->define(CodeMRC\Entities\ProjectTask::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'project_id' => rand(1,10),
        'start_date' => $faker->date(),
        'due_date' => NULL,
        'status' => rand(1,0)
    ];
});
$factory->define(CodeMRC\Entities\ProjectMembers::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1,10),
        'project_id' => rand(1,10),
    ];
});
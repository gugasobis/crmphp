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

$factory->define(CrmResult\Models\User::class, function ($faker) {
    return [
        'full_name' => $faker->name,
        'login' => $faker->username,
        'password' => str_random(10),
        'changed_password' => $faker->boolean($chanceOfGettingTrue = 50),
        'inactive' => $faker->boolean($chanceOfGettingTrue = 50),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CrmResult\Models\Employee::class, function ($faker) {
    return [
        'user_id' =>  $faker->numberBetween($min=1, $max =9),
        'salary' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'charges' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'cpf' => $faker->randomNumber(),
        'rg' => $faker->randomNumber(),
        'address' => $faker->streetName(),
        'number_address' => $faker->buildingNumber(),
        'neighborhood' => $faker->citySuffix(),
        'city' => $faker->city(),
        'uf' => $faker->state(),
        'cep' => $faker->randomNumber(5)+"-"+$faker->randomNumber(3),
        'email' => $faker->email,
        'benefits' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
    ];
});

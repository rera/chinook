<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Beer;
use Faker\Generator as Faker;

$factory->define(Beer::class, function (Faker $faker) {
    $styles = [ 'IPA', 'Pilsner', 'Lager', 'Kolsch', 'Ale', 'Red', 'Stout', 'Brown'];

    return [
      'name' => substr($faker->sentence(2), 0, -1),
      'brewery' => substr($faker->sentence(2), 0, -1),
      'style' => $styles[ array_rand($styles) ]
    ];
});

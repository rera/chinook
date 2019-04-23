<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Beer;
use Faker\Generator as Faker;

$factory->define(Beer::class, function (Faker $faker) {
    $dummy = [
      'styles' => [ 'IPA', 'Pilsner', 'Lager', 'Kolsch', 'Ale', 'Red', 'Stout', 'Brown Ale', 'New England IP'],
      'breweries' => [ 'Funky Buddha Brewery', 'Islamorada Brewing', 'Florida Keys Brewing Co.', 'Kauai Beer Co.', 'Tequesta Brewing Company', 'Twisted Trunk Brewing', 'MIA Brewing', 'Terrapin Beer Co.' ]
    ];

    return [
      'name' => implode([
        substr($faker->sentence(1), 0, -1),
        $dummy['styles'][ array_rand($dummy['styles']) ]
      ], " "),
      'brewery' => $dummy['breweries'][ array_rand($dummy['breweries']) ]
    ];
});

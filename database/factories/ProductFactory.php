<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use App\Models\Company;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'company_id' => factory(Company::class),//外部キーを参照
        'product_name' => $faker->word(),
        'price' => $faker->numberBetween(100,1000),
        'stock' => $faker->numberBetween(1,100),
        'comment' => $faker->realtext(),
        'img_path' => $faker->sentence(),
    ];
});

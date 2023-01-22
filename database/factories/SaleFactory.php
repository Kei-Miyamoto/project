<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'product_id' => factory(Product::class),//外部キーを参照
    ];
});

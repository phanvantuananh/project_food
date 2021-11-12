<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();
         Orders::factory(10)->create();
         Category::factory(10)->create();
         Product::factory(10)->create();
         OrderItem::factory(10)->create();
         Rating::factory(10)->create();
    }
}

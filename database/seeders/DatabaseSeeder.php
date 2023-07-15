<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Like;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {


            Product::factory(10)
                ->create([
                    'user_id' => $user->id
                ])->each(function (Product $product) use ($user) {
                    foreach (range(1, rand(5, 40)) as $item) {
                        $product->likes()->create([
                            'user_id' => $user->id,
                            'created_at' => Carbon::now()->subDays(rand(1, 100))
                        ]);
                    }
                    foreach (range(1, rand(5, 40)) as $item) {
                        $product->views()->create([
                            'user_id' => $user->id,
                            'created_at' => Carbon::now()->subDays(rand(1, 100))
                        ]);
                    }
                });


            $order = Order::factory()->create(['user_id' => $user->id]);
            OrderItem::factory(2)->create([
                'order_id' => $order->id,
                'product_id' => Product::inRandomOrder()->first()->id
            ]);


        });
    }
}

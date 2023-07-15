<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
//        $query = Product::withCount(['views', 'likes'])
//            ->orderBy('views_count', 'desc')
//            ->limit(7)
//            ->get();
//
//        $query = Product::withCount(['likes'])
//            ->whereDate('created_at', '<=', Carbon::now())
//            ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
//            ->orderBy('likes_count', 'desc')
//            ->limit(4)
//            ->get();


//        $query = Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) {
//                    $query->select(DB::raw("SUM(qty*price) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum','desc')
//            ->limit(5)
//            ->get();
        $user = User::find(1);
//        Order::query()->where('user_id',$user->id)->items()->

//        $query=Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) use($user) {
//                    $query->whereHas('order',function ($query) use($user){
//                            $query->where('user_id',$user->id);
//                        })
//                        ->select(DB::raw("SUM(qty) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum','desc')
//            ->limit(10)
//            ->get();


        $query = Product::query()
            ->whereHas('orderItems', function ($query) use ($user) {
                $query->whereHas('order', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })
            ->withCount(['orderItems'=>function ($query) use ($user){
                $query->whereHas('order', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            }])
            ->limit(4)
            ->get();

        dd($query->toArray());

        $this->assertTrue(true);
    }
}

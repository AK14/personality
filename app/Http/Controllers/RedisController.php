<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function test(){
        $redis = Redis::connection();

        $test = Redis::get('name');

        dd($test);
//        $values = Redis::command('lrange',['name',5,10]);
//        dump($values);
       /* Redis::transaction(function ($redis){
            $redis->incr('user_visits', 1);
            $redis->incr('total_visits', 1);
        });*/
    }

    public function show(Request $request)
    {
        $value = $request->session()->all();
        dump($value);
        dump( session('key'));

        //
    }
}

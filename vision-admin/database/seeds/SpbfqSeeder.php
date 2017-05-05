<?php

use Illuminate\Database\Seeder;

class SpbfqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('spbfqs')->delete();

        for ($i=0; $i < 10; $i++) {
            \App\Spbfq::create([
                'comment_place'   => '安卓商城2'.$i,
                'comment'  => '好'.$i,
                'score' => 3,
                'comment_time'=>Date(0),
            ]);
        }
    }
}


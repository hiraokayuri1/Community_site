<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
       DB::table('tasks')->insert([
       'name' => "ゆり {$num}",
       'user_id' => "1",
       'title' => "交通費作成 {$num}",
       'item' => "仕事 {$num}",
       'body' => "仕事です。 {$num}",
       'due_date' => Carbon::now()->addDay($num),
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now(),
     ]);
    }
}



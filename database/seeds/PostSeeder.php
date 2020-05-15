<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
        	['user_id' => 1,'title' => "Post One",'content' => "This one post story"],
        	['user_id' => 1,'title' => "Post One",'content' => "This two post story"], 
        	['user_id' => 1,'title' => "Post One",'content' => "This three post story"],

        ]);
    }
}

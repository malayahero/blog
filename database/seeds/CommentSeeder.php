<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('comments')->insert([
        	['user_id' => 1,'post_id' => 1,'content' => "This one post story"],
        	['user_id' => 1,'post_id' => 1,'content' => "This two post story"], 
        	['user_id' => 1,'post_id' => 1,'content' => "This three post story"],
        ]);
    }
}

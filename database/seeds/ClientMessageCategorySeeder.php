<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;

class ClientMessageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Client_Message]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Client Message',
                'tags' => 'Client Message',
                'code' => 'CM-001',
                'description' => 'Client Message',
                'post_type' => PostType::Client_Message,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

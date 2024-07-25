<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;

class ClientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Client]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Client',
                'tags' => 'Client',
                'code' => 'CL-001',
                'description' => 'Client',
                'post_type' => PostType::Client,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

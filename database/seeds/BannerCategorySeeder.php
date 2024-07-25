<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;

class BannerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Banner]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Banner',
                'tags' => 'Banner',
                'code' => 'BA-001',
                'description' => 'Banner',
                'post_type' => PostType::Banner,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

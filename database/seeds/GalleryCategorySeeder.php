<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Gallery]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Gallery',
                'tags' => 'Gallery',
                'code' => 'G-001',
                'description' => 'Gallery',
                'post_type' => PostType::Gallery,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Notice]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Notice',
                'tags' => 'Notice',
                'code' => 'N-001',
                'description' => 'Notice',
                'post_type' => PostType::Notice,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

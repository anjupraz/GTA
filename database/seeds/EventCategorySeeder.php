<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Event]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Event',
                'tags' => 'Event',
                'code' => 'E-001',
                'description' => 'Event',
                'post_type' => PostType::Event,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

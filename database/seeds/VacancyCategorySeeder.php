<?php

use App\Enums\PostType;
use Illuminate\Database\Seeder;

class VacancyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( DB::table('categories')->where([['post_type',PostType::Vacancy]])->count() == 0){
            DB::table('categories')->insert([
                'title' => 'Vacancy',
                'tags' => 'Vacancy',
                'code' => 'V-001',
                'description' => 'Vacancy',
                'post_type' => PostType::Vacancy,
                'featured' => true,
                'status' => true
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BannerCategorySeeder::class);
        $this->call(NoticeCategorySeeder::class);
        $this->call(EventCategorySeeder::class);
        $this->call(GalleryCategorySeeder::class);
        $this->call(ClientCategorySeeder::class);
        $this->call(ClientMessageCategorySeeder::class);
        $this->call(VacancyCategorySeeder::class);
    }
}

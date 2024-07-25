<?php

use Illuminate\Database\Seeder;
use App\Enums\UserType;
use App\Enums\GenderType;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if( DB::table('users')->count() == 0){
            DB::table('users')->insert([
                'name' => 'Pratik',
                'email' => 'pmjcse@gmail.com',
                'password' => bcrypt('123456'),
                'status' => 1,
                'role' => UserType::Admin,
                'gender' => GenderType::Male,
                'contact' => '9841740940',
                'country' => 'Nepal',
                'email_verified_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}

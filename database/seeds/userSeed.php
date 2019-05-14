<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();

        $user = \App\User::create( [
            'id'=>1,
            'name'=>'Moh Minhajul M',
            'email'=>'admin@minhajul.com',
            'password'=>encrypt('12345678'),
            'remember_token'=>NULL,
            'created_at'=>'2019-01-14 06:35:28',
            'updated_at'=>'2019-01-14 06:35:28'
            ]);
        $user->role()->attach([1,2]);
    }
}

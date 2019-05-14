<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class trackUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i = 0;
        DB::table('track_user')->truncate();
        $faker = Faker::create();
        while($i < 20){
            App\Model\trackUser::create([
                'topik_id'=>rand(1,9),
                'user_id' => rand(1,2),
                'score' => rand(50,100)
            ]);
            $i++;
        }
    }
}

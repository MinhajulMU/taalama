<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class topikSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('topik')->truncate();
        $faker = Faker::create();
        $i = 1;
        while($i < 10){
            App\Model\Topik::create([
                'nama_topik'=>$faker->sentence,
                'icon' => $faker->sentence,
                'deskripsi' => $faker->text
            ]);
            $i++;
        }
    }
}

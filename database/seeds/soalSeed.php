<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class soalSeed extends Seeder
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
        DB::table('soal')->truncate();
        $faker = Faker::create();
        while($i < 45){
            App\Model\Soal::create([
                'topik_id'=>rand(1,9),
                'title' => $faker->sentence
            ]);
            $i++;
        }
    }
}

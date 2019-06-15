<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class optionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('option')->truncate();
        $faker = Faker::create();
        $soal = \App\Model\Soal::all();
        
        foreach ($soal as $key) {
            # code...
            $i = 1;
            while($i < 4){
                App\Model\Option::create([
                    'soal_id'=>$key->id,
                    'title' => $faker->sentence,
                    'icon' => $faker->sentence,
                    'is_true' => $i%3 == 0? 1: 0
                ]);
                $i++;
            }
        }

    }
}

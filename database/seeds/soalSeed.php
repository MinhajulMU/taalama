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
        
        DB::table('soal')->truncate();
        $faker = Faker::create();
        $topik = \App\Model\Topik::all();
        foreach ($topik as $key) {
            # code...
            $i = 1;
            while($i < 6){
                App\Model\Soal::create([
                    'topik_id'=>$key->id,
                    'title' => $faker->sentence
                ]);
                $i++;
            }
        }

    }
}

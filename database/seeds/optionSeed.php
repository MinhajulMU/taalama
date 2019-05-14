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
        $i = 0;
        DB::table('option')->truncate();
        $faker = Faker::create();
        while($i < 9){
            App\Model\Option::create([
                'soal_id'=>rand(1,50),
                'title' => $faker->sentence,
                'icon' => $faker->sentence,
            ]);
            $i++;
        }
    }
}

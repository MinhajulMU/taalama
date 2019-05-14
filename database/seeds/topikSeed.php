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
        $i = 0;
        DB::table('topik')->truncate();
        $faker = Faker::create();
        while($i < 9){
            App\Model\Topik::create([
                'nama_topik'=>$faker->sentence,
                'icon' => $faker->sentence,
                'deskripsi' => $faker->text
            ]);
            $i++;
        }
    }
}

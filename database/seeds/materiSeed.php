<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class materiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('materi')->truncate();
        $i = 0;
        $faker = Faker::create();
        while($i < 9){
            App\Model\Materi::create([
                'topik_id'=>rand(1,9),
                'title' => $faker->sentence,
                'content' => $faker->text,
                'slug'=> strtolower(str_replace(" ","-",$faker->sentence))
            ]);
            $i++;
        }
    }
}

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
        $faker = Faker::create();
        $topik = \App\Model\Topik::all();
        foreach ($topik as $key) {
            # code...
            App\Model\Materi::create([
                'topik_id'=>$key->id,
                'title' => $faker->sentence,
                'content' => $faker->text,
                'slug'=> strtolower(str_replace(" ","-",$faker->sentence))
            ]);
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(topikSeed::class);
         $this->call(materiSeed::class);
         $this->call(soalSeed::class);
         $this->call(optionSeed::class);
         $this->call(roleSeed::class);
         $this->call(trackUserSeed::class);
         $this->call(userSeed::class);
    }
}

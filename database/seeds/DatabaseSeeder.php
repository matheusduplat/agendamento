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
         $this->call(status::class);
         $this->call(area::class);
         $this->call(loja::class);
         $this->call(user::class);

    }
}

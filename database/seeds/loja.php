<?php

use Illuminate\Database\Seeder;

class loja extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loja')->insert([
            
            'id'=> '15',
            'nome' => '3M DEVELOPERS',
            'endereco' => 'Salvador',
                   
        ]);
    }
}

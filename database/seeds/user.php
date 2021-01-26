<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADM',
            'email' =>'adm@adm.com.br' ,
            'password' => Hash::make('adm123456'),
            'id_area' => '1',
            'id_loja' => '15',
            'tipo' => 'adm',
        ]);
    }
}

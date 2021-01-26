<?php

use Illuminate\Database\Seeder;


class status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            
            'id'=> '1',
            'nomeStatus' => 'Entregue',
                   
        ]);
        DB::table('status')->insert([
            
            'id'=> '2',
            'nomeStatus' => 'Não Entregue',
                   
        ]);
        DB::table('status')->insert([
            
            'id'=> '3',
            'nomeStatus' => 'Aguardando',
                   
        ]);


    }
}

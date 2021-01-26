<?php

use Illuminate\Database\Seeder;

class area extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
            
            'id'=> '1',
            'nome' => 'Seco/Embalagem',
                   
        ]);
        DB::table('area')->insert([
            
            'id'=> '2',
            'nome' => 'Frios/Congelados',
                   
        ]);
    }
}

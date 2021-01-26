<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agendar extends Model
{

    
    protected $table = 'agendar';
    protected $fillable = [
        'id',
       'volume_carga',
       'data',
        'fornecedor',
       'valor_nota',
       'id_users',
       'id_loja',
       'id_area',
       'status',
       'obsevacao',
       'time',
       'decarga_i',
       'decarga_f',

    ];
    public function relArea(){

return $this->hasOne('App\Area','id','id_area');

    }
    public function relStatus(){

        return $this->hasOne('App\status','id','status');
        
            }

    public function buscar(Array $data, $totalPage){

            return $this->where(function($query) use ($data){
                if(isset($data['fornecedor']))
                    $query->where('fornecedor','like','%'.$data['fornecedor'].'%');
                if(isset($data['data_i'],$data['data_f']))
                    $query->whereBetween('data',[$data['data_i'],$data['data_f']]);
                 if(isset($data['area']))
                    $query->where('id_area',$data['area']);
            
            })
            ->orderBy('data','DESC')
            ->paginate($totalPage);
           
            // ->toSql();dd($filtro);

        }

        public function agendados(Array $data){

            return $this->where(function($query) use ($data){
                if(isset($data['fornecedor']))
                    $query->where('fornecedor','like','%'.$data['fornecedor'].'%');
                    if(isset($data['data_i'],$data['data_f']))
                    $query->whereBetween('data',[$data['data_i'],$data['data_f']]);
                 if(isset($data['id_area']))
                    $query->where('id_area',$data['id_area']);
            
            })->get();
            

            // ->toSql();dd($filtro);

        }
    
}


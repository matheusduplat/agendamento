<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    //
    protected $table = 'fornecedor';
    protected $fillable = [
        
        'nome','cnpj',
     ];
     
 }


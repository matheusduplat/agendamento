<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $fillable = [
        'id',
        'name',
    ];

    public function user() {
        return $this->hasOne('App\User');
    }

}

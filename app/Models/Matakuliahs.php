<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliahs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mahasiswas()
    {
        return $this->hasMany('App\Models\Mahasiswas');
    }
}

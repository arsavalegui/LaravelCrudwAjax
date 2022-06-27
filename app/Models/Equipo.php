<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    use HasFactory;

    public function empleados(){
        return $this->belongsToMany(Empleado::class);
    }

}

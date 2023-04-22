<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    /* approved 4
    rejected 6
    Error 104
    Pending payment 7 */



    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    const REGISTRO = 1;
    const VIRTUAL = 2;
    const TANGIBLE = 3;

    const PTS_ASIGNAR = 1;
    const PTS_ASIGNADOS =2;
    const PTS_SUMADOS = 3;

    use HasFactory;

    protected $guarded= ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addPoints(){
        return $this->hasMany(Point::class);
    }
}

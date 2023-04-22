<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $fillable = [
        'user_id', 'status', 'max_rango', 'rango_actual', 'fecha_activacion', 'fecha_expiracion'
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
}

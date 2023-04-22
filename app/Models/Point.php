<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    const PENDIENTE = 1;
    const PAGO = 2;

    use HasFactory;

    protected $fillable = ['user_id', 'state', 'pts_left', 'pts_right'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

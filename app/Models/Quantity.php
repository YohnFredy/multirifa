<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $fillable = ['user_id', 'direct', 'unilevel', 'left', 'right'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

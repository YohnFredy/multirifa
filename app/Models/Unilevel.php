<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unilevel extends Model
{
    protected $fillable=['user_id', 'direct_id'];
    
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

}

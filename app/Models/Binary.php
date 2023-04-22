<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binary extends Model
{
    protected $fillable = ['user_id', 'direct_id', 'side'];

    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }
}

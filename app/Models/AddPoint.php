<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPoint extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sale_id', 'side'];
    

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

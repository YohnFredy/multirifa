<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'cedula',
        'email',
        'usuario',
        'sexo',
        'f_nacimiento',
        'country_id',
        'state_id',
        'city',
        'direccion',
        'telefono',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function unilevels(){
        return $this->hasMany(Unilevel::class);
    }

    public function binaries(){
        return $this->hasMany(Binary::class);
    }

    public function quantity(){
        return $this->hasOne(Quantity::class);
    }

    public function statu(){
        return $this->hasOne(State::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function addPoints(){
        return $this->hasMany(Point::class);
    }

    public function points(){
        return $this->hasMany(Point::class);
    }

    public function country(){
        return $this->hasOne(Country::class);
    }

}

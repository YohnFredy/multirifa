<?php

use App\Models\Binary;
use App\Models\Point;
use App\Models\User;


function user($id)
{
    $user = User::find($id);

    return $user;
}



/* class datos_user
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function user()
    {
        $this->user = User::find($this->user);

        $user = $this->user;

        return $user;
    }

    public function point()
    {
        $point = Point::where('user_id', $this->user)->where('state', 1)->first();
        return $point;
    }
} */

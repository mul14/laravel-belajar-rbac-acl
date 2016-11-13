<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

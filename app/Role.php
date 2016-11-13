<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'label'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        $permission = ! $permission instanceof Permission
            ? Permission::find($permission)
            : $permission;

        foreach($this->permissions as $value)
        {
            if ($value->id === $permission->id) return true;
        }

        return false;
    }
}

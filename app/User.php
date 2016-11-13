<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Check if a user has a role
     *
     * @param \App\Role|string|int  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_numeric($role)) {
            $role = Role::find($role);
        } elseif (is_string($role)) {
            $role = Role::where('name', $role)->first();
        } elseif ($role instanceof Role) {
            // Got it
        }

        if (!$role) return false;

        foreach($this->roles as $value)
        {
            if ($value->id === $role->id) return true;
        }

        return false;
    }

    /**
     * Check if user has a permission.
     *
     * @param \App\Permission|int  $permission
     * @return boolean
     */
    public function hasPermission($permission)
    {
        if (is_numeric($permission)) {
            $permission = Permission::find($permission);
        } elseif (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        } elseif ($permission instanceof Permission) {
            // Got it
        }

        if (!$permission) return false;

        foreach($this->permissions as $value)
        {
            if ($value->id === $permission->id) return true;
        }


        foreach($this->roles as $roles)
        {
            foreach($roles->permissions as $value) {
                if ($value->id === $permission->id) return true;
            }
        }

        return false;
    }

    /**
     * Check if user a super administrator.
     */
    public function isSuper()
    {
        foreach($this->roles as $role)
        {
            if ($role->name === 'super') return true;
        }

        return false;
    }
}

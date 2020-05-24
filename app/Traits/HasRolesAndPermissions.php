<?php
namespace App\Traits;

use App\Role;
use App\Permission;

/**
 *
 */
trait HasRolesAndPermissions
{

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions()
    {
        return $this->roles()->permissions();
    }

    public function hasRole($roles)
    {
      foreach ($roles as $role) {
        if ($this->roles->contains('slug', $role)) {
          return true;
        }
        return false;
      }
    }

    // public function hasPermissions(array $permissions)
    // {
    //   foreach ($permissions as $permission) {
    //     if ($this->permissions->contains('slug', $permission)) {
    //       return true;
    //     }
    //     return false;
    //   }
    // }

    // public function hasPermissionThroughRole($permission)
    // {
    //   // code...
    // }
}

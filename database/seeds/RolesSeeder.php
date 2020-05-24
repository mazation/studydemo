<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = config('roles');
      foreach ($roles as $role => $properties) {
        if (Role::where('slug', $role)->count() > 0) {
          $roleLine = Role::where('slug', $role)->first();
          $roleLine->permissions()->detach(Permission::all()->pluck('id'));
        } else {
          $roleLine = new Role();
        }
        $roleLine->slug = $role;
        $roleLine->name = $properties['name'];
        $permissions = Permission::whereIn('slug', $properties['permissions'])->pluck('id');
        $roleLine->save();
        $roleLine->permissions()->attach($permissions);
      }
    }
}

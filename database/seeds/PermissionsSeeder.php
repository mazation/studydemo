<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions = config("permissions");
      foreach ($permissions as $key => $value) {
        if (Permission::where('slug', $key)->count() == 0) {
          $permission = Permission::create([
            'slug' => $key,
            'name' => $value
          ]);
          $permission->save();
        }
      }
    }
}

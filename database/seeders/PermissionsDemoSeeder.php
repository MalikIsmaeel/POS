<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar; 
use Illuminate\Support\Str;
use Faker\Generator as Faker; 
class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // // create demo users
        $user = \App\Models\User::factory(1)->create([
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'name'=> fake()->name(),
            'user_name'=> fake()->name(),
            'first_name'=> fake()->firstname(),
            'meddile_name'=> fake()->name(),
            'last_name'=> fake()->name(),
            // 'photo'=> $this->faker->imageUrl(640,480),
           
   
            // 'active'=> $this->faker->randomNumber(0, 1),
        ])->assignRole($role1);

        // $user = \App\Models\User::factory(3)->create([
        //     'email' => fake()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'user_name'=> fake()->name(),
        //     'first_name'=> fake()->name(),
        //     'meddile_name'=> fake()->name(),
        //     'last_name'=> fake()->name(),
        //     // 'photo'=> $this->faker->imageUrl(640,480),
           
   
        //     // 'active'=> $this->faker->random_int(0, 1),
        // ]);
        // $user->assignRole($role2);

        // $user = \App\Models\User::factory(2)->create([
        //     'email' => fake()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'user_name'=> fake()->name(),
        //     'first_name'=> fake()->name(),
        //     'meddile_name'=> fake()->name(),
        //     'last_name'=> fake()->name(),
        //     // 'phone'=> $this->faker->imageUrl(640,480),
           
   
        //     // 'active'=> $this->faker->random_int(0, 1),
        // ]);
        // $user->assignRole($role3);
    }
}

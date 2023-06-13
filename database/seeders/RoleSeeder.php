<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'usuario']);


        Permission ::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        Permission ::create(['name' => 'productos.index'])->syncRoles([$role1, $role2]);
        Permission ::create(['name' => 'productos.create'])->assignRole($role1);
        Permission ::create(['name' => 'productos.edit'])->assignRole($role1);;
        Permission ::create(['name' => 'productos.destroy'])->assignRole($role1);;

        Permission ::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2]);
        Permission ::create(['name' => 'categorias.create'])->assignRole($role1);;
        Permission ::create(['name' => 'categorias.edit'])->assignRole($role1);;
        Permission ::create(['name' => 'categorias.destroy'])->assignRole($role1);;

        Permission ::create(['name' => 'subcategorias.index'])->syncRoles([$role1, $role2]);
        Permission ::create(['name' => 'subcategorias.create'])->assignRole($role1);;
        Permission ::create(['name' => 'subcategorias.edit'])->assignRole($role1);;
        Permission ::create(['name' => 'subcategorias.destroy'])->assignRole($role1);;

        Permission ::create(['name' => 'usuarios.index'])->assignRole($role1);;
        Permission ::create(['name' => 'usuarios.edit'])->assignRole($role1);;
        Permission ::create(['name' => 'usuarios.destroy'])->assignRole($role1);;


    }
}

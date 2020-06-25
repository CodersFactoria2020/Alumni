<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        factory(\App\Permission::class)->create(['name'=>'Ver usuarios', 'slug'=>'user.index', 'description'=>'Con este permiso podrá ver todos los usuarios.']);
        factory(\App\Permission::class)->create(['name'=>'Crear usuario', 'slug'=>'user.create', 'description'=>'Con este permiso podrá crear usuarios.']);
        factory(\App\Permission::class)->create(['name'=>'Editar usuario', 'slug'=>'user.edit', 'description'=>'Con este permiso podrá editar todos los usuarios.']);
        factory(\App\Permission::class)->create(['name'=>'Ver usuario', 'slug'=>'user.show', 'description'=>'Con este permiso podrá acceder a la información de los usuarios.']);
        factory(\App\Permission::class)->create(['name'=>'Eliminar usuario', 'slug'=>'user.destroy', 'description'=>'Con este permiso podrá eliminar todos los usuarios.']);
        
        factory(\App\Permission::class)->create(['name'=>'Ver roles', 'slug'=>'role.index', 'description'=>'Con este permiso podrá ver todos los roles.']);
        factory(\App\Permission::class)->create(['name'=>'Crear roles', 'slug'=>'role.create', 'description'=>'Con este permiso podrá crear roles.']);
        factory(\App\Permission::class)->create(['name'=>'Editar roles', 'slug'=>'role.edit', 'description'=>'Con este permiso podrá editar todos los roles.']);
        factory(\App\Permission::class)->create(['name'=>'Ver rol', 'slug'=>'role.show', 'description'=>'Con este permiso podrá acceder a la información de los roles.']);
        factory(\App\Permission::class)->create(['name'=>'Eliminar rol', 'slug'=>'role.destroy', 'description'=>'Con este permiso podrá eliminar todos los roles.']);

        factory(\App\Permission::class)->create(['name'=>'Ver perfiles', 'slug'=>'profile.index', 'description'=>'Con este permiso podrá ver todos los perfiles.']);
        factory(\App\Permission::class)->create(['name'=>'Crear perfiles', 'slug'=>'profile.create', 'description'=>'Con este permiso podrá crear perfiles']);
        factory(\App\Permission::class)->create(['name'=>'Editar propio perfil', 'slug'=>'ownprofile.edit', 'description'=>'Con este permiso podrá editar su perfil.']);      
        factory(\App\Permission::class)->create(['name'=>'Ver perfil', 'slug'=>'profile.show', 'description'=>'Con este permiso podrá acceder a la información de los perfiles.']);
        factory(\App\Permission::class)->create(['name'=>'Eliminar perfil propio', 'slug'=>'ownprofile.destroy', 'description'=>'Con este permiso podrá eliminar su perfil.']);

        factory(\App\Permission::class)->create(['name'=>'Ver eventos', 'slug'=>'event.index', 'description'=>'Con este permiso podrá ver todos los eventos.']);
        factory(\App\Permission::class)->create(['name'=>'Crear eventos', 'slug'=>'event.create', 'description'=>'Con este permiso podrá crear eventos']);
        factory(\App\Permission::class)->create(['name'=>'Editar eventos', 'slug'=>'event.edit', 'description'=>'Con este permiso podrá editar eventos.']);      
        factory(\App\Permission::class)->create(['name'=>'Ver eventos', 'slug'=>'event.show', 'description'=>'Con este permiso podrá acceder a la información de los eventos.']);
        factory(\App\Permission::class)->create(['name'=>'Eliminar eventos', 'slug'=>'event.destroy', 'description'=>'Con este permiso podrá eliminar eventos.']);

        factory(\App\Permission::class)->create(['name'=>'Asistir a evento', 'slug'=>'event.asist', 'description'=>'Con este permiso podrá asistir a eventos.']);

        factory(\App\Permission::class)->create(['name'=>'Edita usuario propio', 'slug'=>'ownuser.edit', 'description'=>'Con este permiso podrá editar su usuario.']);
        factory(\App\Permission::class)->create(['name'=>'Ver uruario propio', 'slug'=>'ownuser.show', 'description'=>'Con este permiso podrá ver su usuario.']);
        factory(\App\Permission::class)->create(['name'=>'Eliminar usuario propio', 'slug'=>'ownuser.destroy', 'description'=>'Con este permiso podrá eliminar su usuario.']);

    }
}

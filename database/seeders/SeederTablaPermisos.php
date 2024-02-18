<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'show-rol',
            'create-rol',
            'edit-rol',
            'delete-rol',

            //Operacions sobre tabla sections
            'show-section',
            'create-section',
            'edit-section',
            'delete-section',

            //Operacions sobre tabla files
            'show-file',
            'create-file',
            'edit-file',
            'delete-file',

             //Operacions sobre tabla files
             'show-user',
             'create-user',
             'edit-user',
             'delete-user',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }

}

<?php
namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();

        $Permissions = [
            'Admin Panel',
            'Group List',
            'Group Create',
            'Group Edit',
            'Group Delete',
            'History List',
            'Notification List',
            'Notification Create',
            'Notification Edit',
            'Notification Delete',
            'Permission List',
            'Permission Create',
            'Permission Edit',
            'Permission Delete',
            'Role List',
            'Role Create',
            'Role Edit',
            'Role Delete',
            'User Panel',
            'User List',
            'User Create',
            'User Edit',
            'User Delete',
        ];


        foreach ($Permissions as $Permission) {

            // Permission::Create(['name' => $Permission, 'slug' => Helper::slugify($Permission)]);         //Stopped by Akash for slugify.
//            DB::collection('permission')->create(['name' => $Permission, 'slug' => Helper::slugify($Permission)]);

        }

        Schema::enableForeignKeyConstraints();
    }
}

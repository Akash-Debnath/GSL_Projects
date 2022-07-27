<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  *
    //  * @return void
    //  */
    // public function run()
    // {
    //     $roleManagement = Role::create(['name' => 'management']);
    //     $roleManager = Role::create(['name' => 'manager']);
    //     $roleAdmin = Role::create(['name' => 'admin']);
    //     $roleStaff = Role::create(['name' => 'staff']);


    //     // Permission List as array
    //     $permissions = [

    //         [
    //             'group_name' => 'dashboard',
    //             'permissions' => [
    //                 'dashboard.view',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'staff',
    //             'permissions' => [
    //                 //Staff Permissions
    //                 'staff.create',
    //                 'staff.view',
    //                 'staff.edit',
    //                 'staff.delete',
    //                 'staff.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'notice',
    //             'permissions' => [
    //                 //notice Permissions
    //                 'notice.view',
    //                 'notice.create',
    //                 'notice.edit',
    //                 'notice.approve',
    //                 'notice.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'attachment',
    //             'permissions' => [
    //                 //attachment Permissions
    //                 'attachment.view',
    //                 'attachment.create',
    //                 'attachment.edit',
    //                 'attachment.approve',
    //                 'attachment.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'policy',
    //             'permissions' => [
    //                 //policy Permissions
    //                 'policy.view',
    //                 'policy.create',
    //                 'policy.edit',
    //                 'policy.approve',
    //                 'policy.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'holiday',
    //             'permissions' => [
    //                 //holiday Permissions
    //                 'holiday.view',
    //                 'holiday.create',
    //                 'holiday.edit',
    //                 'holiday.approve',
    //                 'holiday.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'incident',
    //             'permissions' => [
    //                 //incident Permissions
    //                 'incident.view',
    //                 'incident.create',
    //                 'incident.edit',
    //                 'incident.approve',
    //                 'incident.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'job_description',
    //             'permissions' => [
    //                 //job_description Permissions
    //                 'job_description.view',
    //                 'job_description.download',
    //                 'job_description.upload',
    //                 'job_description.edit',
    //                 'job_description.approve',
    //                 'job_description.delete',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'leave',
    //             'permissions' => [
    //                 //leave Permissions
    //                 'leave.view',
    //                 'leave.apply',
    //                 'leave.edit',
    //                 'leave.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'department',
    //             'permissions' => [
    //                 //department Permissions
    //                 'department.view',
    //                 'department.create',
    //                 'department.edit',
    //                 'department.delete',
    //                 'department.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'designation',
    //             'permissions' => [
    //                 //Designation Permissions
    //                 'designation.view',
    //                 'designation.create',
    //                 'designation.edit',
    //                 'designation.delete',
    //                 'designation.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'facility',
    //             'permissions' => [
    //                 //facility Permissions
    //                 'facility.view',
    //                 'facility.create',
    //                 'facility.edit',
    //                 'facility.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'note',
    //             'permissions' => [
    //                 //note Permissions
    //                 'note.view',
    //                 'note.create',
    //                 'note.edit',
    //                 'note.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'ramadan',
    //             'permissions' => [
    //                 //ramadan Permissions
    //                 'ramadan.view',
    //                 'ramadan.create',
    //                 'ramadan.edit',
    //                 'ramadan.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'upload_att_info',
    //             'permissions' => [
    //                 //upload_att_info Permissions
    //                 'upload_att_info.view',
    //                 'upload_att_info.create',
    //                 'upload_att_info.upload',
    //                 'upload_att_info.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'late_early_request',
    //             'permissions' => [
    //                 //late_early_request Permissions
    //                 'late_early_request.apply',
    //                 'late_early_request.view',
    //                 'late_early_request.edit',
    //                 'late_early_request.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'roster',
    //             'permissions' => [
    //                 //roster Permissions
    //                 'roster.view',
    //                 'roster.create',
    //                 'roster.edit',
    //                 'roster.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'admin',
    //             'permissions' => [
    //                 //admin Permissions
    //                 'admin.create',
    //                 'admin.view',
    //                 'admin.edit',
    //                 'admin.delete',
    //                 'admin.approve',
    //             ]
    //         ],
    //         [
    //             'group_name' => 'role',
    //             'permissions' => [
    //                 //role Permissions
    //                 'role.view',
    //                 'role.create',
    //                 'role.edit',
    //                 'role.delete',
    //                 'role.approve',
    //             ]
    //         ],
    //     ];


    //     // Create and Assign Permissions
    //     for ($i = 0; $i < count($permissions); $i++) {
    //         $permissionGroup = $permissions[$i]['group_name'];
    //         for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
    //             // Create Permission
    //             $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
    //             $roleManagement->givePermissionTo($permission);
    //             $permission->assignRole($roleManagement);
    //         }
    //     }
    // }
}

<?php
namespace App\Services;


use App\Repositories\PermissionPrivilegeRepository;

class PermissionPrivilegeService 
{

    /**
     * @var permissionPrivilegeRepository
    */
    protected $permissionPrivilegeRepository;


    /**
     * UserService constructor.
     * @param permissionPrivilegeRepository $permissionPrivilegeRepository
     */
    public function __construct(PermissionPrivilegeRepository $permissionPrivilegeRepository)
    {
        $this->permissionPrivilegeRepository = $permissionPrivilegeRepository;
    }


    public function getAllActivity()
    {
        return $this->permissionPrivilegeRepository->all();
    }

    
    public function getAllEmployee()
    {
        return $this->permissionPrivilegeRepository->getAllEmployee();
    }


    public function getAllDepartment()
    {
        return $this->permissionPrivilegeRepository->getAllDepartment();
    }



    public function createPermission($request)
    {

        $request -> validate([
            'activity_id' => 'required', 
            'staff_id' => 'required', 
            'privileger_id' => 'required', 
        ]);
        
        $this->permissionPrivilegeRepository->createPermission($request); 
    }


}
<?php
namespace App\Services;

use App\Repositories\AdministratorPrivilegeRepository;

class AdministratorPrivilegeService 
{

    /**
     * @var administratorPrivilegeRepository
    */
    protected $administratorPrivilegeRepository;


    /**
     * UserService constructor.
     * @param AdministratorPrivilegeRepository $administratorPrivilegeRepository
     */
    public function __construct(AdministratorPrivilegeRepository $administratorPrivilegeRepository)
    {
        $this->administratorPrivilegeRepository = $administratorPrivilegeRepository;
    }


    public function getAllEmployee()
    {
        return $this->administratorPrivilegeRepository->all();
    }


    public function addPrivileger($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'dept_code' => 'required', 
            'type' => 'required', 
        ]);

        return $this->administratorPrivilegeRepository->addPrivileger($request);
    }

    public function getAllPrivileger()
    {
        return $this->administratorPrivilegeRepository->getAllPrivileger();
    }


    public function getAllDepartment()
    {
        return $this->administratorPrivilegeRepository->getAllDepartment();
    }



    public function adminPrivilege($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'type' => 'required', 
        ]);

        return $this->administratorPrivilegeRepository->adminPrivilege($request);
    }


    public function rosterPrivilege($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'type' => 'required', 
        ]);

        return $this->administratorPrivilegeRepository->rosterPrivilege($request);
    }



    public function managementPrivilege($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'type' => 'required', 
        ]);

        return $this->administratorPrivilegeRepository->managementPrivilege($request);
    }



    public function deleteManager($id)
    {
        return $this->administratorPrivilegeRepository->delete($id); 
    }




    public function deleteAdmin($id)
    {
        return $this->administratorPrivilegeRepository->deleteAdmin($id); 
    }


    public function deleteRoster($id)
    {
        return $this->administratorPrivilegeRepository->deleteRoster($id); 
    }


    public function deleteManagement($id)
    {
        return $this->administratorPrivilegeRepository->deleteManagement($id); 
    }



}
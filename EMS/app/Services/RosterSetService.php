<?php
namespace App\Services;

use App\Repositories\RosterSetRepository;

class RosterSetService 
{

    /**
     * @var rosterSetRepository
    */
    protected $rosterSetRepository;


    /**
     * UserService constructor.
     * @param rosterSetRepository $rosterSetRepository
     */
    public function __construct(RosterSetRepository $rosterSetRepository)
    {
        $this->rosterSetRepository = $rosterSetRepository;
    }


    public function getAllEmployee($request)
    {
        return $this->rosterSetRepository->getAllEmployee($request);
    }


    public function getAllSlot($request)
    {
        return $this->rosterSetRepository->getAllSlot($request);
    }


    public function getAllDepartment()
    {
        return $this->rosterSetRepository->getAllDepartment();
    }


    public function setRosterSameTime($request)
    {
        $request -> validate([
            'emp_ids' => 'required', 
            'type' => 'required', 
        ]);
        return $this->rosterSetRepository->setRosterSameTime($request);
    }


    public function setRosterMoreWeekend($request)
    {
        $request -> validate([
            'emp_ids' => 'required'
        ]);
        return $this->rosterSetRepository->setRosterMoreWeekend($request);
    }


    public function setRosterCustomTime($request)
    {
        $request -> validate([
            'emp_ids' => 'required', 
            'type' => 'required', 
        ]);
        return $this->rosterSetRepository->setRosterCustomTime($request);
    }



    



    

    public function rosterPrivilege($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'type' => 'required', 
        ]);

        return $this->rosterSetRepository->rosterPrivilege($request);
    }


    public function managementPrivilege($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'type' => 'required', 
        ]);

        return $this->rosterSetRepository->managementPrivilege($request);
    }



    public function deleteManager($id)
    {
        return $this->rosterSetRepository->delete($id); 
    }




    public function deleteAdmin($id)
    {
        return $this->rosterSetRepository->deleteAdmin($id); 
    }


    public function deleteRoster($id)
    {
        return $this->rosterSetRepository->deleteRoster($id); 
    }


    public function deleteManagement($id)
    {
        return $this->rosterSetRepository->deleteManagement($id); 
    }



}
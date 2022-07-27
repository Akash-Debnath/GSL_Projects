<?php
namespace App\Services;

use App\Repositories\RosterPendingRepository;

class RosterPendingService 
{

    /**
     * @var rosterPendingRepository
    */
    protected $rosterPendingRepository;


    /**
     * UserService constructor.
     * @param rosterPendingRepository $rosterPendingRepository
     */
    public function __construct(RosterPendingRepository $rosterPendingRepository)
    {
        $this->rosterPendingRepository = $rosterPendingRepository;
    }




    public function getAllPendingRoster()
    {
        return $this->rosterPendingRepository->all(); 
    }


    public function getAllDepartment()
    {
        return $this->rosterPendingRepository->getAllDepartment(); 
    }


    public function totalPendingRequest()
    {
        return $this->rosterPendingRepository->totalPendingRequest(); 
    }


    public function getAllEmployee()
    {
        return $this->rosterPendingRepository->allEmployee();
    }


    public function approveHolidayRequest($request, $id)
    {
        $request -> validate([
            'admin_id' => 'required'
        ]);
        return $this->rosterPendingRepository->approveHolidayRequest($request, $id);
    }


    public function refuseHolidayRequest($id)
    {
        return $this->rosterPendingRepository->refuseHolidayRequest($id);
    }


}
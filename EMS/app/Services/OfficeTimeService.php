<?php
namespace App\Services;

use App\Repositories\OfficeTimeRepository;

class OfficeTimeService 
{

    /**
     * @var officeTimeRepository
    */
    protected $officeTimeRepository;


    /**
     * UserService constructor.
     * @param officeTimeRepository $officeTimeRepository
     */
    public function __construct(OfficeTimeRepository $officeTimeRepository)
    {
        $this->officeTimeRepository = $officeTimeRepository;
    }


    public function getAllEmployee()
    {
        return $this->officeTimeRepository->all();
    }


    public function getAllWeekLeaves()
    {
        return $this->officeTimeRepository->getAllWeekLeaves();
    }


    public function getAllDepartment()
    {
        return $this->officeTimeRepository->getAllDepartment();
    }


    public function updateSchedule($request, $id)
    {
        $request->validate([
            'scheduled_attendance' => 'required', 
        ]);
        return $this->officeTimeRepository->updateSchedule($request, $id);
    }


    public function updateRoster($request, $id)
    {
        $request->validate([
            'roster' => 'required', 
        ]);
        return $this->officeTimeRepository->updateRoster($request, $id);
    }

}
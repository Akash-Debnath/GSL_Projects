<?php
namespace App\Services;


use App\Repositories\OfficeScheduleRepository;

class OfficeScheduleService 
{

    /**
     * @var officeScheduleRepository
    */
    protected $officeScheduleRepository;


    /**
     * UserService constructor.
     * @param officeScheduleRepository $officeScheduleRepository
     */
    public function __construct(OfficeScheduleRepository $officeScheduleRepository)
    {
        $this->officeScheduleRepository = $officeScheduleRepository;
    }



    public function getEmployeeDepartment()
    {
        return $this->officeScheduleRepository->getEmployeeDepartment(); 
    }


    public function getAllEmployee()
    {
        return $this->officeScheduleRepository->all(); 
    }



    public function getAllWeekends($request)
    {
        return $this->officeScheduleRepository->getAllWeekends($request);
    }


    public function getNonRosterData($request)
    {
        return $this->officeScheduleRepository->getNonRosterData($request);
    }

    
    public function getAllHoliday()
    {
        return $this->officeScheduleRepository->getAllHoliday();
    }











    public function searchHoliday($request)
    {
        return $this->officeScheduleRepository->searchHoliday($request);
    }



    public function createHoliday($request)
    {

        $request -> validate([
            'date' => 'required',
            'description' => 'required'
        ]);

        $this->officeScheduleRepository->createHoliday($request); 
    }


    public function editHoliday($id)
    {   
        $data = $this->officeScheduleRepository->editHoliday($id);
        

        return response()->json([
            'status'=>200,
            'holidays'=>$this->officeScheduleRepository->editHoliday($id)
        ]);
    }



    public function updateHoliday($request)
    {

        $request -> validate([
            'date' => 'required', 
            'description' => 'required',  
        ]);

        $this->officeScheduleRepository->updateHoliday($request); 
    }


    public function deleteHoliday($id)
    {
        return $this->officeScheduleRepository->deleteHoliday($id); 
    }

}
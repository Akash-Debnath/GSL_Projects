<?php
namespace App\Services;


use App\Repositories\HolidayRepository;

class HolidayService 
{

    /**
     * @var holidayRepository
    */
    protected $holidayRepository;


    /**
     * UserService constructor.
     * @param HolidayRepository $holidayRepository
     */
    public function __construct(HolidayRepository $holidayRepository)
    {
        $this->holidayRepository = $holidayRepository;
    }



    public function getAllHoliday()
    {
        return $this->holidayRepository->getAllHoliday();
    }



    public function searchHoliday($request)
    {
        return $this->holidayRepository->searchHoliday($request);
    }



    public function createHoliday($request)
    {

        $request -> validate([
            'date' => 'required',
            'description' => 'required'
        ]);

        $this->holidayRepository->createHoliday($request); 
    }


    public function editHoliday($id)
    {   
        $data = $this->holidayRepository->editHoliday($id);
        

        return response()->json([
            'status'=>200,
            'holidays'=>$this->holidayRepository->editHoliday($id)
        ]);
    }



    public function updateHoliday($request)
    {

        $request -> validate([
            'date' => 'required', 
            'description' => 'required',  
        ]);

        $this->holidayRepository->updateHoliday($request); 
    }


    public function deleteHoliday($id)
    {
        return $this->holidayRepository->deleteHoliday($id); 
    }

}
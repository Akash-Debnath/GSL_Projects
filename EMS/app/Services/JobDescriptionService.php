<?php
namespace App\Services;
use App\Repositories\JobDescriptionRepository;

class JobDescriptionService{
     /**
     * @var holidayRepository
    */
    protected $jobDescRepository;


    /**
     * UserService constructor.
     * @param HolidayRepository $holidayRepository
     */
    public function __construct(JobDescriptionRepository $jobDescRepository)
    {
        $this->JobDescriptionRepository = $jobDescRepository;
    }

    public function getDepartment(){
        return $this->JobDescriptionRepository->getDepartment();
    }

    public function getEmployee(){
        return $this->JobDescriptionRepository->getEmployee();
    }

    public function store($request){
        return $this->JobDescriptionRepository->store($request); 
    }


   

    public function editJobDesc($id){
        // dd($id);
        $data = $this->JobDescriptionRepository->editJobDesc($id);
        return response()->json([
            'status'=>200,
            'job_desc_files'=>$this->JobDescriptionRepository->editJobDesc($id)
        ]);
        
    }

    public function updateJobDesc($request)
    {

        
        $this->JobDescriptionRepository->updateJobDesc($request); 
    }
}

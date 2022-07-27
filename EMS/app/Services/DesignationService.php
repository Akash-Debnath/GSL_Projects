<?php
namespace App\Services;

use App\Repositories\DesignationRepository;

class DesignationService 
{

    /**
     * @var designationRepository
    */
    protected $designationRepository;


    /**
     * UserService constructor.
     * @param designationRepository $designationRepository
     */
    public function __construct(DesignationRepository $designationRepository)
    {
        $this->designationRepository = $designationRepository;
    }



    public function getAllDesignation()
    {
        return $this->designationRepository->getAllDesignation(); 
    }


    public function getEmployeeDepartment()
    {
        return $this->designationRepository->getEmployeeDepartment();
    }


    public function createDesignation($request)
    {

        $request -> validate([
            'dept_code' => 'required', 
            'designation' => 'required'
        ]);

        $this->designationRepository->createDesignation($request); 
    }


    public function editDesignation($id)
    {   
        $data = $this->designationRepository->editDesignation($id);
        
        return response()->json([
            'status'=>200,
            'designation'=>$this->designationRepository->editDesignation($id)
        ]);
    }



    public function updateDesignation($request)
    {

        $request -> validate([
            'dept_code' => 'required', 
            'designation' => 'required',  
        ]);

        $this->designationRepository->updateDesignation($request); 
    }



    public function deleteDesignation($id)
    {
        return $this->designationRepository->delete($id); 
    }


}
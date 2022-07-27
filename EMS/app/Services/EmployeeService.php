<?php
namespace App\Services;


use App\Repositories\EmployeeRepository;

class EmployeeService 
{

    /**
     * @var EmployeeRepository
    */
    protected $employeeRepository;


    /**
     * UserService constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }



    public function getAllEmployee($request)
    {
        return $this->employeeRepository->getAllEmployee($request); 
    }


    public function SearchEmployee($request)
    {
        return $this->employeeRepository->SearchEmployee($request); 
    }



    public function getEmployeeDepartment()
    {
        return $this->employeeRepository->getEmployeeDepartment(); 
    }
    
    

    public function getEmployeeGrade()
    {
        return $this->employeeRepository->getEmployeeGrade(); 
    }



    public function getEmployeeDesignation()
    {
        return $this->employeeRepository->getEmployeeDesignation(); 
    }


    
    
    
    public function getEmployeeInfo($id)
    {
        return $this->employeeRepository->getEmployeeInfo($id); 
    }
    
    
    public function getFacility($id)
    {
        return $this->employeeRepository->getFacility($id); 
    }

    public function getStatus($id)
    {
        return $this->employeeRepository->getStatus($id); 
    }
    
    
    public function getAllFacility()
    {
        return $this->employeeRepository->getAllFacility(); 
    }
    
    
    public function createEmployee($request)
    {

        $request -> validate([
            'name' => 'required', 
            'emp_id' => 'required|unique:employees', 
            'dept_code' => 'required', 
            'designation' => 'required', 
            'email' => 'required|email|max:60|unique:employees',
            'jdate'=>'required', 
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $this->employeeRepository->createEmployee($request); 
    }
    
    
    
    
    
    public function editEmployee($id)
    {
        return $this->employeeRepository->editEmployee($id); 
    }

    
    
    public function updateEmployee($request, $id)
    {
        
        $request -> validate([
            'name' => 'required', 
            'emp_id' => 'required|unique:employees',
            'dept_code' => 'required', 
            'designation' => 'required', 
            'email' => 'required|email|max:60|unique:employees',
            'jdate'=>'required', 
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $this->employeeRepository->updateEmployee($request, $id); 
    }
    
    
    
    public function deleteEmployee($id)
    {
        return $this->employeeRepository->deleteEmployee($id); 
    }
   
    
    
    public function createFacility($request)
    {
        $request -> validate ([
            'emp_id' => 'required',
            'facility' => 'required',
        ]);
    
        $this->employeeRepository->createFacility($request); 
    
    }


    public function editFacility($id)
    {   
        $data = $this->employeeRepository->editFacility($id);
        

        return response()->json([
            'status'=>200,
            'facilitydata'=>$this->employeeRepository->editFacility($id)
        ]);
    }


    public function updateFacility($request)
    {

        $request -> validate([
            'emp_id' => 'required', 
            'facility' => 'required',  
        ]);

        $this->employeeRepository->updateFacility($request); 
    }


    public function deleteFacility($id)
    {
        return $this->employeeRepository->deleteFacility($id); 
    }


    public function createStatus($request)
    {
        $request -> validate ([
            'emp_id' => 'required',
            'status' => 'required',
        ]);
    
        $this->employeeRepository->createStatus($request); 
    
    }


    public function deleteStatus($id)
    {
        return $this->employeeRepository->deleteStatus($id); 
    }


    public function createGrade($request)
    {
        $request -> validate ([
            'grade' => 'required|unique:grades',
        ]);
    
        $this->employeeRepository->createGrade($request); 
    
    }


    public function updateGrade($request, $id)
    {
        $request -> validate ([
            'grade_id' => 'required',
        ]);
    
        $this->employeeRepository->updateGrade($request, $id); 
    }


    public function employeeArchive($request, $id)
    {
        $request -> validate ([
            'archive' => 'required',
        ]);
    
        $this->employeeRepository->employeeArchive($request, $id); 
    }


    public function editEmployeeInfo($request)
    {
        $request->validate([
            
        ]);
        $this->employeeRepository->editEmployeeInfo($request);
    }
    
}
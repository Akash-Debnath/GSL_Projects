<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class EmployeeController extends Controller
{
    /**
     * @var employeeService
     */
    protected $employeeService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $employees= $this->employeeService->getAllEmployee($request);
        $employeeSearch= $this->employeeService->SearchEmployee($request);
        $employeeDept= $this->employeeService->getEmployeeDepartment();
        $employeeDesignation= $this->employeeService->getEmployeeDesignation();
        $employeeGrade= $this->employeeService->getEmployeeGrade();
        return view('employeelist', compact('employees', 'employeeSearch', 'employeeDept', 'employeeDesignation', 'employeeGrade'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeDept= $this->employeeService->getEmployeeDepartment();
        $employeeDesignation= $this->employeeService->getEmployeeDesignation();
        $employeeGrade= $this->employeeService->getEmployeeGrade();
        return view('add-employee', compact('employeeDept', 'employeeDesignation','employeeGrade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->employeeService->createEmployee($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empInfo = $this->employeeService->getEmployeeInfo($id);
        $facility = $this->employeeService->getAllFacility();
        $faci = $this->employeeService->getFacility($id);
        $stat = $this->employeeService->getStatus($id);
        $employeeGrade= $this->employeeService->getEmployeeGrade();
        return view('employee-details',compact('empInfo','faci','facility','stat', 'employeeGrade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = $this->employeeService->editEmployee($id);
        $employeeDept= $this->employeeService->getEmployeeDepartment();
        $employeeDesignation= $this->employeeService->getEmployeeDesignation();
        $employeeGrade= $this->employeeService->getEmployeeGrade();
        return view('edit-employee', compact('employeeDept', 'employeeDesignation','employeeGrade', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->employeeService->updateEmployee($request, $id);
        return redirect()->route('employees.index')->with('success','Employee details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeService->deleteEmployee($id);
        return redirect()->route('employees.index')->with('fail','Employee Deleted');
    }



    public function createFacility(Request $request)
    {
        $this->employeeService->createFacility($request);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFacility($id)
    {
    //    return 1;
       return $this->employeeService->editFacility($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFacility(Request $request)
    {
        $this->employeeService->updateFacility($request);
        return redirect()->back()->with('success','Facility updated');
    }


    
    public function deleteFacility($id)
    {
        $this->employeeService->deleteFacility($id);
        return redirect()->back()->with('fail','Facility Deleted');
    }



    public function createStatus(Request $request)
    {
        $this->employeeService->createStatus($request);
        return redirect()->back()->with('success','Status created successfully!');

    }


    public function deleteStatus($id)
    {
        $this->employeeService->deleteStatus($id);
        return redirect()->back()->with('fail','Status Deleted');
    }


    public function createGrade(Request $request)
    {
        $this->employeeService->createGrade($request);
        return redirect()->back()->with('success','Grade created successfully!');
    }


    public function updateGrade(Request $request, $id)
    {
        $this->employeeService->updateGrade($request, $id);
        return redirect()->back()->with('success','Grade Updated successfully!');
    }


    public function employeeArchive(Request $request, $id)
    {
        $this->employeeService->employeeArchive($request, $id);
        return redirect()->route('employees.index')->with('fail','Employee Archived!');
    }


    public function editEmployeeInfo(Request $request)
    {
        $this->employeeService->editEmployeeInfo($request);
        return redirect()->back()->with('success','Profile update request sent successfully!');
    }
}

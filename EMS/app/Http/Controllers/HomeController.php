<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Services\EmployeeService;

class HomeController extends Controller
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
    public function index()
    {
        $id = Auth::user()->username;
        $empInfo = Employee::where('emp_id',Auth::user()->username)->first();
        // $employees = $this->profileService->getEmployeeDetails();
        $facility = $this->employeeService->getAllFacility();
        $faci = $this->employeeService->getFacility($id);
        $stat = $this->employeeService->getStatus($id);
        $employeeGrade= $this->employeeService->getEmployeeGrade();
        return view('employee-details',compact('empInfo', 'facility', 'faci', 'stat', 'employeeGrade'));
    }

    // public function shift(){

    //     $employees = employee::get();
    //     // dd($employees);
    //     // exit();

    //     foreach($employees as $key => $value){
    //         User::create([
    //             'username'=>$value->emp_id,
    //             'email'=>$value->email,
    //             'password'=>$value->pass
    //         ]);
    //     }
    //     return "Data sent successfully";
    // }



     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

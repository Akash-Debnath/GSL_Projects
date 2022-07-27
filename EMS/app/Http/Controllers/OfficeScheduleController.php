<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OfficeScheduleService;

class OfficeScheduleController extends Controller
{
    /**
     * @var officeScheduleService
     */
    protected $officeScheduleService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(OfficeScheduleService $officeScheduleService)
    {
        $this->officeScheduleService = $officeScheduleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeDept= $this->officeScheduleService->getEmployeeDepartment();
        $staffs= $this->officeScheduleService->getAllEmployee();
        $startdate = strtotime(date('Y-m-01'));
        $enddate = strtotime(date('Y-m-t'));

        return view('office-schedule', compact('employeeDept', 'staffs', 'startdate', 'enddate'));
    }


    public function searchSchedule(Request $request)
    {
        // dd($request);
        $employeeDept= $this->officeScheduleService->getEmployeeDepartment();
        $staffs= $this->officeScheduleService->getAllEmployee();
        $holidays = $this->officeScheduleService->getAllHoliday();
        $weekends = $this->officeScheduleService->getAllWeekends($request);
        $nonRosters = $this->officeScheduleService->getNonRosterData($request);
        $startdate = strtotime($request->sdate);
        $enddate = strtotime($request->edate);
        $employee = $request->emp_id;
        // dd($nonRosters[123]);
        // dd($weekends[1]);

        return view('office-schedule', compact('employeeDept', 'staffs', 'weekends', 'nonRosters', 'employee', 'holidays', 'startdate', 'enddate'));

    }


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
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

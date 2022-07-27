<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OfficeTimeService;

class OfficeTimeController extends Controller
{


    /**
     * @var officeTimeService
     */
    protected $officeTimeService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(OfficeTimeService $officeTimeService)
    {
        $this->officeTimeService = $officeTimeService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->officeTimeService->getAllEmployee();
        $weekleaves = $this->officeTimeService->getAllWeekLeaves();
        $departments = $this->officeTimeService->getAllDepartment();
        return view('officeTime', compact('employees', 'weekleaves', 'departments'));
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


    public function updateSchedule(Request $request, $id)
    {
        $this->officeTimeService->updateSchedule($request, $id);
        return redirect()->back()->with('fail','Schedule updated!');
    }


    public function updateRoster(Request $request, $id)
    {
        $this->officeTimeService->updateRoster($request, $id);
        return redirect()->back()->with('fail','Roster updated!');
    }
}

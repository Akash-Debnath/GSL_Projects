<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RosterSetService;

class RosterSetController extends Controller
{

    /**
     * @var rosterSetService
     */
    protected $rosterSetService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RosterSetService $rosterSetService)
    {
        $this->rosterSetService = $rosterSetService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = $this->rosterSetService->getAllEmployee();
        // $departments = $this->rosterSetService->getAllDepartment();
        // return view('set-roster', compact('departments', 'employees'));
    }



    public function setRoster(Request $request)
    {
        $employees = $this->rosterSetService->getAllEmployee($request);
        $departments = $this->rosterSetService->getAllDepartment();
        $rosterSlot = $this->rosterSetService->getAllSlot($request);
        $startdate = strtotime($request->from);
        $enddate = strtotime($request->to);
        $roster = $request->roster;
        $dept = $request->dept_code;

        return view('set-roster', compact('departments', 'employees', 'rosterSlot', 'startdate', 'enddate', 'roster', 'dept'));
    }


    public function setRosterSameTime(Request $request)
    {
        $this->rosterSetService->setRosterSameTime($request);
        return redirect()->back()->with('success', 'Roster Settings Added Successfully');
    }


    public function setRosterMoreWeekend(Request $request)
    {
        // dd($request);
        $this->rosterSetService->setRosterMoreWeekend($request);
        return redirect()->back()->with('success', 'Roster Settings Added Successfully');
    }


    public function setRosterCustomTime(Request $request)
    {
        $this->rosterSetService->setRosterCustomTime($request);
        return redirect()->back()->with('success', 'Roster Settings Added Successfully');
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

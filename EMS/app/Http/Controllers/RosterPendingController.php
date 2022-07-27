<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RosterPendingService;

class RosterPendingController extends Controller
{

    /**
     * @var rosterPendingService
     */
    protected $rosterPendingService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RosterPendingService $rosterPendingService)
    {
        $this->rosterPendingService = $rosterPendingService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendings = $this->rosterPendingService->getAllPendingRoster();
        $total = $this->rosterPendingService->totalPendingRequest();
        $employees = $this->rosterPendingService->getAllEmployee();
        $departments = $this->rosterPendingService->getAllDepartment();
        return view('roster-pending', compact('pendings', 'total', 'employees', 'departments'));
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
        $this->rosterPendingService->approveHolidayRequest($request, $id);
        return redirect()->back()->with('success','Approved successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rosterPendingService->refuseHolidayRequest($id);
        return redirect()->back()->with('fail','Request refused');
    }
}

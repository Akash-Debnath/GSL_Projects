<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IncidentService;
use Illuminate\Support\Facades\Route;

class IncidentController extends Controller
{

     /**
     * @var incidentService
     */
    protected $incidentService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(IncidentService $incidentService)
    {
        $this->incidentService = $incidentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incident= $this->incidentService->getAllIncident();
        // $editincident = $this->incidentService->editIncident($id);
        // dd($editincident);
        return view('incident', compact('incident'));
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
        $this->incidentService->createIncident($request);
        return redirect()->back()->with('success','Incident Added');
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
       return $this->incidentService->editIncident($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->incidentService->updateIncident($request);
        return redirect()->back()->with('success','Incident Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->incidentService->deleteIncident($id);
        return redirect()->back()->with('fail','Incident Deleted');
    }
}

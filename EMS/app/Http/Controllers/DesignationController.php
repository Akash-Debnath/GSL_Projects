<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DesignationService;

class DesignationController extends Controller
{

    /**
     * @var designationService
     */
    protected $designationService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(DesignationService $designationService)
    {
        $this->designationService = $designationService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $designation = $this->designationService->getAllDesignation();
        $department = $this->designationService->getEmployeeDepartment();
        return view('designation', compact('designation','department'));
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
        $this->designationService->createDesignation($request);
        return redirect()->back()->with('success','Designation Added');
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
        // dd($id);
        return $this->designationService->editDesignation($id);
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
        $this->designationService->updateDesignation($request);
        return redirect()->route('designation.index')->with('success','Designation Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->designationService->deleteDesignation($id);
        return redirect()->back()->with('fail','Desigantion Deleted');
    }
}

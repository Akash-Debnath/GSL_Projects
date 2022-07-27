<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdministratorPrivilegeService;

class AdministratorPrivilegeController extends Controller
{

    /**
     * @var administratorPrivilegeService
     */
    protected $administratorPrivilegeService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(AdministratorPrivilegeService $administratorPrivilegeService)
    {
        $this->administratorPrivilegeService = $administratorPrivilegeService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->administratorPrivilegeService->getAllEmployee();
        $privileger = $this->administratorPrivilegeService->getAllPrivileger();
        $departments = $this->administratorPrivilegeService->getAllDepartment();
        return view('administrator_privilege', compact('employees', 'privileger', 'departments'));
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
        $this->administratorPrivilegeService->addPrivileger($request);
        return redirect()->back()->with('success', 'New Administrator Privileger Added');
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
        $this->administratorPrivilegeService->deleteManager($id);
        return redirect()->back()->with('fail','Manager Deleted');
    }
    
    public function adminPrivilege(Request $request)
    {
        $this->administratorPrivilegeService->adminPrivilege($request);
        return redirect()->back()->with('success', 'New Administrator Privileger Added');
    }


    public function rosterPrivilege(Request $request)
    {
        $this->administratorPrivilegeService->rosterPrivilege($request);
        return redirect()->back()->with('success', 'New Administrator Privileger Added');
    }



    public function managementPrivilege(Request $request)
    {
        $this->administratorPrivilegeService->managementPrivilege($request);
        return redirect()->back()->with('success', 'New Administrator Privileger Added');
    }


    public function deleteAdmin($id)
    {
        $this->administratorPrivilegeService->deleteAdmin($id);
        return redirect()->back()->with('fail','Admin Deleted');
    }


    public function deleteRoster($id)
    {
        $this->administratorPrivilegeService->deleteRoster($id);
        return redirect()->back()->with('fail','Admin Deleted');
    }



    public function deleteManagement($id)
    {
        $this->administratorPrivilegeService->deleteManagement($id);
        return redirect()->back()->with('fail','Admin Deleted');
    }

}

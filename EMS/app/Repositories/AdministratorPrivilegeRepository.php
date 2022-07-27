<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Setting;
use App\Traits\QueryTrait;
use Illuminate\Support\Facades\Auth;


class AdministratorPrivilegeRepository implements RepositoryInterface
{

    public function all()
    {
        return Employee::where('archive', '=', "N")->with(['department', 'userDesignation'])->get();
    }


    public function addPrivileger($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'dept_code'=>$request->dept_code, 'type'=>$request->type])->save();
    }


    public function getAllPrivileger()
    {
        return Setting::orderByRaw('CONVERT(emp_id, Signed) ASC')->get();
    }

    
    public function getAllDepartment()
    {
        return Department::with('employee')->orderBy('dept_name', 'ASC')->get();
    }


    public function adminPrivilege($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'type'=>$request->type])->save();
    }


    public function rosterPrivilege($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'type'=>$request->type])->save();
    }


    public function managementPrivilege($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'type'=>$request->type])->save();
    }


    public function get($id)
    {
        return true;
    }



    public function create($data)
    {
    }



    public function update(array $data, $id)
    {
        return true;
    }



    public function delete($id)
    {
        return Setting::findorFail($id)->delete();
    }



    public function deleteAdmin($id)
    {
        return Setting::findorFail($id)->delete();
    }


    public function deleteRoster($id)
    {
        return Setting::findorFail($id)->delete();
    }


    public function deleteManagement($id)
    {
        return Setting::findorFail($id)->delete();
    }

}
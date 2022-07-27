<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\RosteringControl;

class RosterPendingRepository implements RepositoryInterface
{

    public function all()
    {
        return RosteringControl::where('admin_id', 'NULL')->get();
    }


    public function totalPendingRequest()
    {
        return RosteringControl::where('admin_id', 'NULL')->count();
    }


    public function allEmployee()
    {
        return Employee::where('archive', '=', "N")->orderByRaw('CONVERT(emp_id, Signed) ASC')->get();
    }


    public function getAllDepartment()
    {
        return Department::all();
    }


    public function approveHolidayRequest($request, $id)
    {
        return RosteringControl::where('id', $id)->update(['admin_id'=> $request->admin_id]);
    }


    
    public function refuseHolidayRequest($id)
    {
        return RosteringControl::where('id', $id)->delete();
    }




    public function get($id)
    {
        return true;
    }



    public function create(array $data)
    {
        return true;
    }



    public function update(array $data, $id)
    {
        return true;
    }



    public function delete($id)
    {
        return true;
    }

}
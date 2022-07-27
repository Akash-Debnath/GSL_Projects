<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Employee;
use App\Models\WeeklyLeave;
use App\Models\Holyday;
use App\Models\Rostering;
use App\Models\Weekend;

class OfficeScheduleRepository implements RepositoryInterface
{


    public function getEmployeeDepartment()
    {
        return Department::orderBy('dept_name', 'ASC')->get();
    }

    public function all()
    {
        return Employee::where('archive','=', "N")->orderByRaw('CONVERT(emp_id, Signed) ASC')->get();
    }

    public function getAllWeekends($request)
    {
        $id = $request->emp_id;
        return Weekend::where('emp_id', $id)->get();
    }


    public function getNonRosterData($request)
    {
        $id = $request->emp_id;
        return Rostering::where('emp_id', $id)->get();
    }


    public function getAllHoliday()
    {
       return Holyday::all();
    }








    public function searchHoliday($request)
    {
       $t = $request->input('date_year');
       return Department::whereYear('date',$t)->paginate(20);
    }



    public function createHoliday($data)
    {
        return Department::create([ 'date' => $data->date, 'description' => $data->description])->save();
    }


    public function editHoliday($id)
    {
        return Department::where('id',$id)->first();
    }


    public function updateHoliday($request)
    {

        $data = $request->input('holidayId');
        return Department::where('id', $data)->update(['date'=>$request->date, 'description'=>$request->description]);

    }


    public function deleteHoliday($id)
    {
        return Department::findorFail($id)->delete();
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
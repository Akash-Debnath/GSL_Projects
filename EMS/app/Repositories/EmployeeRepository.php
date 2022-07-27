<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeEdit;
use App\Models\Grade;
use App\Models\Facility;
use App\Models\FacilityOption;
use App\Models\Status_log;
use App\Traits\QueryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class EmployeeRepository implements RepositoryInterface
{

    use QueryTrait;

    public function getAllEmployee($request)
    {
     
        $query = Employee::where('archive','=', "N")->with(['department', 'userDesignation'])->orderByRaw('CONVERT(emp_id, Signed) ASC');

        // $whereFilterList = ['employees.dept_code'];
        // $likeFilterList = [];
        // $query = self::filterEmployee($request, $query, $whereFilterList, $likeFilterList);

        if($request->dept_code) {
            $query->where('dept_code',$request->dept_code);
        }
    
        return $query->paginate(20);
  
    }



    public function SearchEmployee($request)
    {
        $query = Employee::where('archive','=', "N");
        if($request->dept_code) 
        {
            $query->where('dept_code',$request->dept_code);
        }
        return $query->get();
    }



    public function getEmployeeDepartment()
    {
        return Department::all();
    }




    public function getEmployeeGrade()
    {
        return Grade::all();
    }



    public function getEmployeeDesignation()
    {
        return Designation::all();
    }
    
    
    public function getFacility($id)
    {
        return Facility::where('emp_id', '=', $id)->get();
    }


    public function getStatus($id)
    {
        return Status_log::where('emp_id', '=', $id)->get();
    }



    public function getAllFacility()
    {
        return FacilityOption::all();
    }
    
    
    
    public function getEmployeeInfo($id)
    {
        return Employee::where('emp_id', '=', $id)->first();
    }
    
    
    
    public function createEmployee($data)
    {
        $e = new Employee;
        $e->name = $data->name;
        $e->emp_id = $data->emp_id;
        $e->grade_id = $data->grade;
        $e->dept_code = $data->dept_code;
        $e->designation = $data->designation;
        $e->jdate = $data->jdate;
        $e->status = $data->status;
        $e->office_stime = $data->office_stime;
        $e->office_etime = $data->office_etime;
        $e->mobile = $data->mobile;
        $e->phone = $data->phone;
        $e->pass = Hash::make('welcome2244');
        $e->email = $data->email;
        $e->present_address = $data->present_address;
        $e->permanent_address = $data->permanent_address;
        $e->last_edu_achieve = $data->last_edu_achieve;
        $e->dob = $data->dob;
        $e->archive = "N";
        $e->scheduled_attendance = "Y";
        $e->online = "N";
        $e->blood_group = $data->blood_group;
        $e->gender = $data->gender;
        if($data->hasfile('image'))
        {  
            $file = $data->file('image');
            $name =$file->getClientOriginalName();
            $file->move(public_path('EmployeePhoto'), $name);
            $e->image = $name; 
        }
        return $e->save(); 
    }



    
    public function editEmployee($id)
    {
        return Employee::find($id);
    }



    public function updateEmployee($data, $id)
    {
        $e = Employee::find($id);
        $e->name = $data->name;
        $e->emp_id = $data->emp_id;
        $e->grade_id = $data->grade;
        $e->dept_code = $data->dept_code;
        $e->designation = $data->designation;
        $e->jdate = $data->jdate;
        $e->status = $data->status;
        $e->office_stime = $data->office_stime;
        $e->office_etime = $data->office_etime;
        $e->mobile = $data->mobile;
        $e->phone = $data->phone;
        // $e->pass = Hash::make('welcome2244');
        $e->email = $data->email;
        $e->present_address = $data->present_address;
        $e->permanent_address = $data->permanent_address;
        $e->last_edu_achieve = $data->last_edu_achieve;
        $e->dob = $data->dob;
        // $e->archive = "N";
        // $e->scheduled_attendance = "Y";
        // $e->online = "N";
        $e->blood_group = $data->blood_group;
        $e->gender = $data->gender;
        if($data->hasfile('image'))
        {  
            $file = $data->file('image');
            $name =$file->getClientOriginalName();
            $file->move(public_path('EmployeePhoto'), $name);
            $e->image = $name; 
        }
        return $e->update(); 
    }




    public function deleteEmployee($id)
    {
        return Employee::findorFail($id)->delete();
    }



    public function createFacility($data)
    {
        $facility = new Facility;
        $facility->emp_id = $data->emp_id;
        $facility->facility = $data->facility;
        $facility->remark = $data->remark;
        $facility->from_date = $data->from_date;
        $facility->to_date = $data->to_date;

        return $facility->save();
    }



    public function editFacility($id)
    {
        return Facility::where('id',$id)->first();
    }


    public function updateFacility($request)
    {
        $data = $request->input('facilityId');
        return Facility::where('id', $data)->update(['emp_id'=>$request->emp_id, 'facility'=>$request->facility, 'from_date'=>$request->from_date, 'to_date'=>$request->to_date, 'facility_id'=>$request->facility_id]);
    }



    public function deleteFacility($id)
    {
        return Facility::findorFail($id)->delete();
    }


    public function createStatus($data)
    {
        $status = new Status_log;
        $status->emp_id = $data->emp_id;
        $status->status = $data->status;
        $status->date = $data->date;
        return $status->save();
    }


    public function deleteStatus($id)
    {
        return Status_log::findorFail($id)->delete();
    }


    public function createGrade($data)
    {
        $status = new Grade;
        $status->grade = $data->grade;
        return $status->save();
    }


    public function updateGrade($data, $id)
    {
        return Employee::where('emp_id', $id)->update(['grade_id'=> $data->grade_id]);
    }


    public function employeeArchive($data, $id)
    {
        return Employee::where('emp_id', $id)->update(['archive'=> $data->archive]);
    }


    public function editEmployeeInfo($request)
    {
        $id = Auth::user()->username;
        // $request = array_filter($request->all());
        $data = array('emp_id'=>Auth::user()->username, 'mobile'=>$request->mobile, 'phone'=>$request->phone, 'present_address'=>$request->present_address, 'permanent_address'=>$request->permanent_address, 'last_edu_achieve'=>$request->last_edu_achieve, 'experiance'=>$request->experiance, 'dob'=>$request->dob, 'blood_group'=>$request->blood_group,'gender'=>$request->gender,'status'=> "N");

        return DB::table('employee_edits')->updateOrInsert(['emp_id'=>$id], $data);
    }



    public function all()
    {
        return true;
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

    public static function filterEmployee($request, $query, array $whereFilterList, array $likeFilterList)
    {
        $query = self::likeQueryFilter($request, $query, $likeFilterList);
        $query = self::whereQueryFilter($request, $query, $whereFilterList);

        return $query;
    }

}
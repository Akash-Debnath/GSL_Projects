<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository implements RepositoryInterface
{
    
    public function getAllDepartment()
    {
       return $dept = Department::paginate(20);
    }


    public function createDepartment($data, $dept_code)
    {
        $departments = Department::create(['dept_code'=>$dept_code,'dept_name' => $data->dept_name, 'active'=>"Y"]);
        return $departments->save();
    }


    public function editDepartment($id)
    {
        return $incident = Department::where('id',$id)->first();
    }


    public function updateDepartment($request)
    {

        $data = $request->input('deptId');
        return $departments = Department::where('id', $data)->update(['dept_name'=>$request->dept_name]);
    }


    public function deleteDepartment($id)
    {
        return $department = Department::findorFail($id)->delete();
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

}
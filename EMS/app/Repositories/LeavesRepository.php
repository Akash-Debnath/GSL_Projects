<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
 class LeavesRepository implements RepositoryInterface{
    public function showLeaves(){
     
        return Department::all();
    }

// show employee leave-list
   
   public function get_dept_asc(){
    return Department::orderBy('dept_name','ASC')->get();
   }

   public function get_emp($request){
    $department = $request->dept;
    return Employee::where('dept_code',$department)->where('archive','N')->get();
   }

   public function get_auth_leave(){
    $year = Date('Y');
    return Leave::where('emp_id',Auth::user()->employeeInfo->emp_id)->whereYear('leave_start',$year)->get();
   }

   public function get_option(){
    return Option::where('option_name','leave_type')->get();
   }

   public function gen_leaves(){
    return Option::where('option_name','genuity_leaves_array')->get();
   }

// show employee leave-list

// employeeLeave

public function get_emp_leave($request){
    $year = $request->year;
    // $department = $request->dept;
    $staff = $request->emp;

    return Leave::where('emp_id',$staff)->whereYear('leave_start',$year)->where('m_approved_date','!=',NULL)->where('admin_approve_date','!=',NULL)->get();
}
// employee leave

// --------------finished leave-list

// leave-at-a-glance

public function show_leave_glance(){  
    return Leave::where('m_approved_date','!=',NULL)->where('admin_approve_date','!=',NULL)->get();   
}


// yearly-leave



//  show employee
public function showEmployee($request){
   
    $department = $request->dept;
    
    return Employee::whereIn('dept_code',$department)->where('archive','N')->get();   
}
// yearly-leave




    // leave today

   public function get_joined($request){
    $nD = date('Y-m-d', strtotime( $request->date . "- 1 days"));
   return Leave::whereDate('leave_end',$nD)->get();
   }
   
   public function get_leave_date($request){
    $date = date("Y-m-d", strtotime($request->date));
   return Leave::whereDate('leave_start','<=', $date)->whereDate('leave_end', '>=', $date)->get();
   }

   public function get_arc_emp(){
   return Employee::where('archive','N')->get();
   }
   //    finish
    // public function searchLeave(Request $request){
        
        
    //     // $leave = ;
      
    //     // $employee = 
    //     // $joined = Leave::whereDate('leave_end',$nD)->get();
    //     // return view('leave-today',compact('leave','employee','date','joined'));
    // }

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

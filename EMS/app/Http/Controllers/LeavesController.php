<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;

// -----repo
// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use App\Services\LeavesService;
use Illuminate\Support\Facades\Route;

class LeavesController extends Controller
{
    protected $leavesService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // leave-list
    // public function leaves(){
    //     return view('leave-list');
    //   }
    public function __construct(LeavesService $leavesService)
    {
        $this->LeavesService = $leavesService;
    } 
    public function showLeave(){
     
        $dept = $this->LeavesService->showLeaves();
        // $leave = Leave::where('emp_id',Auth::user()->employeeInfo->emp_id)->get();
       
       return view('leave-list',compact('dept'));
      }
//    auth leave
      public function showEmployee_leaveList(Request $request){
       
        $year = Date('Y');
        $dept =  $this->LeavesService->get_dept_asc();
        
        $department = $request->dept;
        $employee =  $this->LeavesService->get_emp($request);
        $leave = $this->LeavesService->get_auth_leave();
        // ->where('m_approved_date','!=',NULL)->where('admin_approve_date','!=',NULL)
        $option = $this->LeavesService->get_option();
        $genuity_leaves = $this->LeavesService->gen_leaves();
        return view('leave-list',compact('department','employee','dept','leave','option','genuity_leaves','year'));
    }
//    employee
      public function employeeLeave(Request $request){
      
       $year = $request->year;
    //    $department = $request->dept;
       $staff = $request->emp;
       $option = $this->LeavesService->get_option();;
       $genuity_leaves = $this->LeavesService->gen_leaves();
       $employee = $this->LeavesService->get_emp($request);
       $leave = $this->LeavesService->get_emp_leave($request);
   
       $dept = $dept = $this->LeavesService->showLeaves();
       
      
       return view('leave-list',compact('leave','dept','employee','option','genuity_leaves','staff','year'));
       
      }






// leave-at-a-glance
    public function index(){
     return view('leave-at-a-glance');
    }

    public function show_leave_glance(){
     
        $leave = Leave::where('m_approved_date','!=',NULL)->where('admin_approve_date','!=',NULL)->get();
        $dept = Department::orderBy('dept_name','ASC')->get();
        $leaves_array = Option::where('option_name','leave_type')->get();
        return view('leave-at-a-glance',compact('leave','dept','leaves_array'));
    }








// yearly-leave

   public function yearlyLeave(){
       return view('yearly-leave-report');
   }
   
   public function showYearlyLeave(){
    
    
    $dept = Department::orderBy('dept_name','ASC')->get();
    // $employee = Employee::where('archive','N')->get();
    return view('yearly-leave-report',compact('dept'));
   }

   public function showEmployee(Request $request){
       
       $dept = Department::orderBy('dept_name','ASC')->get();
       
       $department = $request->dept;
       
         
            // $employee = Employee::whereIn('dept_code',$department)->setBindings([$department])->where('archive','N')->get();
        
        // $employee = Employee::where('dept_code',$department)->where('archive','N')->get();
        if(is_null($department)){
            $employee = Employee::where('dept_code',$department)->where('archive','N')->get();
        }
        else{
            $employee = Employee::whereIn('dept_code',$department)->where('archive','N')->get();
        }
          
       return view('yearly-leave-report',compact('department','employee','dept'));
   }



    // leave today

   

    public function searchLeave(Request $request){
        $date = date("Y-m-d", strtotime($request->date));
        $nD = date('Y-m-d', strtotime( $request->date . "- 1 days"));
        $leave = Leave::whereDate('leave_start','<=', $date)->whereDate('leave_end', '>=', $date)->get();
      
        $employee = Employee::where('archive','N')->get();
        $joined = Leave::whereDate('leave_end',$nD)->get();
        return view('leave-today',compact('leave','employee','date','joined'));
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
        //
    }



    

      
}

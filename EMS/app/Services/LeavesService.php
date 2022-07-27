<?php
namespace App\Services;
use App\Repositories\LeavesRepository;

class LeavesService{
    public function __construct(LeavesRepository $leavesRepository)
    {
        $this->LeavesRepository = $leavesRepository;
    }

    public function showLeaves(){
        return $this->LeavesRepository->showLeaves();    
    }

// show employee leave-list
   
   public function get_dept_asc(){
    return $this->LeavesRepository->get_dept_asc();
   }

   public function get_emp($request){
    // $department = $request->dept;
    return $this->LeavesRepository->get_emp($request);
   }

   public function get_auth_leave(){
    // $year = Date('Y');
    return $this->LeavesRepository->get_auth_leave();
   }

   public function get_option(){
    return $this->LeavesRepository->get_option();
   }

   public function gen_leaves(){
    return $this->LeavesRepository->gen_leaves();
   }

// show employee leave-list

// employeeLeave

public function get_emp_leave($request){
    // $year = $request->year;
    // $department = $request->dept;
    // $staff = $request->emp;

    return $this->LeavesRepository->get_emp_leave($request);
}
// employee leave

// --------------finished leave-list

// leave-at-a-glance

public function show_leave_glance(){  
    return $this->LeavesRepository->show_leave_glance();   
}


// yearly-leave



//  show employee
public function showEmployee($request){
   
    // $department = $request->dept;
    
    return $this->LeavesRepository->showEmployee($request);   
}
// yearly-leave




    // leave today

   public function get_joined($request){
    // $nD = date('Y-m-d', strtotime( $request->date . "- 1 days"));
   return $this->LeavesRepository->get_joined($request);
   }
   
   public function get_leave_date($request){
    // $date = date("Y-m-d", strtotime($request->date));
   return $this->LeavesRepository->get_leave_date($request);
   }

   public function get_arc_emp(){
   return $this->LeavesRepository->get_arc_emp();
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

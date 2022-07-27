<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\Option;
use App\Models\Department;
use DateTime;
use Illuminate\Support\Facades\Date;

class pendingLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::where('archive', 'N')->get();
        $approval = Leave::where('m_approved_date', NULL)->where('admin_approve_date', NULL)->where('cancel_req_date', NULL)->orderBy('emp_id', 'asc')->get();
        // $approval = Leave::where('leave_approval',NULL)->orderBy('emp_id','asc')->get();
        $verify = Leave::where('m_approved_date', '!=', NULL)->where('admin_approve_date', NULL)->orderBy('emp_id', 'asc')->get();
        $cancel = Leave::where('cancel_approve_date', '!=', NULL)->get();
        $option = Option::where('option_name', 'leave_type')->get();

        return view('pending-leave', compact('approval', 'verify', 'employee', 'cancel', 'option'));
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

    //  view leave to leave-req
    public function show($eid, $id, $date)
    {
        // $date=date('2019');
        // $now = strtotime($date);
        $id = $id;
        $ls = "";
        $date = $date;
        $year = date('Y', strtotime($date));
        $employee = Employee::where('archive', 'N')->get();
        //    $leave = Leave::where('emp_id',$id)->whereYear('leave_date',$year)->where('admin_approve_date' , NULL)->where('m_approved_date','!=',NULL)->whereDate('leave_start',$date)->get();
        $leave = Leave::where('id', $id)->get();
        $status = Leave::where('emp_id', $eid)->whereYear('leave_start', $year)->where('admin_approve_date' ,'!=', NULL)->where('m_approved_date','!=',NULL)->get();
        $genuity_leaves = Option::where('option_name', 'genuity_leaves_array')->get();
        $option = Option::where('option_name', 'leave_type')->get();
        return view('send-leave-request', compact('leave', 'option', 'id', 'eid', 'genuity_leaves', 'employee', 'date', 'ls', 'status', 'year'));
    }


    //  view leave to leave-req
    public function edit_leave($eid, $id, $date)
    {
        // $date=date('2019');
        // $now = strtotime($date);
        $id = $id;
        $ls = "";
        $date = $date;
        $year = date('Y', strtotime($date));
        $employee = Employee::where('archive', 'N')->get();
        //    $leave = Leave::where('emp_id',$id)->whereYear('leave_date',$year)->where('admin_approve_date' , NULL)->where('m_approved_date','!=',NULL)->whereDate('leave_start',$date)->get();
        $leave = Leave::where('id', $id)->get();
        $status = Leave::where('emp_id', $eid)->whereYear('leave_start', $year)->where('admin_approve_date' ,'!=', NULL)->where('m_approved_date','!=',NULL)->get();
        $genuity_leaves = Option::where('option_name', 'genuity_leaves_array')->get();
        $option = Option::where('option_name', 'leave_type')->get();

        //    foreach($leave as $l){
        //     if($l->leave_type == 'AL'){
        //     //   $div =   strip_tags("<div class=' '><label class=''>Balance:</label></div> <div class=' mt-2'><label class='mt-2'>From</label><input type='date' name='from' id='from' class='form-control'></div> <div class=' mt-2'><label class='mt-2'>To</label><input type='date' name='to' id='to' class='form-control'></div><div class='mt-3'><label>Day(s)</label></div>");

        //     }
        //    }

        return view('send-leave-request', compact('leave', 'option', 'id', 'eid', 'genuity_leaves', 'employee', 'date', 'ls', 'status', 'year'));
    }


    // update leave -req

    public function update_req(Request $req, $id)
    {
        $u_leave_type = $req->u_leave_type;
        $leave_start = $req->from;
        $leave_end = $req->to;
        $leave_date = $leave_end;
        $time_slot  = NULL;
        $date1 = new DateTime($leave_start);
        $date2 = new DateTime($leave_end);
        $period = $date1->diff($date2)->days;
        if ($u_leave_type == 'HL') {
            $leave_date = $req->date;
            $leave_start = $leave_date;
            $leave_end = $leave_date;
            $time_slot = $req->time_slot;
        }

        //    $employee = Employee::where('archive','N')->get();
        $data = array(
            
            'leave_start' => $leave_start,
            'leave_end' => $leave_end, 'leave_date' => $leave_date, 'time_slot' => $time_slot, 'leave_type' => $u_leave_type, 'period' => $period
        );
        // dd($data);
        $update = Leave::where('id', $id)->update($data);


        return redirect('leave-list');
    }

    // show leave to leave-list

    public function showLeaves($id, $date)
    {
        // $date=date('2019');
        // $now = strtotime($date);
        $year = date('Y', strtotime($date));
        //    $department = $request->dept;
        $staff = $id;
        $option = Option::where('option_name', 'leave_type')->get();
        $genuity_leaves = Option::where('option_name', 'genuity_leaves_array')->get();
        $employee = Employee::where('emp_id', $id)->where('archive', 'N')->get();
        $leave = Leave::where('emp_id', $staff)->whereYear('leave_date', $year)->where('m_approved_date', '!=', NULL)->where('admin_approve_date', '!=', NULL)->get();

        $dept = Department::all();


        return view('leave-list', compact('leave', 'dept', 'year', 'employee', 'option', 'genuity_leaves', 'staff'));
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
    public function update(Request $req, $id)
    {
        $ls = $req->ls;


        $manager_id = Auth::user()->employeeInfo->emp_id;
        $comment1 = $req->comment1;
        $comment2 = $req->comment2;
        $comment3 = $req->comment3;
        $a = $req->a1;
        if ($a == 'A') {
            $m_approve_date = date('Y-m-d');
            $cancel_req_date = NULL;
            $m_remark = $req->m_remark;
        } elseif ($a == 'R') {
            $m_approve_date = NULL;
            $cancel_req_date = date('Y-m-d');
            $m_remark = $req->m1_remark;
        }

        $data = array(
            'm_approved_date' => $m_approve_date,
            'manager_remark' => $m_remark,
            'comment1' => $comment1,
            'comment2' => $comment2,
            'comment3' => $comment3,
            'manager_id' => $manager_id,
            'cancel_req_date' => $cancel_req_date
        );

        $approve = Leave::where('id', $id)->update($data);

        return redirect('pending-leave');
    }


    public function Leave_Verify(Request $req, $id)
    {
        $ls = $req->ls;


        $admin_id = Auth::user()->employeeInfo->emp_id;
        // $comment1 = $req->comment1;
        // $comment2=$req->comment2;
        // $comment3=$req->comment3;
        $v = $req->v1;
        if ($v == 'V') {
            $admin_approve_date = date('Y-m-d');
            $cancel_approve_date = NULL;
            $a_remark = $req->a_remark;
        } elseif ($v == 'R') {
            $admin_approve_date = NULL;
            $cancel_approve_date = date('Y-m-d');
            $a_remark = $req->a1_remark;
        }

        $data = array(
            'admin_approve_date' => $admin_approve_date,
            'admin_remark' => $a_remark,

            'admin_id' => $admin_id,
            'cancel_approve_date' => $cancel_approve_date
        );

        $approve = Leave::where('id', $id)->update($data);

        return redirect('pending-leave');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function cancel_req(Request $req, $id){
         $cancel_req_date=Date('Y-m-d');

         $data = array('cancel_req_date'=> $cancel_req_date);

         $cancel_req = Leave::where('id',$id)->update($data);
         return redirect('leave-list');
    }

    public function deleteLeave($id)
    {
        $delete = Leave::where('id', $id)->delete();


        return redirect('leave-list');
    }
    public function destroy($id)
    {
        //
    }
}

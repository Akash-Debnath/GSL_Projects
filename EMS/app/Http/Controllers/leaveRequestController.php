<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Leave;
use App\Models\Leave_attachment;
use App\Models\Employee;
use DateTime;
use Illuminate\Support\Facades\Auth;
class leaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $year=date('Y');
        $today = ('Y-m-d');
        $ls = "";
        $employee = Employee::where('archive','N')->get();
        $eid = Auth::user()->employeeInfo->emp_id;
        // $id = Auth::user()->employeeInfo->Leave->id;
        // $id=Auth::user()->username;
        $id = "";
        $year = date('Y');
        $option = Option::where('option_name','leave_type')->get();
        $leave = Leave::where('emp_id',$eid)->where('leave_start',$today)->get();
        $status = Leave::where('emp_id',$eid)->whereYear('leave_start',$year)->get();
       $genuity_leaves =Option::where('option_name','genuity_leaves_array')->get();
       return view('send-leave-request',compact('option','leave','genuity_leaves','eid','id','employee','ls','status','year'));
    }
    

    // public function component(Request $request){

    //     // return view('send-leave-request');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $leave_type = $req->leave_type;
        $from = $req->from;
        $to = $req->to;
        $date = $req->date;
        $time_slot = $req->time_slot;
        $address_d_l = $req->address_d_l;
        $special_reason = $req->special_leave;
        $file = $req->filename;
        $date1 = new DateTime($from);
        $date2 = new DateTime($to);
        $period = $date1->diff($date2)->days;
        $emp_id = Auth::user()->employeeInfo->emp_id;
        $leave = new Leave;
        
        if($leave_type == 'HL'){
            $from = new DateTime();
            $to = new DateTime();
        
        }

       $data = array(
            'leave_type' =>$leave_type,
            'leave_start' => $from ,
            'leave_end' => $to,
            'leave_date' =>$date,
            'time_slot' =>$time_slot,
            'address_d_l'=>$address_d_l,
            'special_reason' => $special_reason,
            'period'=>$period,
            'emp_id'=> $emp_id,
        );


      
        
     
        // $c = Leave_attachment::create($data1);
        $leave_req = Leave::create($data);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\late_early_req;
use App\Models\Employee;
use DateTime;
use Illuminate\Support\Facades\Auth;
class Late_early_reqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // late-early-pending-req
    public function index()
    {   $employee = Employee::all();
        $approve = late_early_req::where('approved','N')->where('verified','N')->get();
        $verify = late_early_req::where('verified','N')->where('approved','Y')->get();
        $ac =  late_early_req::where('approved','N')->where('verified','N')->count();
        $ve = late_early_req::where('verified','N')->where('approved','Y')->count();
        return view('late-early-pending-req',compact('approve','ac','verify','ve','employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  late-early-req
    public function late_early_req(){
        return view('late-early-req');
    }
    public function create(Request $req)
    {
        $l = new late_early_req;
        $late = $req->late;
        $early = $req->early;
        $absent = $req->absent;
        $special = $req->special;
        $date = $req->date;
        $reason = $req->reason;
        $emp_id = Auth::user()->employeeInfo->emp_id;

        if(empty($late)){
            $late = "N";
        }
        if(empty($early)){
          $early="N";
        }
       if( empty($absent)){
           $absent="N"; 
        }
       if(empty($special)){
            $special="N";
        }
        $data = array(

            'emp_id' => $emp_id,
            
            'date' => $req->date,
            'late_req' =>$late,
            'early_req' =>$early,
            'absent_req' =>$absent,
            'special_req' => $special,
            'reason' => $req->reason,
            // 'approved' => 'N',
            // 'verified'=>'N',
            // 'approved_time'=>  date("Y-m-d", strtotime("$req->date")),
            // 'approved_by'=>"",
            //  'verified_time'=> date("Y-m-d", strtotime("$req->date")),
            //  'verified_by'=>""
          );

         $store =  late_early_req::create($data);
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

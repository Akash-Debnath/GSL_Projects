<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\EmployeeRosterSchedule;
use App\Models\RosterSlot;
use App\Models\RosteringControl;
use App\Models\WeekendTemp;
use App\Models\RosteringTemp;
use App\Traits\QueryTrait;
use Illuminate\Support\Facades\Auth;


class RosterSetRepository implements RepositoryInterface
{

    public function getAllEmployee($request)
    {
        $dept  = $request->dept_code;
        $roster = $request->roster;
        return Employee::where('archive','=', "N")->where('dept_code',$dept )->where('roster', $roster)->orderByRaw('CONVERT(emp_id, Signed) ASC')->get();
    }


    public function getAllSlot($request)
    {
        $dept  = $request->dept_code;
        return RosterSlot::where('dept_code',$dept )->get();
    }

    
    public function getAllDepartment()
    {
        return Department::with('employee')->orderBy('dept_name', 'ASC')->get();
    }


    public function setRosterSameTime($request)
    {
       
        $from = $request->sdate;
        $to = $request->edate;
        $employees = explode(',',$request->emp_ids);
        $weekends = $request->weekend;
        
        $startTime = $request->stime;
        $endTime = $request->etime;

        foreach($employees as $emp)
        {   
            for ( $i = $from; $i <= $to; $i = $i + 86400 )
            {   
                $thisDate = date( 'Y-m-d', $i );
               
                $day = date('l', $i);
                
                foreach($weekends as $wk)
                {
                    if(strtolower($day)==strtolower($wk)) {
                        $per[]=[
                            'emp_id' => $emp,
                            'ddate' => $thisDate,
                            'start_time' => '',
                            'end_time' => '',
                            'dept_code' => $request->dept_code,
                            'is_holiday' => "W",
                        ];
                    } else {
                        $per[]=[
                            'emp_id' => $emp,
                            'ddate' => $thisDate,
                            'start_time' => $thisDate." ".$startTime,
                            'end_time' => $thisDate." ".$endTime,
                            'dept_code' => $request->dept_code,
                            'is_holiday' => '',
                        ];
                    }
                }
            }
        }
        return EmployeeRosterSchedule::insert($per);
    }



    public function setRosterMoreWeekend($request)
    {
        $employees = explode(',',$request->emp_ids);
        $weekends = $request->weekend;
        
        $startTime = $request->stime;
        $endTime = $request->etime;

        $from = $request->sdate;
        $to = $request->edate;
                 
        $rosterControl[]=[
            'emp_id' => $request->emp_ids,
            'dept_code' => $request->dept_code,
            'sdate' => date( 'Y-m-d', $request->sdate),
            'edate' => date( 'Y-m-d', $request->edate),
            'reason' => $request->reason,
            'sender_id' => Auth::user()->username,
            'admin_id' => 'NULL'
        ];

        RosteringControl::insert($rosterControl);


        foreach($employees as $emp)
        {   
            for ( $i = $from; $i <= $to; $i = $i + 86400 )
            {   
                $thisDate = date( 'Y-m-d', $i );
                $day = date('l', $i);
                
                foreach($weekends as $wk)
                {
                    if(strtolower($day)==strtolower($wk)) {
                        $weekendTemp[]=[
                            'emp_id' => $emp,
                            'date' => $thisDate
                        ];
                    } else {
                        $rosteringTemp[]=[
                            'emp_id' => $emp,
                            'stime' => $thisDate." ".$startTime,
                            'etime' => $thisDate." ".$endTime,
                            'is_incharge' => 'N'
                        ];
                    }
                }
            }
        }
        WeekendTemp::insert($weekendTemp);
        RosteringTemp::insert($rosteringTemp);
        return;
    }




    public function setRosterCustomTime($request)
    {
        dd($request);
    }







    


    public function rosterPrivilege($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'type'=>$request->type])->save();
    }


    public function managementPrivilege($request)
    {
        return Setting::create(['emp_id'=> $request->emp_id, 'type'=>$request->type])->save();
    }

    public function all()
    {
        return true;
    }


    public function get($id)
    {
        return true;
    }



    public function create($data)
    {
    }



    public function update(array $data, $id)
    {
        return true;
    }



    public function delete($id)
    {
        return Setting::findorFail($id)->delete();
    }



    public function deleteAdmin($id)
    {
        return Setting::findorFail($id)->delete();
    }


    public function deleteRoster($id)
    {
        return Setting::findorFail($id)->delete();
    }


    public function deleteManagement($id)
    {
        return Setting::findorFail($id)->delete();
    }

}
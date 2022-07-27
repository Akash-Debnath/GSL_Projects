<?php

namespace App\Helpers;

use App\Models\Department;

class Helper {


    public static function deptCodeGenerator($dept_name)
    {

        $dept_name = preg_replace("/[^a-zA-Z]+/", "", $dept_name);

        $existing_dept_code = Department::get()->pluck('dept_code')->toarray();

        for($i=0;$i<strlen($dept_name);$i++) {
            $deptCode =strtoupper($dept_name[0].$dept_name[$i+1]);
            if (!in_array($deptCode, $existing_dept_code)) 
            {
                return  $deptCode;
                break;
            }
            
        }
        return null;
	}

}


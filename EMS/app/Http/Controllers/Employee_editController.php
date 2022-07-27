<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Employee_editController extends Controller
{
    public function employee_edit(){
        return view('profile-update-request');
    }
}

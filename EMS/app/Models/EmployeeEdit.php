<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEdit extends Model
{
    use HasFactory;
    protected $table = "employee_edits";
    protected $fillable = ['emp_id', 'mobile', 'phone', 'present_address', 'permanent_address', 'last_edu_achieve', 'experiance', 'dob', 'blood_group', 'gender', 'status'];
}

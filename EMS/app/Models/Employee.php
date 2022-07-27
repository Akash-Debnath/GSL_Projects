<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'emp_id',
        'name',
        'dept_code',
        'designation',
        'mobile',
        'phone',
        'email',
        'jdate',
        'dob',
        'gender',
        'status',
        'grade_id',
        'blood_group',
        'image',
        'pass',
        'cur_status',
        'status_time',
        'online',
        'login_time',
        'pass_req',
        'active',
        'home_phone',
        'present_address',
        'permanent_address',
        'last_edu_achieve',
        'archive',
        'resignation_date',
        'office_stime',
        'office_etime',
        'scheduled_attendance',
        'roster',
        'key',
        'key_date',
        'experience'

    ];


    public function department()
    {
        return $this->hasOne(Department::class, 'dept_code','dept_code');
    }

    public function userDesignation()
    {
        return $this->hasOne(Designation::class, 'id', 'designation');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    public function status()
    {
        return $this->hasOne(Status_log::class, 'status');
    }


    public function getUser()
    {
        return $this->belongsTo(User::class, 'username', 'emp_id');
    }

    public function attachment()
    {
        return $this->hasMany(Attach_msg::class, 'message_from', 'emp_id');
    }

   
    public function job_desc()
    {
        return $this->hasOne(Job_desc_files::class , 'emp_id' ,'emp_id');
    }

    public function leave(){
        return $this->hasMany(Leave::class , 'emp_id' ,'emp_id');
    }

    public function  late_early_req(){
        return $this->hasMany(late_early_req::class,'emp_id','emp_id');
    }
   
    public function evaluation()
    {
        return $this->hasMany(Evaluation::class, 'emp_id', 'emp_id');
    }

    // public function facility()
    // {
    //     return $this->hasMany(Facility::class, 'emp_id', 'emp_id');
    // }

    public function evaluationOne()
    {
        return $this->hasOne(Evaluation::class, 'emp_id', 'emp_id')->orderBy('eve_from','desc');
    }

    public function weekend()
    {
        return $this->hasOne(weekend::class, 'emp_id', 'emp_id');
    }
    public function iorecord()
    {
        return $this->hasMany(Iorecords_temp::class, 'emp_id', 'emp_id');
    }

    
}

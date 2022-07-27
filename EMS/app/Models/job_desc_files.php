<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Job_desc_files extends Model
{
    use HasFactory;
    protected $table = 'Job_desc_files';
    
    protected $fillable = ['id', 'emp_id', 'file_name'];
     
   

    

    
}



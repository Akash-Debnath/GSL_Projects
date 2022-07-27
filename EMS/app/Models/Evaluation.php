<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';


    public function employee()
    {
        return $this->belongTo(Employee::class, 'emp_id', 'emp_id');
    }
}

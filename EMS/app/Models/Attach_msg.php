<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attach_msg extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'message', 'message_date', 'read_by', 'message_from', 'message_to', 'custom_recipient', 'is_encrypted'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'message_from', 'emp_id');
    }
}

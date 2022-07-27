<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table ="policies";
    protected $fillable = ['policy_title'];

    public function policyFile()
    {
        return $this->hasOne(Attach_file::class, 'id', 'id');
    }
}

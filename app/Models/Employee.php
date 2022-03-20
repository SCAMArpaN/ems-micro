<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employee_info";
    /**
     * @var mixed
     */

    public function Deparment(){
        return $this->belongsTo(Department::class,"d_id",'id');
    }

    public function Education(){
        return $this->belongsTo(Education::class,"ed_id",'id');
    }

    public function Hobby(){
        return $this->belongsTo(Hobby::class,"h_id",'id');
    }
}

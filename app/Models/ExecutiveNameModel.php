<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class ExecutiveNameModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'executive_name';
    protected $fillable = ['name'];
    public $timestamps = false;

   

}

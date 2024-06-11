<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    use HasFactory;
    protected $table = 'tblbasic';
    //protected $fillable = ['categoryname'];
    public $timestamps = false;

    public static function getPro()
    {
        return self::all();
    }

    

}

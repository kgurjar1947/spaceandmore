<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiresModel extends Model
{
    use HasFactory;
    protected $table = 'tblenquiries';
    
    public $timestamps = false;

    public static function getAllNow()
    {
         $enquries = self::all();
         return $enquries;
    
    }
}

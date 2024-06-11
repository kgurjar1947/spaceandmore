<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = 'tblcontacts';
    
    public $timestamps = false;

    public static function getAllNow()
    {
         $contacts = self::all();
         return $contacts;
    
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialModel extends Model
{
    use HasFactory;

    protected $table = 'tblcommercial';
    //protected $fillable = ['categoryname'];
    public $timestamps = false;


}

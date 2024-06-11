<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tblsubcategory';
    protected $fillable = ['subcategoryname'];
    public $timestamps = false;

    public static function getSubCat()
    {
        return self::all();
    }

}

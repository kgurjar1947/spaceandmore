<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Models\SubCategoryModel;
use DB;
class CategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tblcategory';
    protected $fillable = ['categoryname'];
    public $timestamps = false;

    public static function getAllNow()
    {
         $categorylist = self::all();
         $arr = array();
         foreach($categorylist as $cl){
            $arr1 = array();

            $catdata = SubCategoryModel::select('subcategoryname')->where('categoryid', $cl->id)->get();
            foreach($catdata as $sc){
                $arr1[] = $sc->subcategoryname;
            } 
            
            $subcatlist = implode(", ",$arr1);
            unset($arr1);

            $arr[] = array("categoryname"=> $cl->categoryname,"id"=>$cl->id,"subcat"=>$subcatlist);
         }   
         return $arr;
    
    }

      public static function getAllNow_byuser()
    {  
        $arr = array();
         $id = \Session::get('id');
         $categorylist = DB::table('tblcategory')->where(['created_by'=>$id])->whereNull('deleted_at')->get();
         foreach($categorylist as $cl){
            $arr1 = array();
            $catdata = SubCategoryModel::select('subcategoryname')->where(['categoryid' => $cl->id])->get();
            foreach($catdata as $sc){
                $arr1[] = $sc->subcategoryname;
            } 
            
            $subcatlist = implode(", ",$arr1);
            unset($arr1);
            $arr[] = array("categoryname"=> $cl->categoryname,"id"=>$cl->id,"subcat"=>$subcatlist);
         }   
         return $arr;
    
    }
    public static function getAllSubcat()
    {

        $orders = SubCategoryModel::select('tblsubcategory.*', 'tblcategory.categoryname as categoryname')
                ->join('tblcategory', 'tblsubcategory.categoryid', '=', 'tblcategory.id')
                ->get();
        return $orders;
        /*return self::select('tblcategory.id', 'tblcategory.categoryname')
        ->union(function ($query) {
            $query
                ->select('tblsubcategory.id', 'tblsubcategory.subcategoryname', 'tblsubcategory.createdate')
                ->from('tblsubcategory')
                ->join('tblcategory', 'tblsubcategory.categoryid', '=', 'tblcategory.id');
        })
        ->get();*/

        /*return DB::table('tblcategory')
        ->select('tblcategory.id', 'tblcategory.categoryname')
        ->union(DB::table('tblsubcategory')
            ->select('tblsubcategory.id', 'tblsubcategory.subcategoryname', 'tblsubcategory.createdate')
            ->join('tblcategory', 'tblsubcategory.categoryid', '=', 'tblcategory.id'))
        ->get();*/

    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyModel;
use App\Models\CommercialModel;
use App\Models\CategoryModel;
use App\Models\BasicModel;
use App\Models\EnquiresModel;
use App\Models\SubCategoryModel;
use App\Models\ContactModel;
use DB;
use Mail;
use Validator;
use App\Mail\EnquiryMail;
use App\Mail\ContactMail;
use App\Facades\ResponseHelper;

class WebsiteController extends Controller
{
    public function index(Request $request){
        $scd = array();
        $categorydata = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }

        $property = PropertyModel::where('approval',1)->where('status',1)->orderBy('id', 'desc')->limit(5)->get();
        $commercial = CommercialModel::where('approval',1)->where('status',1)->orderBy('id', 'desc')->limit(5)->get();
        
        $favourites_property = PropertyModel::where('favourites',1)->where('status',1)->where('approval',1)->orderBy('id', 'desc')->get();
        $favourites_commercial = CommercialModel::where('favourites',1)->where('status',1)->where('approval',1)->orderBy('id', 'desc')->get();
        $get_new_cat = CategoryModel::whereNotIn('id',array(1,2))->get();
        $results = DB::table('tblsubcategory')
        ->select('tblsubcategory.subcategoryname', 'tblsubcategory.id', 'tblsubcategory.categoryid', DB::raw("COUNT('tblproperty.id') as count_property"), DB::raw("COUNT('tblcommercial.id') as count_commercial"), DB::raw("COUNT('tblbasic.id') as count_basic"))
        ->join('tblcategory','tblsubcategory.categoryid','=','tblcategory.id')
        ->leftJoin('tblproperty','tblsubcategory.id','=','tblproperty.subcategoryid')
        ->leftJoin('tblcommercial','tblsubcategory.id','=','tblcommercial.subcategoryid')
        ->leftJoin('tblbasic','tblsubcategory.id','=','tblbasic.subcategoryid')
        ->whereNull('tblsubcategory.deleted_at')
        ->whereNull('tblcategory.deleted_at')
        ->groupBy('tblsubcategory.subcategoryname')
        ->get();
        
         $property_cat = SubCategoryModel::where('categoryid', 1)->get();
        $commercial_cat = SubCategoryModel::where('categoryid', 2)->get();
        $basic_cat = SubCategoryModel::whereNotIn('categoryid', [1,2])->get();
        $location = DB::table('location')->get();
        $bhk = DB::table('bhk')->get();
        $floor = DB::table('floor')->get();
        $facing = DB::table('facing')->get();
        return view('website/newsite',compact('property_cat','commercial_cat','property','commercial','categorydata','favourites_commercial','favourites_property','get_new_cat','results','basic_cat','location','bhk','floor','facing'));
    }

    public function aboutus(Request $request){

        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        return view('website/aboutus',compact('categorydata'));
    }
    
    
    public function business_parks(Request $request){
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        return view('website/business_parks',compact('categorydata'));
    }
    
    public function propertie_management(Request $request){
         $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        return view('website/propertie_management',compact('categorydata'));
    }
    
    public function property_consulting(Request $request){
         $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        return view('website/property_consulting',compact('categorydata'));
    }
    
    public function contactus(Request $request){
        
         if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'number'=>'required',
                'email'=>'required',
                'purpose'=>'required',
                'message'=>'required',
                'g-recaptcha-response' => 'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                $contact = new ContactModel;
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->number = $request->number;
                $contact->purpose = $request->purpose;
                $contact->message = $request->message;
                $contact->save();
                $success = true;
                $message = array('success'=>array('Proerty Management Service added successfully'));
                 $new_data = array('name' => $request->name,'email' => $request->email,'phone' => $request->phone,'purpose' => $request->purpose,'message' => $request->message);
                 Mail::to("webcontact@spacesandmore.com")->cc(['gopichandmallela8@gmail.com','sridharkatta.d@gmail.com'])->send(new EnquiryMail($new_data));
            }
         return ResponseHelper::returnResponse(200,$success,$message);
        }
        

        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }

        return view('website/contactus',compact('categorydata'));
    }



    public function viewcity(Request $request){
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }

            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
           $id =request()->segment(2) ?? '1';
           $city_name =request()->segment(3) ?? '1';
           $property = PropertyModel::Where('categoryid',$id)->where('location', $city_name)->where('status',1)->where('approval',1)->get();
           $property1 = CommercialModel::Where('categoryid',$id)->where('location', $city_name)->where('status',1)->where('approval',1)->get();
           $property2 = BasicModel::Where('categoryid',$id)->where('location', $city_name)->where('status',1)->where('approval',1)->get();
           $get_category_name = SubCategoryModel::where('id',$scr["id"])->pluck('subcategoryname')->first();
            return view('website/viewcity',compact('categorydata','property','get_category_name','property1','property2'));
        }
        
        
    public function viewstatusofproperty(Request $request){
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }

            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        $id =request()->segment(2) ?? '1';
        $city_name =request()->segment(3) ?? '1';
           $property = PropertyModel::Where('categoryid',$id)->where('leadtype', $city_name)->get();
           $property1 = CommercialModel::Where('categoryid',$id)->where('leadtype', $city_name)->get();
           $property2 = BasicModel::Where('categoryid',$id)->where('leadtype', $city_name)->get();
           $get_category_name = SubCategoryModel::where('id',$scr["id"])->pluck('subcategoryname')->first();
            return view('website/viewcity',compact('categorydata','property','get_category_name','property1','property2'));
        }

    
    public function viewcatsub(Request $request,$cid,$scid){
        $sort_by = $_GET['sort_by'] ?? '';
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        if($cid == 1){
            $sort_by = $_GET['sort_by'] ?? '';
            if(!empty($sort_by == 1)){
                 $property = PropertyModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
            }elseif(!empty($sort_by == 2)){
               $property = PropertyModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('totalprice', 'DESC')->get(); 
            }elseif(!empty($sort_by == 3)){
                $property = PropertyModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('totalprice', 'ASC')->get(); 
            }else{
                 $property = PropertyModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
            }
           
        }elseif($cid == 2){
            $sort_by = $_GET['sort_by'] ?? '';
            if(!empty($sort_by == 1)){
            $property = CommercialModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
            }elseif(!empty($sort_by == 2)){
               $property = CommercialModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('totalprice', 'DESC')->get(); 
            }elseif(!empty($sort_by == 3)){
                $property = CommercialModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('totalprice', 'ASC')->get();
            }else{
            $property = CommercialModel::where("categoryid",$cid)->where("subcategoryid",$scid)->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
            }
        }else{
            $property = [];
        }

        $subcatdetasils = SubCategoryModel::where('id', $scid)->first();
        
        return view('website/viewcatsub',compact('property','categorydata','subcatdetasils'));
    }


 function new_subview(Request $request,$cid,$scid){
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
            $property = PropertyModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->orderBy('id', 'desc')->get();
            $property1 = CommercialModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->orderBy('id', 'desc')->get();
            $property2 = BasicModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->orderBy('id', 'desc')->get();
           $subcatdetasils = SubCategoryModel::where('id', $scid)->first();
           $total_count = count($property) + count($property1) + count($property2);
        return view('website/new_subview',compact('property','property1','property2','categorydata','subcatdetasils','total_count'));
    }
 
  function viewfitter(Request $request,$id){
               $to = array();
               $from = array();
               $price_range = explode('-', $_GET['price_range']);
               $from = $price_range[0] ?? '';
               $to = $price_range[1] ?? '';
               $sort_by = $_GET['sort_by'] ?? '';
               $cat = $_GET['cat'] ?? '';
               $type = $_GET['type'] ?? '';
               $leadtype = $_GET['leadtype'] ?? '';
               $location = $_GET['location'] ?? '';
               $bhk_name = $_GET['bhk_name'] ?? '';
               $facing_name = $_GET['facing_name'] ?? '';
               $property_id= $_GET['property_id'] ?? '';
        if($id == 1){
               
                 if(!empty($sort_by == 1)){
                            $property = PropertyModel::query()->when($type, function($q)use($request){
                            $q->where('subcategoryid', $type);})->when($leadtype, function($q)use($request){
                            $q->where('leadtype',$leadtype);})->when($location, function($q)use($request){
                            $q->where('location',$location);})->when($bhk_name, function($q)use($request){
                            $q->where('communitydetails',$bhk_name);})->when($facing_name, function($q)use($request){
                            $q->where('propertyfacing',$facing_name);})->when($property_id, function($q)use($request){
                            $q->where('propertyid',$property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
                 }elseif(!empty($sort_by == 2)){
                            $property = PropertyModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                           $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('communitydetails',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'desc')->get();
                 }elseif(!empty($sort_by == 3)){
                            $property = PropertyModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                            $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('communitydetails',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'asc')->get();
                 }else{
                     
                         //dd($request->all());
                            $property = PropertyModel::query()->when($request->type, function($q)use($request){
                            $q->where('subcategoryid', $request->type);})->when($request->leadtype, function($q)use($request){
                            $q->where('leadtype',$request->leadtype);})->when($request->location, function($q)use($request){
                            $q->where('location',$request->location);})->when($request->bhk_name, function($q)use($request){
                            $q->where('communitydetails',$request->bhk_name);})->when($request->facing_name, function($q)use($request){
                            $q->where('propertyfacing',$request->facing_name);})->when($request->property_id, function($q)use($request){
                            $q->where('propertyid',$request->property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('id', 'desc')->get();
                 }
        }elseif($id == 2){
            //dd($request->all());
               $to = array();
               $from = array();
               $price_range = explode('-', $_GET['price_range']);
               $from = $price_range[0] ?? '';
               $to = $price_range[1] ?? '';
               $sort_by = $_GET['sort_by'] ?? '';
               $cat = $_GET['cat'] ?? '';
               $type = $_GET['type'] ?? '';
               $leadtype = $_GET['leadtype'] ?? '';
               $location = $_GET['location'] ?? '';
               $bhk_name = $_GET['bhk_name'] ?? '';
               $facing_name = $_GET['facing_name'] ?? '';
               $property_id= $_GET['property_id'] ?? '';
                 if(!empty($sort_by == 1)){
                       $property = CommercialModel::query()->when($request->type, function($q)use($request){
                            $q->where('subcategoryid', $request->type);})->when($request->leadtype, function($q)use($request){
                            $q->where('leadtype',$request->leadtype);})->when($request->location, function($q)use($request){
                            $q->where('location',$request->location);})->when($request->builtuparea, function($q)use($request){
                            $q->where('builtuparea',$request->builtuparea);})->when($request->facing_name, function($q)use($request){
                            $q->where('propertyfacing',$request->facing_name);})->when($request->property_id, function($q)use($request){
                            $q->where('propertyid',$request->property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->orderBy('id', 'desc')->where('status',1)->get();
                 }elseif(!empty($sort_by == 2)){
                       $property = CommercialModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                            $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('builtuparea',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'desc')->get();
                 }elseif(!empty($sort_by == 3)){
                            $property = CommercialModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                            $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('builtuparea',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'asc')->get();
                 }else{
                     //dd($request->all());
                            $property = CommercialModel::query()->when($request->type, function($q)use($request){
                            $q->where('subcategoryid', $request->type);})->when($request->leadtype, function($q)use($request){
                            $q->where('leadtype',$request->leadtype);})->when($request->location, function($q)use($request){
                            $q->where('location',$request->location);})->when($request->bhk_name, function($q)use($request){
                            $q->where('builtuparea',$request->bhk_name);})->when($request->facing_name, function($q)use($request){
                            $q->where('propertyfacing',$request->facing_name);})->when($request->property_id, function($q)use($request){
                            $q->where('propertyid',$request->property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('id', 'desc')->get();
                            
                            
                       
                 }
        }else{
                  if(!empty($sort_by == 1)){
                            $property = BasicModel::query()->when($type, function($q)use($request){
                            $q->where('subcategoryid', $type);})->when($leadtype, function($q)use($request){
                            $q->where('leadtype',$leadtype);})->when($location, function($q)use($request){
                            $q->where('location',$location);})->when($bhk_name, function($q)use($request){
                            $q->where('communitydetails',$bhk_name);})->when($facing_name, function($q)use($request){
                            $q->where('propertyfacing',$facing_name);})->when($property_id, function($q)use($request){
                            $q->where('propertyid',$property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('id', 'DESC')->get();
                 }elseif(!empty($sort_by == 2)){
                            $property = BasicModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                           $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('communitydetails',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'desc')->get();
                 }elseif(!empty($sort_by == 3)){
                            $property = BasicModel::query()->when($_GET['type'], function($q)use($request){
                            $q->where('subcategoryid', $_GET['type']);})->when($_GET['leadtype'], function($q)use($request){
                            $q->where('leadtype',$_GET['leadtype']);})->when($_GET['location'], function($q)use($request){
                            $q->where('location',$_GET['location']);})->when($_GET['bhk_name'], function($q)use($request){
                            $q->where('communitydetails',$_GET['bhk_name']);})->when($_GET['facing_name'], function($q)use($request){
                            $q->where('propertyfacing',$_GET['facing_name']);})->when($_GET['property_id'], function($q)use($request){
                            $q->where('propertyid',$_GET['property_id']);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('totalprice', 'asc')->get();
                 }else{
                         //dd($request->all());
                            $property = BasicModel::query()->when($request->type, function($q)use($request){
                            $q->where('subcategoryid', $request->type);})->when($request->leadtype, function($q)use($request){
                            $q->where('leadtype',$request->leadtype);})->when($request->location, function($q)use($request){
                            $q->where('location',$request->location);})->when($request->bhk_name, function($q)use($request){
                            $q->where('communitydetails',$request->bhk_name);})->when($request->facing_name, function($q)use($request){
                            $q->where('propertyfacing',$request->facing_name);})->when($request->property_id, function($q)use($request){
                            $q->where('propertyid',$request->property_id);})->WhereBetween('totalprice',[$from, $to])->where('approval',1)->where('status',1)->orderBy('id', 'desc')->get();
                 }
        }
        $scd = array();
        $scr = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }
        $get_category_name = SubCategoryModel::where('id',$scr["id"])->pluck('subcategoryname')->first();
        $categoryname = CategoryModel::where('id',$id)->pluck('categoryname')->first();
        $property_main =  $property ?? [];
        return view('website/viewfitter',compact('categorydata','property_main','get_category_name','categoryname'));
    }

    public function residential_details(Request $request,$id){

        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }

        $row = PropertyModel::where('id', $id)->first();

        /*$property = PropertyModel::getPro();
        return view('website/newsite',compact('property'));*/
        
        $commercial = PropertyModel::orderBy('id', 'desc')->limit(3)->get();
        
        
        return view('website/commercial_details',compact('row','categorydata','commercial'));
    }

    
    public function commercial_details(Request $request,$id){
        $scd = array();
        $categoryres = CategoryModel::getAllNow();
        foreach($categoryres as $cr){
            $subcatdata = SubCategoryModel::where('categoryid', $cr["id"])->get();
            foreach($subcatdata as $scr){
                $scd[] = array("subcatid"=>$scr["id"],"subcategoryname"=>$scr["subcategoryname"]);
            }
            
            $categorydata[] = array("catid"=>$cr["id"],"categoryname"=>$cr["categoryname"],"subcat"=>$scd);
            unset($scd);
        }

        $row = CommercialModel::where('id', $id)->first();
        $commercial = CommercialModel::orderBy('id', 'desc')->limit(3)->get();
        return view('website/commercial_details',compact('row','categorydata','commercial'));
    }

    
    
    function propertie_enq1(Request $request){
          $data_insert = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'type_of_loan' => $request->type_of_loan ?? '',
            'message' => $request->message,
            'propertyid' => $request->pro_name,
          );
          $res = EnquiresModel::insert($data_insert);
          if(!empty($res)){
            return redirect()->back()->with('alert','hello');
          }else{
            return redirect()->back()->with('alert','hello');
          }
          
        }


        public function propertie_enq(Request $request){
            $request->validate([
                'name'          => 'required',
                'email'         => 'required|email',
                'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'type_of_loan'       => 'nullable',
                'pro_name'       => 'nullable',
                'message'       => 'required',
            ]);
            $contact = new EnquiresModel;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->purpose = $request->type_of_loan;
            $contact->message = $request->message;
            $contact->save();
            return response()->json(['success'=>'Successfully']);
        }
        
        
        
         public function propertie_form(Request $request){
          
            $request->validate([
                'name'          => 'required',
                'email'         => 'required|email',
                'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'type_of_loan'       => 'nullable',
                'pro_name'       => 'nullable',
                'pro_id'       => 'nullable',
                'message'       => 'required',
            ]);
            $contact = new EnquiresModel;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->propertyid = $request->pro_name;
            $contact->property = $request->pro_id;
            $contact->type_of_loan = $request->type_of_loan;
            $contact->message = $request->message;
            $contact->save();
             $new_data = array('name' => $request->name,'email' => $request->email,'phone' => $request->phone,'propertyid' => $request->pro_name, 'property' => $request->pro_id,'message' => $request->message);
            Mail::to("webcontact@spacesandmore.com")->cc(['gopichandmallela8@gmail.com','sridharkatta.d@gmail.com'])->send(new ContactMail($new_data));
            return response()->json(['success'=>'Successfully']);
        }



 public function new_propertie_form(Request $request){
          
            $request->validate([
                'name'          => 'required',
                'email'         => 'required|email',
                'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'type_of_loan'       => 'nullable',
                'message'       => 'required',
            ]);
            $contact = new ContactModel;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->number = $request->phone;
            $contact->purpose = $request->type_of_loan;
            $contact->message = $request->message;
            $contact->save();
            $new_data = array('name' => $request->name,'email' => $request->email,'phone' => $request->phone,'type_of_loan' => $request->type_of_loan,'message' => $request->message);
            Mail::to("webcontact@spacesandmore.com")->cc(['gopichandmallela8@gmail.com','sridharkatta.d@gmail.com'])->send(new EnquiryMail($new_data));
            return response()->json(['success'=>'Successfully']);
        }
        public function enquiryform(Request $request){
            $request->validate([
                'name'          => 'required',
                'email'         => 'required|email',
                'number'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'type_of_loan'       => 'nullable',
                'message'       => 'required',
            ]);
            $contactm = new ContactModel;
            $contactm->name = $request->name;
            $contactm->number = $request->number;
            $contactm->email = $request->email;
            $contactm->purpose = $request->purpose;
            $contactm->message = $request->message; 
                $contactm->save();
            return response()->json(['success'=>'Successfully']);
        }



function propertie_form_new(Request $request){
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'number'=>'required',
                'email'=>'required',
                'purpose'=>'required',
                'message'=>'required',
                'g-recaptcha-response' => 'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                $contact = new ContactModel;
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->phone = $request->number;
                $contact->propertyid = $request->pro_name;
                $contact->property = $request->pro_id;
                $contact->type_of_loan = $request->type_of_loan;
                $contact->message = $request->message;
                $contact->save();
                $success = true;
                $message = array('success'=>array('Proerty Management Service added successfully'));
            }
         return ResponseHelper::returnResponse(200,$success,$message);
        }
     }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\PropertyModel;
use App\Models\BasicModel;
use App\Models\LocationModel;
use App\Models\CommercialModel;
use App\Models\EnquiresModel;
use App\Models\ExecutiveNameModel;

use App\Models\ContactModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Collection;
use Validator;
use App\Facades\ResponseHelper;

class AdminController extends Controller {
    public function dashboard(Request $request){
            return view('admin/dashboard');
    }

    public function category(Request $request){
        if(auth()->user()->type == 'super_admin'){
            $categorydata = CategoryModel::getAllNow();
        }elseif(auth()->user()->type == 'admin'){
            $categorydata = CategoryModel::getAllNow_byuser();
        }
    $subcategorydata = SubCategoryModel::get();
    return view('admin/category',compact('categorydata','subcategorydata'));
    }

    public function add_category(Request $request){
            return view('admin/add_category');
    }

     public function addnewcategory(Request $request){
        $catm = new CategoryModel;
        $catm->categoryname = $request->category;
        $catm->created_by = $request->id;
        if($catm->save()){
            $categoryid = $catm->id;
            foreach($request->subcategory as $subcat){
                $subcatm = new SubCategoryModel;
                $subcatm->categoryid = $categoryid;
                $subcatm->subcategoryname = $subcat;
                $subcatm->created_by = $request->id;
                $subcatm->save();
            }
            return response()->json([
                "status"=>1,"message" => "Category Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
    }

    
    public function edit_category(Request $request,$id){
            $category = CategoryModel::where('id', $id)->first();
            $subcatdata = SubCategoryModel::where('categoryid', $id)->get();
            return view('admin/edit_category',compact('category','subcatdata'));
    }

    public function delete_category(Request $request,$id){
        if(CategoryModel::where('id',$id)->exists()){
            $cm = CategoryModel::find($id);
            $cm->delete();
            return redirect()->back()->with('success', 'Record has been deleted successfully');
        }
        else{
            return redirect()->back();
        }
    }

 public function delete_sub_category(Request $request,$id){
        if(SubCategoryModel::where('id',$id)->exists()){
            $cm = SubCategoryModel::find($id);
            $cm->delete();
            return redirect()->back()->with('success', 'Record has been deleted successfully');
        }
        else{
            return redirect()->back();
        }
    }

 
    public function executive_name(Request $request){
    $executive_namedata = DB::table('executive_name')->select('*')->get();
    return view('admin/executive_name',compact('executive_namedata'));
    }

    public function add_executive_name(Request $request){
            return view('admin/add_executive_name');
    }



   public function location(Request $request){
    $locationdata = DB::table('location')->select('*')->get();
    return view('admin/location',compact('locationdata'));
    }
     
     
     public function addnewexecutive_name(Request $request){
        $catm = new ExecutiveNameModel;
        $catm->name = $request->name;
        $catm->created_by = $request->id;
        if($catm->save()){
            return response()->json([
                "status"=>1,"message" => "Exective Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
    }
    
    
    
     public function edit_executive_name(Request $request,$id){
            $executive_name = DB::table('executive_name')->where('id', $id)->first();
            return view('admin/edit_executive_name',compact('executive_name'));
    }

    public function delete_executive_name(Request $request,$id){
        if(DB::table('executive_name')->where('id',$id)->exists()){
            $cm = DB::table('executive_name')->where('id', $id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

 public function editexecutive_namenow(Request $request){
        $location_name = $request->name;
        $id = $request->catid;
        if(DB::table('executive_name')->where('id',$id)->exists()){
        DB::table('executive_name')->where('id', $id)->update(['name' => $request->name]);
        return response()->json([
            "status"=>1, "message" => "Executive Name Updated."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0, "message" => "Location Not Found."
            ],404);
        }
    }
    
    public function add_location(Request $request){
            return view('admin/add_location');
    }

     public function addnewlocation(Request $request){
        $catm = new LocationModel;
        $catm->location_name = $request->location;
        $catm->location_slug = Str::slug($request->location);
        $catm->created_by = $request->id;
        if($catm->save()){
            return response()->json([
                "status"=>1,"message" => "Location Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
    }

    
    public function edit_location(Request $request,$id){
            $location = DB::table('location')->where('id', $id)->first();
            return view('admin/edit_location',compact('location'));
    }

    public function delete_location(Request $request,$id){
        if(DB::table('location')->where('id',$id)->exists()){
            $cm = DB::table('location')->where('id', $id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

 public function editlocationnow(Request $request){
        $location_name = $request->location;
        $id = $request->catid;
        if(DB::table('location')->where('id',$id)->exists()){
        DB::table('location')->where('id', $id)->update(['location_name' => $request->location, 'location_slug'=> Str::slug($request->location)]);
        return response()->json([
            "status"=>1, "message" => "Location Updated."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0, "message" => "Location Not Found."
            ],404);
        }
    }


    public function bhk(Request $request){
        $bhkdata = DB::table('bhk')->select('*')->get();
        return view('admin/bhk',compact('bhkdata'));
        }
    
        public function add_bhk(Request $request){
                return view('admin/add_bhk');
        }
    
         public function addnewbhk(Request $request){
            $insert_array = array(
                "bhk_name" => $request->bhk_name,
                "created_by" => $request->id,
            );
            if(DB::table('bhk')->insert($insert_array)){
                return response()->json([
                    "status"=>1,"message" => "BHK Added Successfully!."
            ],201);
            }
            else{
                return response()->json([
                    "status"=>0,"message" => "Something Went Wrong!"
                ],201);
            }
        }
    
        
        public function edit_bhk(Request $request,$id){
                $bhk = DB::table('bhk')->where('id', $id)->first();
                return view('admin/edit_bhk',compact('bhk'));
        }
    
        public function delete_bhk(Request $request,$id){
            if(DB::table('bhk')->where('id',$id)->exists()){
                $cm = DB::table('bhk')->where('id', $id)->delete();
                return redirect()->back();
            }
            else{
                return redirect()->back();
            }
        }
    
     public function editbhknow(Request $request){
            $bhk_name = $request->bhk_name;
            $id = $request->catid;
            if(DB::table('bhk')->where('id',$id)->exists()){
            DB::table('bhk')->where('id', $id)->update(['bhk_name' => $request->bhk_name]);
            return response()->json([
                "status"=>1, "message" => "BHK Updated."
            ],201);
            }
            else{
                return response()->json([
                    "status"=>0, "message" => "BHK Not Found."
                ],404);
            }
        }


        public function floor(Request $request){
            $floordata = DB::table('floor')->select('*')->get();
            return view('admin/floor',compact('floordata'));
            }
        
            public function add_floor(Request $request){
                    return view('admin/add_floor');
            }
        
             public function addnewfloor(Request $request){
                $insert_array = array(
                    "floor_name" => $request->floor_name,
                    "created_by" => $request->id,
                );
                if(DB::table('floor')->insert($insert_array)){
                    return response()->json([
                        "status"=>1,"message" => "Floor Added Successfully!."
                ],201);
                }
                else{
                    return response()->json([
                        "status"=>0,"message" => "Something Went Wrong!"
                    ],201);
                }
            }
        
            
            public function edit_floor(Request $request,$id){
                    $floor = DB::table('floor')->where('id', $id)->first();
                    return view('admin/edit_floor',compact('floor'));
            }
        
            public function delete_floor(Request $request,$id){
                if(DB::table('floor')->where('id',$id)->exists()){
                    $cm = DB::table('floor')->where('id', $id)->delete();
                    return redirect()->back();
                }
                else{
                    return redirect()->back();
                }
            }
        
         public function editfloornow(Request $request){
                $floor_name = $request->floor_name;
                $id = $request->catid;
                if(DB::table('floor')->where('id',$id)->exists()){
                DB::table('floor')->where('id', $id)->update(['floor_name' => $request->floor_name]);
                return response()->json([
                    "status"=>1, "message" => "Floor Updated."
                ],201);
                }
                else{
                    return response()->json([
                        "status"=>0, "message" => "Floor Not Found."
                    ],404);
                }
            }


            public function facing(Request $request){
                $facingdata = DB::table('facing')->select('*')->get();
                return view('admin/facing',compact('facingdata'));
                }
            
                public function add_facing(Request $request){
                        return view('admin/add_facing');
                }
            
                 public function addnewfacing(Request $request){
                    $insert_array = array(
                        "facing_name" => $request->facing_name,
                        "created_by" => $request->id,
                    );
                    if(DB::table('facing')->insert($insert_array)){
                        return response()->json([
                            "status"=>1,"message" => "Facing Added Successfully!."
                    ],201);
                    }
                    else{
                        return response()->json([
                            "status"=>0,"message" => "Something Went Wrong!"
                        ],201);
                    }
                }
            
                
                public function edit_facing(Request $request,$id){
                        $facing = DB::table('facing')->where('id', $id)->first();
                        return view('admin/edit_facing',compact('facing'));
                }
            
                public function delete_facing(Request $request,$id){
                    if(DB::table('facing')->where('id',$id)->exists()){
                        $cm = DB::table('facing')->where('id', $id)->delete();
                        return redirect()->back();
                    }
                    else{
                        return redirect()->back();
                    }
                }
            
             public function editfacingnow(Request $request){
                    $id = $request->catid;
                    if(DB::table('facing')->where('id',$id)->exists()){
                    DB::table('facing')->where('id', $id)->update(['facing_name' => $request->facing_name]);
                    return response()->json([
                        "status"=>1, "message" => "Facing Updated."
                    ],201);
                    }
                    else{
                        return response()->json([
                            "status"=>0, "message" => "Facing Not Found."
                        ],404);
                    }
                }
    

    
    public function delete_subcategory(Request $request){
        if(SubCategoryModel::where('id',$request->subcatid)->exists()){
            $scm = SubCategoryModel::find($request->subcatid);
            $scm->delete();
            return response()->json([
                "status"=>1,"message" => "Sub Category Deleted Successfully!."
            ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!."
            ],201);
        }
    }

    /* editcategorynow */
    
    public function editcategorynow(Request $request){
        $categoryname = $request->category;
        $id = $request->catid;
        if(CategoryModel::where('id',$id)->exists()){
        $cm = CategoryModel::find($id);
        $cm->categoryname = is_null($categoryname) ? $cm->categoryname : $categoryname;
        $cm->save();
        SubCategoryModel::where('categoryid', $id)->delete();
        foreach($request->subcategory as $subcat){
            $subcatm = new SubCategoryModel;
            $subcatm->categoryid = $id;
            $subcatm->subcategoryname = $subcat;
            $subcatm->save();
        }
        return response()->json([
            "status"=>1, "message" => "Category Updated."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0, "message" => "Category Not Found."
            ],404);
        }
    }






    public function subcategory(Request $request){
            $subcategorydata = CategoryModel::getAllSubcat();
            return view('admin/subcategory',compact('subcategorydata'));
    }

    public function add_sub_category(Request $request){
            $categorydata = CategoryModel::getAllNow();
            return view('admin/add_sub_category',compact('categorydata'));
    }
    
    public function addnewsubcategory(Request $request){
        $subcatm = new SubCategoryModel;
        $subcatm->categoryid = $request->categoryid;
        $subcatm->subcategoryname = $request->subcategory;

        if($subcatm->save()){
            return response()->json([
                "status"=>1,"message" => "Sub Category Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
    }

    public function add_property(Request $request){
                $categorydata = CategoryModel::getAllNow();
                return view('admin/add_property',compact('categorydata'));
    }

    
    public function add_propertycatsub(Request $request){
                $categorydata = CategoryModel::getAllNow();
                $categoryid = $request->categoryid;
                $subcategoryid = $request->subcategoryid;
                if($categoryid==1){
                    $Property_id = $this->getNextPropertyNumber(3);
                    $subcatview = "add_propertycatsub";
                }elseif($categoryid==2){
                    $Property_id = $this->getNextCommercialNumber(3);
                    $subcatview = "add_propertycatsubcom";
                }else{
                    $Property_id = $this->getNextbasicNumber(3);
                    $subcatview = "add_propertycatsubbasic";
                }
                $location = DB::table('location')->get();
                 $executive_name = DB::table('executive_name')->get();
                $bhk = DB::table('bhk')->get();
                $floor = DB::table('floor')->get();
                $facing = DB::table('facing')->get();
                return view('admin/'.$subcatview,compact('categorydata','executive_name','categoryid','subcategoryid','Property_id','location','bhk','floor','facing'));
    }


 public function status_property(Request $request){
       //dd($request->all());
       $user_id = \Session::get('id');
	    if(!empty($request->all())) {
	        if($user_id == 1){
	        if(!empty($request->input('feature'))){
	            $update_arr = array(
                'status' => $request->input('feature'),
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            );
	        }else{
	            $update_arr = array(
                'status' => 0,
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            );
	        }}else{
	           if(!empty($request->input('feature'))){
	            $update_arr = array(
	             'approval' => 0,
                'status' => $request->input('feature'),
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            );
	        }else{
	            $update_arr = array(
	           
                'status' => 0,
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            );
	        } 
	        }
            
            if($request->input('cat') == 1){
            $affectedRows = PropertyModel::where("id", $request->input('idname'))->update($update_arr);
            }elseif($request->input('cat') == 2){
                $affectedRows = CommercialModel::where("id", $request->input('idname'))->update($update_arr);
            }else{
                $affectedRows = BasicModel::where("id", $request->input('idname'))->update($update_arr);
            }
			if($request->input('feature') == '1'){			
                return redirect()->back()->with('success', 'Property Enable Status update successful');
			}else{
			   return redirect()->back()->with('error', 'Property Disable Status update successful');
			}
	    }else{
	        return redirect()->back();
	    }
    }


public function status_approval_property(Request $request){
        //dd($request->all());
	    if (!empty($request->all())) {
            if($request->cat == 1){
                $propertymodel = PropertyModel::find($request->input('idname'));
                $propertymodel->approval = $request->input('feature')  ?? 1;
                $propertymodel->created_at = date('Y-m-d H:i:s');
                $propertymodel->updated_by = $request->input('updated_by');
                $propertymodel->update();
            }elseif($request->cat == 2){
                $commercialmodel = CommercialModel::find($request->input('idname'));
                $commercialmodel->approval = $request->input('feature')  ?? 1;
                $commercialmodel->created_at = date('Y-m-d H:i:s');
                $commercialmodel->updated_by = $request->input('updated_by');
                $commercialmodel->update();
            }else{
                $basicmodel = BasicModel::find($request->input('idname'));
                $basicmodel->approval = $request->input('feature') ?? 1;
                $basicmodel->created_at = date('Y-m-d H:i:s');
                $basicmodel->updated_by = $request->input('updated_by');
                $basicmodel->update();
            }
			if($request->input('feature') == '1'){		
                return redirect()->back()->with('success', 'Approval Enable Status update successful');
			}else{
			   return redirect()->back()->with('error', 'Approval Disable Status update successful');
			}
	    }else{
	        return redirect()->back();
	    }
    }

    public function status_favourites_property(Request $request){
        //dd($request->all());
	    if (!empty($request->all())) {
	        if(!empty($request->input('feature'))){
            $update_arr = array(
                'favourites' => $request->input('feature'),
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            );
	        }else{
	           $update_arr = array(
                'favourites' => 0,
                'created_at' =>    date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            ); 
	        }
            if($request->input('cat') == 1){
                $affectedRows = PropertyModel::where("id", $request->input('idname'))->update($update_arr);
            }elseif($request->input('cat') == 2){
                $affectedRows = CommercialModel::where("id", $request->input('idname'))->update($update_arr);
            }else{
                $affectedRows = BasicModel::where("id", $request->input('idname'))->update($update_arr); 
            }
			if($request->input('feature') == '1'){			
                return redirect()->back()->with('success', 'Hot Property Enable update successfully');
			}else{
			   return redirect()->back()->with('error','Hot Property Disable update successfully');
			}
	    }else{
	        return redirect()->back();
	    }
    }
    
    public function getsubcategory(Request $request){
    $catdata = SubCategoryModel::where('categoryid', $request->category_id)->whereNull('deleted_at')->get();
        if(!empty($catdata)){  
            $res = array("status"=>1,"catdata"=>$catdata);  
            return response()->json($res);            
        }
        else{
            $res = array("status"=>0,"message"=>"Admin Not Found!");
            return response()->json($res);
        }
    }

    
    public function enquires(Request $request){
    $enquiresdata = EnquiresModel::latest('createdate')->get();
    return view('admin/enquires',compact('enquiresdata'));
    }
  
    public function delete_enquires(Request $request,$id){
        if(EnquiresModel::where('id',$id)->exists()){
            $cm = EnquiresModel::find($id);
            $cm->delete();
             return redirect()->back()->with('success','Record Delete Successfully');
        }
        else{
            return redirect()->route('admin.enquires');
        }
    }


 public function delete_restore(Request $request,$id){
        if(CategoryModel::onlyTrashed()->where('id',$id)->exists()){
            $cm = CategoryModel::withTrashed()->find($id);
            $cm->restore();
            return redirect()->back()->with('success','Record Category Restore Successfully');
        }
        else{
           return redirect()->back();
        }
    }
    
     public function delete_permanently(Request $request,$id){
        if(CategoryModel::onlyTrashed()->where('id',$id)->exists()){
            $cm = CategoryModel::withTrashed()->find($id);
            $cm->forceDelete();
            return redirect()->back()->with('success','Record Category Permanently Delete Successfully');
        }
        else{
           return redirect()->back();
        }
    }



public function delete_sub_restore(Request $request,$id){
        if(SubCategoryModel::onlyTrashed()->where('id',$id)->exists()){
            $cm = SubCategoryModel::withTrashed()->find($id);
            $cm->restore();
            return redirect()->back()->with('success','Record Sub Category Restore Successfully');
        }
        else{
           return redirect()->back();
        }
    }
    
     public function delete_sub_permanently(Request $request,$id){
        if(SubCategoryModel::onlyTrashed()->where('id',$id)->exists()){
            $cm = SubCategoryModel::withTrashed()->find($id);
            $cm->forceDelete();
            return redirect()->back()->with('success','Record Sub Category Permanently Delete Successfully');
        }
        else{
           return redirect()->back();
        }
    }

    
    public function addnewpropertycom(Request $request){
        $storagePath = public_path('uploads'); // You can change the folder path
        if(!empty($request->file('proimages'))){
            $uploadedImagePaths = [];
        // Loop through each uploaded file
        foreach ($request->file('proimages') as $image) {
            // Generate a unique file name
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($storagePath, $imageName);
            $uploadedImagePaths[] = 'uploads/' . $imageName;
        }
        }
        if(!empty($request->file('file'))){
        $uploadedImagePathsPlan = [];
        // Loop through each uploaded file
        foreach ($request->file('file') as $image2) {
            // Generate a unique file name
            $imageName2 = time() . '_' . $image2->getClientOriginalName();
            $image2->move($storagePath, $imageName2);
            $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
        }}
        $propertym = new CommercialModel;
    $propertym->categoryid = $request->category_id;
    $propertym->subcategoryid = $request->subcategory_id;
    $propertym->propertyname = $request->propertyname;
    $propertym->propertyid = $request->propertyid;
    $propertym->executivename = $request->executivename;
    $propertym->date = $request->date;
    $propertym->ownername = $request->ownername;
    $propertym->ownernumber = $request->ownernumber;
    $propertym->contact_two = $request->contact_two; 
    $propertym->email = $request->email;
    $propertym->supervisorname = $request->supervisorname; 
    $propertym->supervisornumber = $request->supervisornumber;
    $propertym->source = $request->source;    
    $propertym->websiteid = $request->websiteid;    
    $propertym->leadtype = $request->leadtype;    
    $propertym->description = $request->description;    
    $propertym->servicecharge = $request->servicecharge;    
    $propertym->hotproperty = $request->hotproperty ?? '';     
    $propertym->smproperty = $request->smproperty;    
    $propertym->location = $request->location;
    $propertym->landmark = $request->landmark;    
    $propertym->totalprice = $request->totalprice;
    $propertym->pricepersft = $request->pricepersft;    
    $propertym->maintenance = $request->maintenance;    
    $propertym->deposit = $request->deposit;    
    $propertym->lockin = $request->lockin;     
    $propertym->builtuparea = $request->builtuparea;    
    $propertym->availablefrom = $request->availablefrom;    
    $propertym->availabledate = $request->availabledate;    
    $propertym->dgbackup = $request->dgbackup;       
    $propertym->ac = $request->ac;    
    $propertym->floor = $request->floor;    
    $propertym->totalfloors = $request->totalfloors;    
    $propertym->carparking = $request->carparking;    
    $propertym->lift = $request->lift;    
    $propertym->security = $request->security;   
    $propertym->onsitemanager = $request->onsitemanager;    
    $propertym->bathrooms = $request->bathrooms;
    $propertym->age = $request->age;    
    $propertym->plotarea = $request->plotarea;    
    $propertym->carpetarea = $request->carpetarea;
    $propertym->propertyfacing = $request->propertyfacing;    
    $propertym->keyavailable = $request->keyavailable;
    $propertym->suitablefor = implode(',', $request->suitablefor);
    
    $propertym->commercialsubtype = $request->commrecialsubtype;
    $propertym->commercialfurinished = $request->commrecialfurinished;
    $propertym->othercommunity = $request->othercommunity;

    $propertym->workstations = $request->workstations;
    $propertym->managercabins = $request->managercabins;
    $propertym->discussionrooms = $request->discussionrooms;
    $propertym->conferencerooms = $request->conferencerooms;
    $propertym->boardrooms = $request->boardrooms;
    $propertym->reception  = $request->reception;
    $propertym->pantry = $request->pantry;
    $propertym->lunchroom = $request->lunchroom;
    $propertym->serverroom = $request->serverroom;
    $propertym->leadtime = $request->leadtime;
    $propertym->liableupto = $request->liableupto;
    $propertym->dateinend = $request->dateinend;   
    $propertym->amenities = implode(',', $request->amenities);
    $propertym->locations = $request->locations;
    $propertym->proimages = implode(', ',$uploadedImagePaths);
    $propertym->file = implode(', ', $uploadedImagePathsPlan);
    
    if($propertym->save()){
        return response()->json([
            "status"=>1,"message" => "Property Added Successfully!."
    ],201);
    }
    else{
        return response()->json([
            "status"=>0,"message" => "Something Went Wrong!"
        ],201);
    }

        return response()->json($request);
    }     
    
    
     public function editnewpropertycom(Request $request){
         $propertym = CommercialModel::find($request->id);
        //dd($request->commrecialsubtype);
        $storagePath = public_path('uploads'); // You can change the folder path
        
        // Loop through each uploaded file
        $images = $request->file('proimages');
        if(!empty($images)){
         if($request->hasFile('proimages')){
            $uploadedImagePaths = [];
            foreach ($request->file('proimages') as $image) {
                // Generate a unique file name
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($storagePath, $imageName);
                $uploadedImagePaths[] = 'uploads/' . $imageName;
            }
            // $propertym->proimages = implode(', ',$uploadedImagePaths);
            $proimages = implode(', ',$uploadedImagePaths);
            $cate_name = CommercialModel::where('id',$request->id)->pluck('proimages')->first();
            $propertym->proimages = $proimages.', '.$cate_name;
        }}
        if(!empty($request->hasFile('file'))){
        if($request->hasFile('file')){
        $uploadedImagePathsPlan = [];
        // Loop through each uploaded file
        foreach ($request->file('file') as $image2) {
            // Generate a unique file name
            $imageName2 = time() . '_' . $image2->getClientOriginalName();
            $image2->move($storagePath, $imageName2);
            $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
        }
        //$propertym->file = implode(', ', $uploadedImagePathsPlan);
        $propertymfile = implode(', ', $uploadedImagePathsPlan);
        $cate_namefile = CommercialModel::where('id',$request->id)->pluck('file')->first();
        $propertym->file = $propertymfile.', '.$cate_namefile;
        }}else{
            $propertym->file = NULL;
        }
        
        $propertym->propertyname = $request->propertyname;
        $propertym->propertyid = $request->propertyid;
        $propertym->executivename = $request->executivename;
        $propertym->date = $request->date;
        $propertym->ownername = $request->ownername;
        $propertym->ownernumber = $request->ownernumber;
        $propertym->contact_two = $request->contact_two;
        $propertym->email = $request->email;
        $propertym->supervisorname = $request->supervisorname;
        $propertym->supervisornumber = $request->supervisornumber;
        $propertym->source = $request->source;    
        $propertym->websiteid = $request->websiteid;    
        $propertym->leadtype = $request->leadtype;    
        $propertym->description = $request->description;    
        $propertym->servicecharge = $request->servicecharge;    
        $propertym->hotproperty = $request->hotproperty ?? '';     
        $propertym->smproperty = $request->smproperty;    
        $propertym->location = $request->location;
        $propertym->landmark = $request->landmark;    
        $propertym->totalprice = $request->totalprice;
        $propertym->pricepersft = $request->pricepersft;    
        $propertym->maintenance = $request->maintenance;    
        $propertym->deposit = $request->deposit;    
        $propertym->lockin = $request->lockin;     
        $propertym->builtuparea = $request->builtuparea;    
        $propertym->availablefrom = $request->availablefrom;    
        $propertym->availabledate = $request->availabledate;    
        $propertym->dgbackup = $request->dgbackup;       
        $propertym->ac = $request->ac;    
        $propertym->floor = $request->floor;    
        $propertym->totalfloors = $request->totalfloors;    
        $propertym->carparking = $request->carparking;    
        $propertym->lift = $request->lift;    
        $propertym->security = $request->security;   
        $propertym->onsitemanager = $request->onsitemanager;    
        $propertym->bathrooms = $request->bathrooms;
        $propertym->age = $request->age;    
        $propertym->plotarea = $request->plotarea;    
        $propertym->carpetarea = $request->carpetarea;
        $propertym->propertyfacing = $request->propertyfacing;    
        $propertym->keyavailable = $request->keyavailable;
        $propertym->suitablefor = implode(',', $request->suitablefor);
        $propertym->landmark_gps = $request->landmark_gps;
        $propertym->subcategoryid = $request->commercialsubtype;
        $propertym->commercialfurinished = $request->commercialfurinished;
        $propertym->othercommunity = $request->othercommunity;
        $propertym->building_name = $request->building_name;
        $propertym->unit = $request->unit;
        
        $propertym->workstations = $request->workstations;
        $propertym->video_url = $request->video_url;
        $propertym->managercabins = $request->managercabins;
        $propertym->discussionrooms = $request->discussionrooms;
        $propertym->conferencerooms = $request->conferencerooms;
        $propertym->boardrooms = $request->boardrooms;
        $propertym->reception  = $request->reception;
        $propertym->pantry = $request->pantry;
        $propertym->lunchroom = $request->lunchroom;
        $propertym->serverroom = $request->serverroom;
        $propertym->leadtime = $request->leadtime;
        $propertym->liableupto = $request->liableupto;
        $propertym->created_at = date("y-m-d H:i:s");
        $propertym->dateinend = $request->dateinend; 
        if(!empty($request->amenities)){
            $propertym->amenities = implode(',', $request->amenities);
        }
        
        $propertym->locations = $request->locations;
        $propertym->approval = $request->approval;
        if($propertym->update()){
            return response()->json([
                "status"=>1,"message" => "Property Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }

            return response()->json($request);
        }     
    
    
     

    
    
    
    

    public function addnewproperty(Request $request){
        //$res = array("status"=>0,"message"=>"Admin Not Found!");
     
            // Define the storage folder path
    $storagePath = public_path('uploads'); // You can change the folder path
    
    if(!empty($request->file('proimages'))){
        $uploadedImagePaths = [];
    // Loop through each uploaded file
    foreach ($request->file('proimages') as $image) {
        // Generate a unique file name
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($storagePath, $imageName);
        $uploadedImagePaths[] = 'uploads/' . $imageName;
    }}
 if(!empty($request->file('file'))){
    $uploadedImagePathsPlan = [];

    // Loop through each uploaded file
    foreach ($request->file('file') as $image2) {
        // Generate a unique file name
        $imageName2 = time() . '_' . $image2->getClientOriginalName();
        $image2->move($storagePath, $imageName2);
        $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
    }}

    $propertym = new PropertyModel;

    $propertym->categoryid = $request->category_id;
    $propertym->subcategoryid = $request->subcategory_id;
    $propertym->propertyname = $request->propertyname;
    $propertym->propertyid = $request->propertyid;
    $propertym->executivename = $request->executivename;
    $propertym->date = $request->date;
    $propertym->ownername = $request->ownername;
    $propertym->ownernumber = $request->ownernumber;
    $propertym->contact_two = $request->contact_two;
    $propertym->email = $request->email;
    $propertym->supervisorname = $request->supervisorname;
    $propertym->supervisornumber = $request->supervisornumber;
    $propertym->source = $request->source;    
    $propertym->websiteid = $request->websiteid;    
    $propertym->leadtype = $request->leadtype;    
    $propertym->description = $request->description;    
    $propertym->servicecharge = $request->servicecharge;    
    $propertym->hotproperty = $request->hotproperty ?? '';     
    $propertym->smproperty = $request->smproperty;
    $propertym->building_name = $request->building_name;
    $propertym->unit = $request->unit;
    $propertym->location = $request->location;
    $propertym->landmark = $request->landmark;    
    $propertym->totalprice = $request->totalprice;
    $propertym->pricepersft = $request->pricepersft;    
    $propertym->maintenance = $request->maintenance;    
    $propertym->deposit = $request->deposit;    
    $propertym->lockin = $request->lockin;     
    $propertym->builtuparea = $request->builtuparea;    
    $propertym->availablefrom = $request->availablefrom;    
    $propertym->availabledate = $request->availabledate;    
    $propertym->dgbackup = $request->dgbackup;       
    $propertym->ac = $request->ac;    
    $propertym->floor = $request->floor;    
    $propertym->totalfloors = $request->totalfloors;    
    $propertym->carparking = $request->carparking;    
    $propertym->lift = $request->lift;    
    $propertym->security = $request->security;   
    $propertym->onsitemanager = $request->onsitemanager;    
    $propertym->bathrooms = $request->bathrooms;
    $propertym->age = $request->age;    
    $propertym->plotarea = $request->plotarea;    
    $propertym->carpetarea = $request->carpetarea;
    $propertym->propertyfacing = $request->propertyfacing;    
    $propertym->keyavailable = $request->keyavailable;
    $propertym->suitablefor = implode(', ', $request->suitablefor);
    
    $propertym->residentialsubtype = $request->residentialsubtype;
    $propertym->residentialfurinished = $request->residentialfurinished;
    $propertym->othercommunity = $request->othercommunity;
    $propertym->communitydetails = $request->communitydetails;
    $propertym->geysers = $request->geysers;
    $propertym->wardrobes = $request->wardrobes;    
    $propertym->bachelors = $request->bachelors;
    $propertym->clinic = $request->clinic; 
    $propertym->servantroom = $request->servantroom;
    $propertym->petsallowed = $request->petsallowed;
    $propertym->clubhouse = $request->clubhouse;
    $propertym->duplex = $request->duplex;
    $propertym->pool = $request->pool;
    $propertym->tennis = $request->tennis;
    $propertym->grocerystore = $request->grocerystore;
    $propertym->video_url = $request->video_url;
    $propertym->amenities = implode(', ', $request->amenities);
    $propertym->locations = $request->locations;
    $propertym->approval = 1; 
    if(!empty($request->file('proimages'))){
        $propertym->proimages = implode(', ',$uploadedImagePaths);
    }
     if(!empty($request->file('file'))){
    $propertym->file = implode(', ', $uploadedImagePathsPlan);
     }
    if($propertym->save()){
        return response()->json([
            "status"=>1,"message" => "Property Added Successfully!."
    ],201);
    }
    else{
        return response()->json([
            "status"=>0,"message" => "Something Went Wrong!"
        ],201);
    }
            //return response()->json($request);
    }


public function editnewproperty(Request $request){
    
    $propertym = PropertyModel::find($request->id);
         //dd($request->all());
        //$res = array("status"=>0,"message"=>"Admin Not Found!");
        // Define the storage folder path
        $storagePath = public_path('uploads'); // You can change the folder path
        $images = $request->proimages;
        if($request->hasFile('proimages')){
        $uploadedImagePaths = [];
        // Loop through each uploaded file
        foreach ($request->file('proimages') as $image) {
            // Generate a unique file name
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($storagePath, $imageName);
            $uploadedImagePaths[] = 'uploads/' . $imageName;
        }
        $proimages = implode(', ',$uploadedImagePaths);
        $cate_name = PropertyModel::where('id',$request->id)->pluck('proimages')->first();
        $propertym->proimages = $proimages.', '.$cate_name;
        }
     
       
        if($request->hasFile('file')){
        $uploadedImagePathsPlan = [];
        // Loop through each uploaded file
        foreach ($request->file('file') as $image2) {
            // Generate a unique file name
            $imageName2 = time() . '_' . $image2->getClientOriginalName();
            $image2->move($storagePath, $imageName2);
            $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
        }
        $propertymfile = implode(', ', $uploadedImagePathsPlan);
        $cate_namefile = PropertyModel::where('id',$request->id)->pluck('file')->first();
        $propertym->file = $propertymfile.', '.$cate_namefile;
        }
        //$propertym = new PropertyModel;
        
        
        $propertym->propertyname = $request->propertyname;
        $propertym->propertyid = $request->propertyid;
        $propertym->executivename = $request->executivename;
        $propertym->date = $request->date;
        $propertym->ownername = $request->ownername;
        $propertym->ownernumber = $request->ownernumber;
        $propertym->email = $request->email;
        $propertym->supervisorname = $request->supervisorname;
        $propertym->supervisornumber = $request->supervisornumber;
        $propertym->source = $request->source;    
        $propertym->websiteid = $request->websiteid;    
        $propertym->leadtype = $request->leadtype;    
        $propertym->description = $request->description;    
        $propertym->servicecharge = $request->servicecharge;    
        $propertym->hotproperty = $request->hotproperty ?? '';     
        $propertym->smproperty = $request->smproperty;    
        $propertym->location = $request->location;
        $propertym->landmark = $request->landmark;    
        $propertym->totalprice = $request->totalprice;
        $propertym->pricepersft = $request->pricepersft;    
        $propertym->maintenance = $request->maintenance;
        $propertym->building_name = $request->building_name; 
        $propertym->unit = $request->unit;
        $propertym->deposit = $request->deposit;    
        $propertym->lockin = $request->lockin;     
        $propertym->builtuparea = $request->builtuparea;    
        $propertym->availablefrom = $request->availablefrom;    
        $propertym->availabledate = $request->availabledate;    
        $propertym->dgbackup = $request->dgbackup;       
        $propertym->ac = $request->ac;    
        $propertym->floor = $request->floor;    
        $propertym->totalfloors = $request->totalfloors;    
        $propertym->carparking = $request->carparking;    
        $propertym->lift = $request->lift;    
        $propertym->security = $request->security;   
        $propertym->onsitemanager = $request->onsitemanager;    
        $propertym->bathrooms = $request->bathrooms;
        $propertym->age = $request->age;    
        $propertym->plotarea = $request->plotarea;    
        $propertym->carpetarea = $request->carpetarea;
        $propertym->propertyfacing = $request->propertyfacing;    
        $propertym->keyavailable = $request->keyavailable;
        $propertym->suitablefor = implode(',', $request->suitablefor);
        $propertym->landmark_gps  = $request->landmark_gps ;
        $propertym->subcategoryid = $request->residentialsubtype;
        $propertym->residentialfurinished = $request->residentialfurinished;
        $propertym->othercommunity = $request->othercommunity;
        $propertym->communitydetails = $request->communitydetails;
        $propertym->geysers = $request->geysers;
        $propertym->wardrobes = $request->wardrobes;    
        $propertym->bachelors = $request->bachelors;
        $propertym->clinic = $request->clinic; 
        $propertym->servantroom = $request->servantroom;
        $propertym->petsallowed = $request->petsallowed;
        $propertym->clubhouse = $request->clubhouse;
        $propertym->duplex = $request->duplex;
        $propertym->pool = $request->pool;
        $propertym->video_url = $request->video_url;
        $propertym->tennis = $request->tennis;
        $propertym->created_at = date("y-m-d H:i:s");
        $propertym->grocerystore = $request->grocerystore;
        if(!empty($request->amenities)){
        $propertym->amenities = implode(',', $request->amenities);
        }
        $propertym->locations = $request->locations;
        $propertym->approval = $request->approval;
        if($propertym->update()){
            return response()->json([
                "status"=>1,"message" => "Property Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
                //return response()->json($request);
        }


    public function addbasicproperty(Request $request){
        //$res = array("status"=>0,"message"=>"Admin Not Found!");

            // Define the storage folder path
    $storagePath = public_path('uploads'); // You can change the folder path

    $uploadedImagePaths = [];

    // Loop through each uploaded file
    foreach ($request->file('proimages') as $image) {
        // Generate a unique file name
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($storagePath, $imageName);
        $uploadedImagePaths[] = 'uploads/' . $imageName;
    }

    $uploadedImagePathsPlan = [];

    // Loop through each uploaded file
    foreach ($request->file('file') as $image2) {
        // Generate a unique file name
        $imageName2 = time() . '_' . $image2->getClientOriginalName();
        $image2->move($storagePath, $imageName2);
        $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
    }

    $basicm = new BasicModel;

    $basicm->categoryid = $request->category_id;
    $basicm->subcategoryid = $request->subcategory_id;
    $basicm->propertyname = $request->propertyname;
    $basicm->propertyid = $request->propertyid;
    $basicm->executivename = $request->executivename;
    $basicm->date = $request->date;
    $basicm->ownername = $request->ownername;
    $basicm->ownernumber = $request->ownernumber;
    $basicm->email = $request->email;
    $basicm->supervisorname = $request->supervisorname;
    $basicm->supervisornumber = $request->supervisornumber;
    $basicm->source = $request->source;    
    $basicm->websiteid = $request->websiteid;    
    $basicm->leadtype = $request->leadtype;    
    $basicm->description = $request->description;    
    $basicm->servicecharge = $request->servicecharge;    
    $basicm->hotproperty = $request->hotproperty ?? '';     
    $basicm->smproperty = $request->smproperty;    
    $basicm->location = $request->location;
    $basicm->landmark = $request->landmark;    
    $basicm->totalprice = $request->totalprice;
    $basicm->pricepersft = $request->pricepersft;    
    $basicm->maintenance = $request->maintenance;    
    $basicm->deposit = $request->deposit;    
    $basicm->lockin = $request->lockin;     
    $basicm->builtuparea = $request->builtuparea;    
    $basicm->availablefrom = $request->availablefrom;    
    $basicm->availabledate = $request->availabledate;    
    $basicm->dgbackup = $request->dgbackup;       
    $basicm->ac = $request->ac;    
    $basicm->floor = $request->floor;    
    $basicm->totalfloors = $request->totalfloors;    
    $basicm->carparking = $request->carparking;    
    $basicm->lift = $request->lift;    
    $basicm->security = $request->security;   
    $basicm->onsitemanager = $request->onsitemanager;    
    $basicm->bathrooms = $request->bathrooms;
    $basicm->age = $request->age;    
    $basicm->plotarea = $request->plotarea;    
    $basicm->carpetarea = $request->carpetarea;
    $basicm->propertyfacing = $request->propertyfacing;    
    $basicm->keyavailable = $request->keyavailable;
    $basicm->suitablefor = implode(',', $request->suitablefor);
    $basicm->landmark_gps = $request->landmark_gps;
    $basicm->residentialsubtype = $request->residentialsubtype;
    $basicm->residentialfurinished = $request->residentialfurinished;
    $basicm->othercommunity = $request->othercommunity;
    $basicm->communitydetails = $request->communitydetails;
    $basicm->geysers = $request->geysers;
    $basicm->wardrobes = $request->wardrobes;    
    $basicm->bachelors = $request->bachelors;
    $basicm->clinic = $request->clinic; 
    $basicm->servantroom = $request->servantroom;
    $basicm->petsallowed = $request->petsallowed;
    $basicm->clubhouse = $request->clubhouse;
    $basicm->duplex = $request->duplex;
    $basicm->pool = $request->pool;
    $basicm->tennis = $request->tennis;
    $basicm->grocerystore = $request->grocerystore;
    $basicm->amenities = implode(',', $request->amenities);
    $basicm->locations = $request->locations;
    $basicm->proimages = implode(', ',$uploadedImagePaths);
    $basicm->file = implode(', ', $uploadedImagePathsPlan);
    
    if($basicm->save()){
        return response()->json([
            "status"=>1,"message" => "Property Added Successfully!."
    ],201);
    }
    else{
        return response()->json([
            "status"=>0,"message" => "Something Went Wrong!"
        ],201);
    }
            //return response()->json($request);
    }


public function editbasicproperty(Request $request){
    $basicm = BasicModel::find($request->id);
    $storagePath = public_path('uploads'); // You can change the folder path
    if(!empty($request->file('proimages'))){
    $uploadedImagePaths = [];
    // Loop through each uploaded file
    foreach ($request->file('proimages') as $image) {
        // Generate a unique file name
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($storagePath, $imageName);
        $uploadedImagePaths[] = 'uploads/' . $imageName;
    }
    // $basicm->proimages = implode(', ',$uploadedImagePaths);
        $proimages = implode(', ',$uploadedImagePaths);
        $cate_name = BasicModel::where('id',$request->id)->pluck('proimages')->first();
        $basicm->proimages = $proimages.', '.$cate_name ?? '';
    }
    if(!empty($request->file('file'))){
    $uploadedImagePathsPlan = [];
    // Loop through each uploaded file
    foreach ($request->file('file') as $image2) {
        // Generate a unique file name
        $imageName2 = time() . '_' . $image2->getClientOriginalName();
        $image2->move($storagePath, $imageName2);
        $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
    }
    //$basicm->file = implode(', ', $uploadedImagePathsPlan);
        $propertymfile = implode(', ', $uploadedImagePathsPlan);
        $cate_name = BasicModel::where('id',$request->id)->pluck('file')->first();
        $basicm->file = $propertymfile.', '.$cate_name;
    }
    //$basicm = new BasicModel;
    
    
    $basicm->propertyname = $request->propertyname;
    $basicm->propertyid = $request->propertyid;
    $basicm->executivename = $request->executivename;
    $basicm->date = $request->date;
    $basicm->ownername = $request->ownername;
    $basicm->ownernumber = $request->ownernumber;
    $basicm->email = $request->email;
    $basicm->supervisorname = $request->supervisorname;
    $basicm->supervisornumber = $request->supervisornumber;
    $basicm->source = $request->source;    
    $basicm->websiteid = $request->websiteid;    
    $basicm->leadtype = $request->leadtype;    
    $basicm->description = $request->description;    
    $basicm->servicecharge = $request->servicecharge;    
    $propertym->video_url = $request->video_url;
    $basicm->hotproperty = $request->hotproperty ?? '';     
    $basicm->smproperty = $request->smproperty;    
    $basicm->location = $request->location;
    $basicm->landmark = $request->landmark;    
    $basicm->totalprice = $request->totalprice;
    $basicm->pricepersft = $request->pricepersft;    
    $basicm->maintenance = $request->maintenance;    
    $basicm->deposit = $request->deposit;    
    $basicm->lockin = $request->lockin;     
    $basicm->builtuparea = $request->builtuparea;    
    $basicm->availablefrom = $request->availablefrom;    
    $basicm->availabledate = $request->availabledate;    
    $basicm->dgbackup = $request->dgbackup;       
    $basicm->ac = $request->ac;    
    $basicm->floor = $request->floor;    
    $basicm->totalfloors = $request->totalfloors;    
    $basicm->carparking = $request->carparking;    
    $basicm->lift = $request->lift;    
    $basicm->security = $request->security;   
    $basicm->onsitemanager = $request->onsitemanager;    
    $basicm->bathrooms = $request->bathrooms;
    $basicm->age = $request->age;    
    $basicm->plotarea = $request->plotarea;    
    $basicm->carpetarea = $request->carpetarea;
    $basicm->propertyfacing = $request->propertyfacing;    
    $basicm->keyavailable = $request->keyavailable;
    $basicm->suitablefor = implode(',', $request->suitablefor);
    $basicm->landmark_gps = $request->landmark_gps;
    $basicm->residentialsubtype = $request->residentialsubtype;
    $basicm->residentialfurinished = $request->residentialfurinished;
    $basicm->othercommunity = $request->othercommunity;
    $basicm->communitydetails = $request->communitydetails;
    $basicm->geysers = $request->geysers;
    $basicm->wardrobes = $request->wardrobes;    
    $basicm->bachelors = $request->bachelors;
    $basicm->clinic = $request->clinic; 
    $basicm->servantroom = $request->servantroom;
    $basicm->petsallowed = $request->petsallowed;
    $basicm->clubhouse = $request->clubhouse;
    $basicm->duplex = $request->duplex;
    $basicm->pool = $request->pool;
    $basicm->tennis = $request->tennis;
    $basicm->grocerystore = $request->grocerystore;
    $basicm->amenities = implode(',', $request->amenities);
    $basicm->locations = $request->locations;
    $basicm->created_at = date("y-m-d H:i:s");
    $basicm->approval = $request->approval;
    if($basicm->update()){
        return response()->json([
            "status"=>1,"message" => "Property Added Successfully!."
    ],201);
    }
    else{
        return response()->json([
            "status"=>0,"message" => "Something Went Wrong!"
        ],201);
    }
            //return response()->json($request);
    }






    public function logout(){
        session()->flush();
        session()->save();
        return redirect()->to('/admin');
    }
    
    public function listing(Request $request){
      $categorydata = CategoryModel::getAllNow();
      return view('admin/listingnew',compact('categorydata'));
    }

    // public function viewproperty(Request $request,$id){
    //             $user_id = \Session::get('id');
    //             // $categorydata = CategoryModel::getAllNow();
    //             $categorydata = CategoryModel::where('id', $id)->first();
    //             $subcategorydata = SubCategoryModel::where('categoryid', $id)->get();
    //             if(auth()->user()->type == 'super_admin'){
    //                 if($id == 1){
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }elseif($id == 2){
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = CommercialModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }else{
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = BasicModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = BasicModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }
    //             }else{
    //                 if($id == 1){
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }elseif($id == 2){
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = CommercialModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = CommercialModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }else{
    //                     if(!empty($_GET['zone'])){
    //                         $prodata = BasicModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = BasicModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }else{
    //                         $prodata = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->simplePaginate(10);
    //                         $total_page = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->paginate(10)->lastPage();
    //                     }
    //                 }
    //             }
    //             return view('admin/listing',compact('categorydata','prodata','id','subcategorydata','total_page'));
    // }

 public function viewproperty(Request $request,$id){
                $user_id = \Session::get('id');
                // $categorydata = CategoryModel::getAllNow();
                $categorydata = CategoryModel::where('id', $id)->first();
                $subcategorydata = SubCategoryModel::where('categoryid', $id)->get();
                if(auth()->user()->type == 'super_admin'){
                    if($id == 1){
                        if(!empty($_GET['zone'])){
                            $prodata = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }elseif($id == 2){
                        if(!empty($_GET['zone'])){
                            $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }else{
                        if(!empty($_GET['zone'])){
                            $prodata = BasicModel::where('categoryid', $id)->where('status',1)->where('subcategoryid',$_GET['zone'])->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }
                }else{
                    if($id == 1){
                        if(!empty($_GET['zone'])){
                            $prodata = PropertyModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }elseif($id == 2){
                        if(!empty($_GET['zone'])){
                            $prodata = CommercialModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }else{
                        if(!empty($_GET['zone'])){
                            $prodata = BasicModel::where('categoryid', $id)->where('subcategoryid',$_GET['zone'])->where('status',1)->orderBy('created_at', 'desc')->get();
                        }else{
                            $prodata = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('created_at', 'desc')->get();
                        }
                    }
                }
                return view('admin/listing',compact('categorydata','prodata','id','subcategorydata'));
    }
    public function  favouritesproperty(Request $request){
    $user_id = \Session::get('id');
    if(auth()->user()->type == 'super_admin'){
        $prodata1 = PropertyModel::where('favourites', 1)->orderBy('created_at', 'desc')->get()->toArray();
    $prodata2 = CommercialModel::where('favourites', 1)->orderBy('created_at', 'desc')->get()->toArray();
    }else{
    $prodata1 = PropertyModel::where('favourites', 1)->orderBy('created_at', 'desc')->get()->toArray();
    $prodata2 = CommercialModel::where('favourites', 1)->orderBy('created_at', 'desc')->get()->toArray();
    }
    $prodata = array_merge($prodata1,$prodata2);
    return view('admin/favourites',compact('prodata'));
    }
    
    
    // public function  disableproperty(Request $request){
    // $user_id = \Session::get('id');
    // if(auth()->user()->type == 'super_admin'){
    // $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get();
    // $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get();
    // }else{
    // $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get();
    // $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get();   
    // }
    // return view('admin/disableproperty',compact('prodata1','prodata2'));
    // }
    
    public function  disableproperty(Request $request){
    $user_id = \Session::get('id');
    if(auth()->user()->type == 'super_admin'){
    $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
    $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
    }else{
    $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
    $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
    }
    $prodata = array_merge($prodata1,$prodata2);
    return view('admin/disableproperty',compact('prodata'));
    }

    // public function  edit_property(Request $request){
    //     $pro_data = PropertyModel::where('approval',0)->get();
    //     $pro_comm_data = CommercialModel::where('approval',0)->get();
    //     $pro_basic_data = BasicModel::where('approval',0)->get(); 
    //     $fav_count = count($pro_data) + count($pro_comm_data) + count($pro_basic_data);
    //     return view('admin/approve',compact('pro_data','pro_comm_data','pro_basic_data','fav_count'));
    // }

    public function  edit_property(Request $request){
        $pro_data = PropertyModel::where('approval',0)->get()->toArray();
        $pro_comm_data = CommercialModel::where('approval',0)->get()->toArray();
        $pro_basic_data = BasicModel::where('approval',0)->get()->toArray();
        $prodata = array_merge($pro_data,$pro_comm_data,$pro_basic_data);
        return view('admin/approve',compact('prodata'));
    }
    

     public function update_property(Request $request,$id, $cat){
        if($cat == 1){
            $prodata = PropertyModel::where('id', $id)->first();
            $amenities_1 = PropertyModel::where('id', $id)->pluck('amenities')->first();
            $amenities = explode(',', $amenities_1);
            $suitable_for_1 = PropertyModel::where('id', $id)->pluck('suitablefor')->first();
            $suitable_for = explode(',', $suitable_for_1);
            $view = 'residential_edit_form';

        }elseif($cat == 2){
            $prodata = CommercialModel::where('id', $id)->first();
            $amenities_2 = CommercialModel::where('id', $id)->pluck('amenities')->first();
            $amenities = explode(',', $amenities_2);
            $suitable_for_2 = CommercialModel::where('id', $id)->pluck('suitablefor')->first();
            $suitable_for = explode(',', $suitable_for_2);
            $view = 'commrecial_edit_form';

        }else{
            $prodata = BasicModel::where('id', $id)->first();
            $amenities_3 = BasicModel::where('id', $id)->pluck('amenities')->first();
            $amenities = explode(',', $amenities_3);
            $suitable_for_3 = BasicModel::where('id', $id)->pluck('suitablefor')->first();
            $suitable_for = explode(',', $suitable_for_3);
            $view = 'basic_edit_form';

        }
        $categorydata = CategoryModel::getAllNow();
        //dd($amenities);
        
        $location = DB::table('location')->get();
        $executive_name = DB::table('executive_name')->get();
        $floor = DB::table('floor')->get();
        $bhk = DB::table('bhk')->get();
        $facing = DB::table('facing')->get();
        return view('admin/'.$view,compact('prodata','categorydata', 'executive_name','amenities','suitable_for','location','floor','bhk','facing'));
    }

    public function viewpropertydetails($pid,$cid){
            $categorydata = CategoryModel::getAllNow();
            if($cid == 1){
                $prodata = PropertyModel::where('id', $pid)->where('categoryid', $cid)->first();
            }elseif($cid == 2){
                $prodata = CommercialModel::where('id', $pid)->where('categoryid', $cid)->first();  
            }else{
                $prodata = BasicModel::where('id', $pid)->where('categoryid', $cid)->first();  
            }
            return view('admin/propertydetails',compact('categorydata','prodata','cid'));
    }
    


    public function getproperty(Request $request){
        if($request->category_id == 1){
            $prodata = PropertyModel::where('categoryid', $request->category_id)->get();
        }
        if($request->category_id == 2){
            $prodata = CommercialModel::where('categoryid', $request->category_id)->get();  
        }
        return response()->json($prodata);
    }
    
    
    public function enquiryform(Request $request){
        $contactm = new ContactModel;
        $contactm->name = $request->name;
        $contactm->number = $request->number;
        $contactm->email = $request->email;
        $contactm->purpose = $request->purpose;
        $contactm->message = $request->message; 

        if($contactm->save()){
        return response()->json([
            "status"=>1,"message" => "Property Added Successfully!."
        ],201);
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!"
            ],201);
        }
        
    }
    
    public function contacts(Request $request){
                $contactsdata = ContactModel::latest('createdate')->get();
                return view('admin/contacts',compact('contactsdata'));
    }


   
      
    public function delete_contacts(Request $request,$id){
        if(ContactModel::where('id',$id)->exists()){
            $cm = ContactModel::find($id);
            $cm->delete();
            return redirect()->back()->with('success','Record Delete Successfully');
        }
        else{
            return redirect()->route('admin.contacts');
        }
    }


function getNextPropertyNumber($length = 3)
{
    $number = '';
    do {
        for ($i=$length; $i--; $i>0) {
            $number .= mt_rand(0,9);
        }
    } while ( !empty(DB::table('tblproperty')->where('id', $number)->first(['id'])) );
    $main = 'R-'.''.$number;
    return $main;
}


function getNextCommercialNumber($length = 3)
{
    $number = '';
    do {
        for ($i=$length; $i--; $i>0) {
            $number .= mt_rand(0,9);
        }
    } while ( !empty(DB::table('tblcommercial')->where('id', $number)->first(['id'])) );
    $main = 'C-'.''.$number;
    return $main;
}

function getNextbasicNumber($length = 3)
{
    $number = '';
    do {
        for ($i=$length; $i--; $i>0) {
            $number .= mt_rand(0,9);
        }
    } while ( !empty(DB::table('tblbasic')->where('id', $number)->first(['id'])) );
    $main = 'B-'.''.$number;
    return $main;
}


    function delete_image(Request $request,$cat_id,$pro_id,$id){
        if($cat_id == 1){
            $property = PropertyModel::where("id",$pro_id)->pluck('proimages')->first();
               $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                print_r($new_array); 
                $array_vew = implode(", ",$new_array);
                PropertyModel::where('id', $pro_id)->update(['proimages' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');    
        }elseif($cat_id == 2){
             $property = CommercialModel::where("id",$pro_id)->pluck('proimages')->first(); 
                $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                $array_vew = implode(", ",$new_array);
                CommercialModel::where('id', $pro_id)->update(['proimages' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');  
        }else{
            $property = BasicModel::where("id",$pro_id)->pluck('proimages')->first();
                $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                print_r($new_array);
                $array_vew = implode(", ",$new_array);
                BasicModel::where('id', $pro_id)->update(['proimages' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');  
        }
        //print_r($property);
       
    }
    
    
    
    function delete_file(Request $request,$cat_id,$pro_id,$id){
        if($cat_id == 1){
            $property = PropertyModel::where("id",$pro_id)->pluck('file')->first();
               $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                print_r($new_array);
                $array_vew = implode(", ",$new_array);
                PropertyModel::where('id', $pro_id)->update(['file' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');    
        }elseif($cat_id == 2){
             $property = CommercialModel::where("id",$pro_id)->pluck('file')->first();
                $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                print_r($new_array);
                $array_vew = implode(", ",$new_array);
                CommercialModel::where('id', $pro_id)->update(['file' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');  
        }else{
            $property = BasicModel::where("id",$pro_id)->pluck('file')->first();
                $pic = explode(", ",$property);
                $new_array = (array) $pic;
                 unset($new_array[$id]);
                print_r($new_array);
                $array_vew = implode(", ",$new_array);
                BasicModel::where('id', $pro_id)->update(['file' => $array_vew]);
                return redirect()->back()->with('success','Record Delete Successfully');  
        }
        //print_r($property);
       
    }
    
    function restorelist(Request $request){
        $categorydata = CategoryModel::onlyTrashed()->get();
        $subcategorydata = SubCategoryModel::onlyTrashed()->get();
        return view('admin/restorelist',compact('categorydata','subcategorydata'));
    }
    
    
    
    function SubmitResidential(Request $request){
        //dd($request->all());
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            
            if($request->availablefrom == 'Later'){
               $messages = [
                'availabledate.required'    => 'Please Enter Available Date.',
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
               
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
                // 'residentialsubtype.required'    => 'Please Enter Residential Subtype.',
                'residentialfurinished.required'    => 'Please Enter Residential Furinished.',
                'othercommunity.required'    => 'Please Enter Other Community.',
                'bachelors.required'    => 'Please Enter Bachelors Allowed.',
                'ownername.required'    => 'Please Enter Owenr Name.',
                'ownernumber.required'    => 'Please Enter Contact Number.',
                'description.required'    => 'Please Enter Details.',
                'communitydetails.required'    => 'Please Enter No.of BHK.',
                 'locations.required'    => 'Please Enter Property GPS Location.',
                 'dgbackup.required'    => 'Please Enter DG Back up.',
                 'ac.required'    => 'Please Enter AC.',
                 'proimages.*' => 'Please Enter Image.',
                'suitablefor.*' => 'Please Enter Suitablefor.',
                'landmark_gps.required'    => 'Please Enter Landmark GPS Location.',
            ];  
                
            }else{
                  $messages = [
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
               
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
                // 'residentialsubtype.required'    => 'Please Enter Residential Subtype.',
                'residentialfurinished.required'    => 'Please Enter Residential Furinished.',
                'othercommunity.required'    => 'Please Enter Other Community.',
                'bachelors.required'    => 'Please Enter Bachelors Allowed.',
                'ownername.required'    => 'Please Enter Owenr Name.',
                'ownernumber.required'    => 'Please Enter Contact Number.',
                'description.required'    => 'Please Enter Details.',
                'communitydetails.required'    => 'Please Enter No.of BHK.',
                 'locations.required'    => 'Please Enter Property GPS Location.',
                 'dgbackup.required'    => 'Please Enter DG Back up.',
                 'ac.required'    => 'Please Enter AC.',
                 'proimages.*' => 'Please Enter Image.',
                'suitablefor.*' => 'Please Enter Suitablefor.',
                'landmark_gps.required'    => 'Please Enter Landmark GPS Location.',
            ];  
            }
             
            if($request->availablefrom == 'Later'){
            $rules=[
                'availabledate'=>'required',
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'dgbackup'=>'required',
                'deposit'=>'required',
                'builtuparea'=>'required',
                // 'residentialsubtype'=>'required',
                'residentialfurinished'=>'required',
                'othercommunity'=>'required',
                'bachelors'=>'required',
                'ownername'=>'required',
                'ownernumber'=>'required|digits:10',
                'description'=>'required',
                 'communitydetails'=>'required',
                 'locations'=>'required',
                 'availablefrom'=>'required',
                 'ac'=>'required',
                 'proimages' => 'required',
                 'suitablefor' =>'required',
                 'landmark_gps' =>'required',
            ];
            }else{
                $rules=[
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'dgbackup'=>'required',
                'deposit'=>'required',
                'builtuparea'=>'required',
                // 'residentialsubtype'=>'required',
                'residentialfurinished'=>'required',
                'othercommunity'=>'required',
                'bachelors'=>'required',
                'ownername'=>'required',
                'ownernumber'=>'required|digits:10',
                'description'=>'required',
                 'communitydetails'=>'required',
                 'locations'=>'required',
                 'availablefrom'=>'required',
                 'ac'=>'required',
                 'proimages' => 'required',
                 'suitablefor' =>'required',
                 'landmark_gps' =>'required',
            ];
            }
            
            
            $validator = Validator::make($data,$rules,$messages);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
            $storagePath = public_path('uploads'); // You can change the folder path
            if(!empty($request->file('proimages'))){
                $uploadedImagePaths = [];
            // Loop through each uploaded file
            foreach ($request->file('proimages') as $image) {
                // Generate a unique file name
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($storagePath, $imageName);
                $uploadedImagePaths[] = 'uploads/' . $imageName;
            }}
        if(!empty($request->file('file'))){
            $uploadedImagePathsPlan = [];

            // Loop through each uploaded file
            foreach ($request->file('file') as $image2) {
                // Generate a unique file name
                $imageName2 = time() . '_' . $image2->getClientOriginalName();
                $image2->move($storagePath, $imageName2);
                $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
            }}

                $propertym = new PropertyModel;
                $propertym->created_by = $request->id;
                $propertym->categoryid = $request->category_id;
                $propertym->subcategoryid = $request->subcategory_id;
                $propertym->propertyname = $request->propertyname;
                $propertym->propertyid = $request->propertyid;
                $propertym->executivename = $request->executivename;
                $propertym->date = $request->date;
                $propertym->ownername = $request->ownername;
                $propertym->ownernumber = $request->ownernumber;
                $propertym->contact_two = $request->contact_two;
                $propertym->email = $request->email;
                $propertym->supervisorname = $request->supervisorname;
                $propertym->supervisornumber = $request->supervisornumber;
                $propertym->source = $request->source;
                // $propertym->websiteid = $request->websiteid;
                $propertym->leadtype = $request->leadtype;
                $propertym->description = $request->description;
                $propertym->servicecharge = $request->servicecharge;
                $propertym->hotproperty = $request->hotproperty ?? '';
                $propertym->smproperty = $request->smproperty;
                $propertym->building_name = $request->building_name;
                $propertym->unit = $request->unit;
                $propertym->location = $request->location;
                $propertym->landmark = $request->landmark;
                $propertym->totalprice = $request->totalprice;
                $propertym->pricepersft = $request->pricepersft;
                $propertym->maintenance = $request->maintenance;
                $propertym->deposit = $request->deposit;
                $propertym->lockin = $request->lockin;
                $propertym->builtuparea = $request->builtuparea;
                $propertym->availablefrom = $request->availablefrom;
                $propertym->availabledate = $request->availabledate ?? date('Y-m-d');
                $propertym->dgbackup = $request->dgbackup;
                $propertym->ac = $request->ac;
                $propertym->floor = $request->floor;
                $propertym->totalfloors = $request->totalfloors;
                $propertym->carparking = $request->carparking;
                $propertym->lift = $request->lift;
                $propertym->security = $request->security;
                $propertym->onsitemanager = $request->onsitemanager;
                $propertym->bathrooms = $request->bathrooms;
                $propertym->age = $request->age;
                $propertym->landmark_gps = $request->landmark_gps;
                $propertym->plotarea = $request->plotarea;
                $propertym->carpetarea = $request->carpetarea;
                $propertym->propertyfacing = $request->propertyfacing;
                $propertym->keyavailable = $request->keyavailable;
                $propertym->suitablefor = implode(', ', $request->suitablefor);
                $propertym->residentialsubtype = $request->residentialsubtype;
                $propertym->residentialfurinished = $request->residentialfurinished;
                $propertym->othercommunity = $request->othercommunity;
                $propertym->communitydetails = $request->communitydetails;
                $propertym->geysers = $request->geysers;
                $propertym->wardrobes = $request->wardrobes;
                $propertym->bachelors = $request->bachelors;
                $propertym->clinic = $request->clinic;
                $propertym->servantroom = $request->servantroom;
                $propertym->petsallowed = $request->petsallowed;
                $propertym->clubhouse = $request->clubhouse;
                $propertym->duplex = $request->duplex;
                $propertym->pool = $request->pool;
                $propertym->tennis = $request->tennis;
                 $propertym->video_url = $request->video_url;
                $propertym->grocerystore = $request->grocerystore;
                //$propertym->amenities = implode(', ', $request->amenities);
                if(!empty($request->amenities)){
                    $propertym->amenities = implode(',', $request->amenities);
                }
                $propertym->locations = $request->locations;
                $propertym->approval = $request->approval;
                $propertym->created_at = date("y-m-d H:i:s");
              
                if(!empty($request->file('proimages'))){
                    $propertym->proimages = implode(', ',$uploadedImagePaths);
                }
                if(!empty($request->file('file'))){
                $propertym->file = implode(', ', $uploadedImagePathsPlan);
                }
                $propertym->save();
                $success = true;
                $message = array('success'=>array('Proerty Management Service added successfully'));
            }
         return ResponseHelper::returnResponse(200,$success,$message);
        }
     }


     function SubmitCommercial(Request $request){
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            
            if($request->availablefrom == 'Later'){
            $messages = [
                'availabledate.required'    => 'Please Enter Available Date.',
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'ownernumber.required' =>      'Please Enter Owner Number.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
               'locations.required'    => 'Please Enter Property GPS Location.',
               'ac.required'    => 'Please Enter AC.',
               'description.required'    => 'Please Enter Description.',
               'ownername.required'    => 'Please Enter Owner Name.',
               'availablefrom.required' => 'Please Enter Available From.',
               'landmark_gps.required' => 'Please Enter Landmark Gps Location.',
               'commercialfurinished.required' => 'Please Enter Commercial Furinished.',
               'dgbackup.required' => 'Please Select DG Backup.',
               'proimages.*' => 'Please Enter Image.',
               'suitablefor.*' => 'Please Select Suitablefor.',
               
            ];
            }else{
            $messages = [
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'ownernumber.required' =>      'Please Enter Owner Number.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
               'locations.required'    => 'Please Enter Property GPS Location.',
               'ac.required'    => 'Please Enter AC.',
               'description.required'    => 'Please Enter Description.',
               'ownername.required'    => 'Please Enter Owner Name.',
               'availablefrom.required' => 'Please Enter Available From.',
               'landmark_gps.required' => 'Please Enter Landmark Gps Location.',
               'commercialfurinished.required' => 'Please Enter Commercial Furinished.',
               'dgbackup.required' => 'Please Select DG Backup.',
               'proimages.*' => 'Please Enter Image.',
               'suitablefor.*' => 'Please Select Suitablefor.',
               
            ];    
            }
           if($request->availablefrom == 'Later'){
            $rules=[
                'availabledate'=>'required',
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'ownernumber'=>'required|digits:10',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'email'=>'nullable',
                'deposit'=>'required',
                'builtuparea'=>'required',
                'locations'=>'required',
                'ac'=>'required',
                'description' => 'required',
                'ownername'=> 'required',
                'availablefrom'=> 'required',
                'commercialfurinished'=> 'required',
                'landmark_gps'=> 'required',
                'dgbackup'=> 'required',
                'proimages' => 'required',
                'suitablefor' => 'required',
                
            ];
           }else{
             $rules=[
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'dgbackup'=>'required',
                'deposit'=>'required',
                'builtuparea'=>'required',
                // 'residentialsubtype'=>'required',
                // 'residentialfurinished'=>'required',
                // 'othercommunity'=>'required',
                // 'bachelors'=>'required',
                'ownername'=>'required',
                'ownernumber'=>'required|digits:10',
                'description'=>'required',
                //  'communitydetails'=>'required',
                 'locations'=>'required',
                 'availablefrom'=>'required',
                 'ac'=>'required',
                 'proimages' => 'required',
                 'suitablefor' =>'required',
                 'landmark_gps' =>'required',
            ];
           }
            
                 
            $validator = Validator::make($data,$rules,$messages);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                $storagePath = public_path('uploads'); // You can change the folder path
                if(!empty($request->file('proimages'))){
                    $uploadedImagePaths = [];
                // Loop through each uploaded file
                foreach ($request->file('proimages') as $image) {
                    // Generate a unique file name
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move($storagePath, $imageName);
                    $uploadedImagePaths[] = 'uploads/' . $imageName;
                }
                }else{
                    $uploadedImagePaths[] = '';
                }
                if(!empty($request->file('file'))){
                $uploadedImagePathsPlan = [];
                // Loop through each uploaded file
                foreach ($request->file('file') as $image2) {
                    // Generate a unique file name
                    $imageName2 = time() . '_' . $image2->getClientOriginalName();
                    $image2->move($storagePath, $imageName2);
                    $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
                }}else{
                    $uploadedImagePathsPlan[] = '';
                }
                $propertym = new CommercialModel;
                $propertym->categoryid = $request->category_id;
                $propertym->subcategoryid = $request->subcategory_id;
                $propertym->created_by = $request->id;
                $propertym->propertyname = $request->propertyname;
                $propertym->propertyid = $request->propertyid;
                $propertym->executivename = $request->executivename;
                $propertym->date = $request->date;
                $propertym->ownername = $request->ownername;
                $propertym->ownernumber = $request->ownernumber;
                $propertym->contact_two = $request->contact_two;
                $propertym->email = $request->email;
                $propertym->landmark_gps = $request->landmark_gps;
                $propertym->supervisorname = $request->supervisorname;
                $propertym->supervisornumber = $request->supervisornumber;
                $propertym->source = $request->source;
                // $propertym->websiteid = $request->websiteid;
                $propertym->leadtype = $request->leadtype;
                $propertym->description = $request->description;
                $propertym->servicecharge = $request->servicecharge;
                $propertym->hotproperty = $request->hotproperty ?? '';
                $propertym->smproperty = $request->smproperty;
                $propertym->location = $request->location;
                $propertym->landmark = $request->landmark;
                $propertym->totalprice = $request->totalprice;
                $propertym->pricepersft = $request->pricepersft;
                $propertym->maintenance = $request->maintenance;
                $propertym->deposit = $request->deposit;
                $propertym->lockin = $request->lockin;
                $propertym->builtuparea = $request->builtuparea;
                $propertym->availablefrom = $request->availablefrom;
                $propertym->availabledate = $request->availabledate ?? date('Y-m-d');
                $propertym->dgbackup = $request->dgbackup;
                $propertym->ac = $request->ac;
                $propertym->floor = $request->floor;
                $propertym->totalfloors = $request->totalfloors;
                $propertym->carparking = $request->carparking;
                $propertym->lift = $request->lift;
                $propertym->security = $request->security;
                $propertym->onsitemanager = $request->onsitemanager;
                $propertym->bathrooms = $request->bathrooms;
                $propertym->age = $request->age;
                $propertym->plotarea = $request->plotarea;
                $propertym->carpetarea = $request->carpetarea;
                $propertym->propertyfacing = $request->propertyfacing;
                $propertym->keyavailable = $request->keyavailable;
                $propertym->suitablefor = implode(',', $request->suitablefor);
                $propertym->commercialsubtype = $request->commrecialsubtype ?? '';
                $propertym->commercialfurinished = $request->commercialfurinished;
                $propertym->othercommunity = $request->othercommunity;
                $propertym->workstations = $request->workstations;
                $propertym->managercabins = $request->managercabins;
                $propertym->discussionrooms = $request->discussionrooms;
                $propertym->conferencerooms = $request->conferencerooms;
                $propertym->boardrooms = $request->boardrooms;
                $propertym->reception  = $request->reception;
                $propertym->pantry = $request->pantry;
                $propertym->lunchroom = $request->lunchroom;
                $propertym->serverroom = $request->serverroom;
                $propertym->leadtime = $request->leadtime;
                $propertym->liableupto = $request->liableupto;
                $propertym->building_name = $request->building_name;
                $propertym->unit = $request->unit;
                $propertym->video_url = $request->video_url;
                $propertym->dateinend = $request->dateinend;
                if(!empty($request->amenities)){
                    $propertym->amenities = implode(',', $request->amenities);
                }
                $propertym->approval = $request->approval;
                $propertym->locations = $request->locations;
                $propertym->created_at = date("y-m-d H:i:s");
                $propertym->proimages = implode(', ',$uploadedImagePaths);
                $propertym->file = implode(', ', $uploadedImagePathsPlan);
                $propertym->save();
                $success = true;
                $message = array('success'=>array('Proerty Management Service added successfully'));
            }
         return ResponseHelper::returnResponse(200,$success,$message);
        }
     }

     function SubmitBasic(Request $request){
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            if($request->availablefrom == 'Later'){
            $messages = [
                'availabledate.required'    => 'Please Enter Available Date.',
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'pricepersft.required'    => 'Please Enter Price Per Sft.',
                'maintenance.required'    => 'Please Enter Maintenance (Per Sft/Tot).',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'lockin.required'    => 'Please Enter Lock In-(Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
                'residentialsubtype.required'    => 'Please Enter Residential Subtype.',
                'residentialfurinished.required'    => 'Please Enter Residential Furinished.',
                'othercommunity.required'    => 'Please Enter Other Community.',
                'bachelors.required'    => 'Please Enter Bachelors Allowed.',
                'locations.required'    => 'Please Enter Property GPS Location.',
                'landmark_gps.required' => 'Please Enter Landmark Gps Location.',
                
            ];
            }else{
                 $messages = [
                'propertyname.required'    =>    'Please Enter Your Property Name',
                'propertyid.required'      => 'Please Enter Your Property Id.',
                'executivename.required' =>      'Please Enter Executive Name.',
                'source.required'  => 'Please Enter Source.',
                // 'websiteid.required'    => 'Please Enter Website Id.',
                'leadtype.required'    => 'Please Enter Lead Type.',
                'servicecharge.required'    => 'Please Enter Service Charge (Days/Amount).',
                'smproperty.required'    => 'Please Enter S&M Property.',
                'location.required'    => 'Please Enter Location in City.',
                'building_name.required'    => 'Please Enter Building Name.',
                'unit.required'    => 'Please Enter Unit.',
                'landmark.required'    => 'Please Enter LandMark.',
                'totalprice.required'    => 'Please Enter Total Price.',
                'pricepersft.required'    => 'Please Enter Price Per Sft.',
                'maintenance.required'    => 'Please Enter Maintenance (Per Sft/Tot).',
                'deposit.required'    => 'Please Enter Deposit (Months).',
                'lockin.required'    => 'Please Enter Lock In-(Months).',
                'builtuparea.required'    => 'Please Enter Builtup Area.',
                'residentialsubtype.required'    => 'Please Enter Residential Subtype.',
                'residentialfurinished.required'    => 'Please Enter Residential Furinished.',
                'othercommunity.required'    => 'Please Enter Other Community.',
                'bachelors.required'    => 'Please Enter Bachelors Allowed.',
                'locations.required'    => 'Please Enter Property GPS Location.',
                'landmark_gps.required' => 'Please Enter Landmark Gps Location.',
                
            ];
            }
            if($request->availablefrom == 'Later'){
            $rules=[
                'availabledate'=>'required',
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'pricepersft'=>'required',
                'maintenance'=>'required',
                'deposit'=>'required',
                'lockin'=>'required',
                'builtuparea'=>'required',
                'residentialsubtype'=>'required',
                'residentialfurinished'=>'required',
                'othercommunity'=>'required',
                'bachelors'=>'required',
                'locations'=>'required',
                'landmark_gps'=>'required',
                
            ];
            }else{
               $rules=[
                'propertyname'=>'required',
                'propertyid'=>'required',
                'executivename'=>'required',
                'source'=>'required',
                // 'websiteid'=>'required',
                'leadtype'=>'required',
                'servicecharge'=>'required',
                'smproperty'=>'required',
                'location'=>'required',
                'building_name'=>'required',
                'unit'=>'required',
                'landmark'=>'required',
                'totalprice'=>'required',
                'pricepersft'=>'required',
                'maintenance'=>'required',
                'deposit'=>'required',
                'lockin'=>'required',
                'builtuparea'=>'required',
                'residentialsubtype'=>'required',
                'residentialfurinished'=>'required',
                'othercommunity'=>'required',
                'bachelors'=>'required',
                'locations'=>'required',
                'landmark_gps'=>'required',
                
            ]; 
            }
           if($request->availablefrom == 'Later'){
                 $messages = ['availabledate.required'    => 'Please Enter Available Date.'];
                
            }
             if($request->availablefrom == 'Later'){
                 $rules = ['availabledate'=>'required'];
             }
            $validator = Validator::make($data,$rules,$messages);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
            $storagePath = public_path('uploads'); // You can change the folder path
            if(!empty($request->file('proimages'))){
                $uploadedImagePaths = [];
            // Loop through each uploaded file
            foreach ($request->file('proimages') as $image) {
                // Generate a unique file name
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($storagePath, $imageName);
                $uploadedImagePaths[] = 'uploads/' . $imageName;
            }}
        if(!empty($request->file('file'))){
            $uploadedImagePathsPlan = [];

            // Loop through each uploaded file
            foreach ($request->file('file') as $image2) {
                // Generate a unique file name
                $imageName2 = time() . '_' . $image2->getClientOriginalName();
                $image2->move($storagePath, $imageName2);
                $uploadedImagePathsPlan[] = 'uploads/' . $imageName2;
            }}

                $propertym = new BasicModel;
                $propertym->categoryid = $request->category_id;
                $propertym->subcategoryid = $request->subcategory_id;
                $propertym->created_by = $request->id;
                $propertym->propertyname = $request->propertyname;
                $propertym->propertyid = $request->propertyid;
                $propertym->executivename = $request->executivename;
                $propertym->date = $request->date;
                $propertym->ownername = $request->ownername;
                $propertym->ownernumber = $request->ownernumber;
                $propertym->contact_two = $request->contact_two;
                $propertym->email = $request->email;
                $propertym->supervisorname = $request->supervisorname;
                $propertym->supervisornumber = $request->supervisornumber;
                $propertym->source = $request->source;
                // $propertym->websiteid = $request->websiteid;
                $propertym->landmark_gps = $request->landmark_gps;
                $propertym->leadtype = $request->leadtype;
                $propertym->description = $request->description;
                $propertym->servicecharge = $request->servicecharge;
                $propertym->hotproperty = $request->hotproperty ?? '';
                $propertym->smproperty = $request->smproperty;
                $propertym->building_name = $request->building_name;
                $propertym->unit = $request->unit;
                $propertym->location = $request->location;
                $propertym->landmark = $request->landmark;
                $propertym->totalprice = $request->totalprice;
                $propertym->pricepersft = $request->pricepersft;
                $propertym->maintenance = $request->maintenance;
                $propertym->deposit = $request->deposit;
                $propertym->lockin = $request->lockin;
                $propertym->builtuparea = $request->builtuparea;
                $propertym->availablefrom = $request->availablefrom;
                $propertym->availabledate = $request->availabledate ?? date('Y-m-d');
                $propertym->dgbackup = $request->dgbackup;
                $propertym->ac = $request->ac;
                $propertym->floor = $request->floor;
                $propertym->totalfloors = $request->totalfloors;
                $propertym->carparking = $request->carparking;
                $propertym->lift = $request->lift;
                $propertym->security = $request->security;
                $propertym->onsitemanager = $request->onsitemanager;
                $propertym->bathrooms = $request->bathrooms;
                $propertym->age = $request->age;
                $propertym->plotarea = $request->plotarea;
                $propertym->carpetarea = $request->carpetarea;
                $propertym->propertyfacing = $request->propertyfacing;
                $propertym->keyavailable = $request->keyavailable;
                $propertym->suitablefor = implode(', ', $request->suitablefor);
                $propertym->residentialsubtype = $request->residentialsubtype;
                $propertym->residentialfurinished = $request->residentialfurinished;
                $propertym->othercommunity = $request->othercommunity;
                $propertym->communitydetails = $request->communitydetails;
                $propertym->geysers = $request->geysers;
                $propertym->wardrobes = $request->wardrobes;
                $propertym->bachelors = $request->bachelors;
                $propertym->clinic = $request->clinic;
                $propertym->servantroom = $request->servantroom;
                $propertym->petsallowed = $request->petsallowed;
                $propertym->clubhouse = $request->clubhouse;
                $propertym->duplex = $request->duplex;
                $propertym->pool = $request->pool;
                $propertym->tennis = $request->tennis;
                $propertym->video_url = $request->video_url;
                $propertym->created_at = date("y-m-d H:i:s");
                $propertym->grocerystore = $request->grocerystore;
                //$propertym->amenities = implode(', ', $request->amenities);
                if(!empty($request->amenities)){
                  $propertym->amenities = implode(',', $request->amenities);  
                }
                $propertym->locations = $request->locations;
                 $propertym->approval = $request->approval;
                if(!empty($request->file('proimages'))){
                    $propertym->proimages = implode(', ',$uploadedImagePaths);
                }
                if(!empty($request->file('file'))){
                $propertym->file = implode(', ', $uploadedImagePathsPlan);
                }
                $propertym->save();
                $success = true;
                $message = array('success'=>array('Proerty Management Service added successfully'));
            }
         return ResponseHelper::returnResponse(200,$success,$message);
        }
     }

}

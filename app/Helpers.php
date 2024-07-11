<?php
use App\Models\PropertyModel;
use App\Models\CommercialModel;
use App\Models\CategoryModel;
use App\Models\BasicModel;
use App\Models\SubCategoryModel;

function get_city_name($city_name){

    if($city_name == 'jubliee-hills'){
        $city_name = 'Jubliee Hills';
    }elseif($city_name == 'banjara-hills'){
        $city_name = 'Banjara Hills';
    }elseif($city_name == 'madhapur'){
        $city_name = 'Madhapur';
    }elseif($city_name == 'gachibowli'){
         $city_name = 'Gachibowli';
    }elseif($city_name == 'bio-diversity'){
         $city_name = 'Bio Diversity';
    }elseif($city_name == 'kavuri-hills'){
         $city_name = 'Kavuri Hills';
    }
    return $city_name;
}

function get_cat_name($cat_id){
    if($cat_id == 1){
        $cate_name = 'Residential';
    }elseif($cat_id == 2){
        $cate_name = 'Commercial';
    }else{
        $cate_name = CategoryModel::where('id',$cat_id)->pluck('categoryname')->first();
    }
    return $cate_name ?? '';
}

function get_enable_disable($enable_disable){
    if($enable_disable == 0){
        $enable_disable_name = 'Disabled';
    }elseif($enable_disable == 1){
        $enable_disable_name = 'Enabled';
    }else{

    }
    return $enable_disable_name ?? '';
}

function get_hot($hot){
    if($hot == 0){
        $hot_name = 'NO';
    }elseif($hot == 1){
        $hot_name = 'YES';
    }else{
        
    }
    return $hot_name ?? '';
}
function get_approval($approval){
    if($approval == 1){
        $approval_name = 'approved';
    }else{
        $approval_name = 'waiting for approval';
    }
    return $approval_name ?? '';
}


function get_sub_cat_name($cat_sub_id){
    $cat_sub_name = SubCategoryModel::where('id',$cat_sub_id)->pluck('subcategoryname')->first();
    return $cat_sub_name ?? '';
}
function get_sub_cat_count($scid){
    $count_property = PropertyModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->count();
    $count_c_property = CommercialModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->count();
    $count_basic = BasicModel::where("subcategoryid",$scid)->where('status',1)->where('approval',1)->count();
    $sub_cat_count = $count_property + $count_c_property + $count_basic ?? '0';
    return $sub_cat_count;
}

function get_category_name($get_category_id){
    $get_category_name = CategoryModel::where('id',$get_category_id)->pluck('categoryname')->first();
    return $get_category_name;
}

function get_count_by_city(){

}

function get_subcategoryid_name($get_sub_category_id){
    $subcategoryname = SubCategoryModel::where('id',$get_sub_category_id)->pluck('subcategoryname')->first();
    return $subcategoryname;

}
function get_count_status_of_property_rent($id){
    if($id == 1){
    $count_property_rent = PropertyModel::where('categoryid',$id)->where('categoryid',1)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_c_property_rent = CommercialModel::where('categoryid',$id)->where('categoryid',1)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_basic_rent = BasicModel::where('categoryid',$id)->where('categoryid',1)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_rent = $count_property_rent + $count_c_property_rent + $count_basic_rent ?? '0';
    }elseif($id == 2){
    $count_property_rent = PropertyModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_c_property_rent = CommercialModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_basic_rent = BasicModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_rent = $count_property_rent + $count_c_property_rent + $count_basic_rent ?? '0';
    }else{
    $count_property_rent = PropertyModel::where('categoryid',$id)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_c_property_rent = CommercialModel::where('categoryid',$id)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_basic_rent = BasicModel::where('categoryid',$id)->where('leadtype','Rent')->where('status',1)->where('approval',1)->count();
    $count_rent = $count_property_rent + $count_c_property_rent + $count_basic_rent ?? '0';
     }
    return $count_rent;
}

function get_count_status_of_property_sale($id){
     if($id == 1){
    $count_property_sale = PropertyModel::where('categoryid',$id)->where('categoryid',1)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_c_property_sale = CommercialModel::where('categoryid',$id)->where('categoryid',1)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_basic_sale = BasicModel::where('categoryid',1)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_sale = $count_property_sale + $count_c_property_sale + $count_basic_sale ?? '0';
     }elseif($id == 2){
    $count_property_sale = PropertyModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_c_property_sale = CommercialModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_basic_sale = BasicModel::where('categoryid',$id)->where('categoryid',2)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_sale = $count_property_sale + $count_c_property_sale + $count_basic_sale ?? '0';
     }else{
    $count_property_sale = PropertyModel::where('categoryid',$id)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_c_property_sale = CommercialModel::where('categoryid',$id)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_basic_sale = BasicModel::where('categoryid',$id)->where('leadtype','Sale')->where('status',1)->where('approval',1)->count();
    $count_sale = $count_property_sale + $count_c_property_sale + $count_basic_sale ?? '0';
     }
    return $count_sale;
}


function get_count_status_of_property_madhapur($id=''){
    $count_property_madhapur = PropertyModel::where('categoryid',$id)->where('location','madhapur')->where('status',1)->where('approval',1)->count();
    $count_c_property_madhapur = CommercialModel::where('categoryid',$id)->where('location','madhapur')->where('status',1)->where('approval',1)->count();
    $count_basic_madhapur = BasicModel::where('categoryid',$id)->where('location','madhapur')->where('status',1)->where('approval',1)->count();
    $count_madhapur = $count_property_madhapur + $count_c_property_madhapur + $count_basic_madhapur ?? '0';
    return $count_madhapur;
}

function get_count_status_of_property_gachibowli($id=''){
    $count_property_gachibowli = PropertyModel::where('categoryid',$id)->where('location','gachibowli')->where('status',1)->where('approval',1)->count();
    $count_c_property_gachibowli = CommercialModel::where('categoryid',$id)->where('location','gachibowli')->where('status',1)->where('approval',1)->count();
    $count_basic_gachibowli = BasicModel::where('categoryid',$id)->where('location','gachibowli')->where('status',1)->where('approval',1)->count();
    $count_gachibowli = $count_property_gachibowli + $count_c_property_gachibowli + $count_basic_gachibowli ?? '0';
    return $count_gachibowli;
}

function get_count_status_of_property_bio_diversity($id=''){
    $count_property_bio_diversity = PropertyModel::where('categoryid',$id)->where('location','bio-diversity')->where('status',1)->where('approval',1)->count();
    $count_c_property_bio_diversity = CommercialModel::where('categoryid',$id)->where('location','bio-diversity')->where('status',1)->where('approval',1)->count();
    $count_basic_bio_diversity = BasicModel::where('categoryid',$id)->where('location','bio-diversity')->where('status',1)->where('approval',1)->count();
    $count_bio_diversity = $count_property_bio_diversity + $count_c_property_bio_diversity + $count_basic_bio_diversity ?? '0';
    return $count_bio_diversity;
}

function get_count_status_of_property_banjara_hills($id=''){
    $count_property_banjara_hills = PropertyModel::where('categoryid',$id)->where('location','banjara-hills')->where('status',1)->where('approval',1)->count();
    $count_c_property_banjara_hills = CommercialModel::where('categoryid',$id)->where('location','banjara-hills')->where('status',1)->where('approval',1)->count();
    $count_basic_banjara_hills = BasicModel::where('categoryid',$id)->where('location','banjara-hills')->where('status',1)->where('approval',1)->count();
    $count_banjara_hills = $count_property_banjara_hills + $count_c_property_banjara_hills + $count_basic_banjara_hills ?? '0';
    return $count_banjara_hills;
}

function get_count_status_of_property_jubliee_hills($id=''){
    $count_property_jubliee_hills = PropertyModel::where('categoryid',$id)->where('location','jubliee-hills')->where('status',1)->where('approval',1)->count();
    $count_c_property_jubliee_hills = CommercialModel::where('categoryid',$id)->where('location','jubliee-hills')->where('status',1)->where('approval',1)->count();
    $count_basic_jubliee_hills = BasicModel::where('categoryid',$id)->where('location','jubliee-hills')->where('status',1)->where('approval',1)->count();
    $count_jubliee_hills = $count_property_jubliee_hills + $count_c_property_jubliee_hills + $count_basic_jubliee_hills ?? '0';
    return $count_jubliee_hills;
}

function get_count_status_of_property_kavuri_hills($id=''){
    $count_property_kavuri_hills = PropertyModel::where('categoryid',$id)->where('location','kavuri-hills')->where('status',1)->where('approval',1)->count();
    $count_c_property_kavuri_hills = CommercialModel::where('categoryid',$id)->where('location','kavuri-hills')->where('status',1)->where('approval',1)->count();
    $count_basic_kavuri_hills = BasicModel::where('categoryid',$id)->where('location','kavuri-hills')->where('status',1)->where('approval',1)->count();
    $count_kavuri_hills = $count_property_kavuri_hills + $count_c_property_kavuri_hills + $count_basic_kavuri_hills ?? '0';
    return $count_kavuri_hills;
}
?>

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\PropertyModel;
use App\Models\EnquiresModel;
use App\Models\ContactModel;
use App\Models\CommercialModel;
use App\Models\BasicModel;
use DB;
use Illuminate\Support\Collection;
use Validator;
use App\Facades\ResponseHelper;

class CSVController extends Controller {
    
   public function exportCSV(Request $request,$id){
       
       if($id == 1){
          $tasks = $prodata = PropertyModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->get()->toArray(); 
          $fileName = 'residential'.'_'.'enabled_list'.'_'.rand(0, 99999).'.csv';
       }elseif($id == 2){
           $tasks = $prodata = CommercialModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->get()->toArray(); 
            $fileName = 'commercial'.'_'.'enabled_list'.'_'.rand(0, 99999).'.csv';
       }else{
           $tasks = $prodata = BasicModel::where('categoryid', $id)->where('status',1)->orderBy('id', 'desc')->get()->toArray(); 
            $fileName = 'basic'.'_'.'enabled_list'.'_'.rand(0, 99999).'.csv';
       }
          
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
           if($id == 2){
           $columns = array('Property Type','Property Subtype','Property Name','Property ID','Status', 'Enable/Disable Status','Hot Property','Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source', 
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available',  'Suitable For', 'Commercial Furinished', 'Other Community', 'No.of work stations', 'No.of Manager Cabins', 'No.of Dicussion Rooms', 'No.of Conference Room', 'Boardroom (Capacity)',
           'Reception', 'Pantry', 'Lunch Room', 'Server Room', 'Lead time (days) (If Business Park)', 'Liable Upto (If Business Park)', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                    $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['Status']  = get_approval($task['approval']);
                    $row['Enable/Disable Status']  = get_enable_disable($task['status']);
                    $row['Hot Property']  = get_hot($task['favourites']);
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                    $row['suitablefor']  = $task['suitablefor'];
                    $row['commercialfurinished']  = $task['commercialfurinished'];
                    $row['othercommunity']  = $task['othercommunity'];
                    $row['workstations']  = $task['workstations'];
                    $row['managercabins']  = $task['managercabins'];
                    $row['discussionrooms']  = $task['discussionrooms'];
                    $row['conferencerooms']  = $task['conferencerooms'];
                    $row['boardrooms']  = $task['boardrooms'];
                    $row['reception']  = $task['reception'];
                    $row['pantry']  = $task['pantry'];
                    $row['lunchroom']  = $task['lunchroom'];
                    $row['serverroom']  = $task['serverroom'];
                    $row['leadtime']  = $task['leadtime'];
                    $row['liableupto']  = $task['liableupto'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'],$row['Status'],$row['Enable/Disable Status'],$row['Hot Property'], $row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'], $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'], $row['suitablefor'],
                    $row['commercialfurinished'], $row['othercommunity'], $row['workstations'], $row['managercabins'], $row['discussionrooms'], $row['conferencerooms'], $row['boardrooms'], $row['reception'], $row['pantry'],
                    $row['lunchroom'], $row['serverroom'], $row['leadtime'], $row['liableupto'], $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
               
           }else{
           $columns = array('Property Type','Property Subtype','Property Name','Property ID','Status','Enable/Disable Status','Hot Property', 'Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source', 
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available', 'Suitable For', 'Residential Furinished', 'Other Community', 'communitydetails', 'Geysers', 'Wardrobes', 'Bachelors', 'Clinic', 'Servant Room', 'Pets Allowed', 'Club House', 'Duplex', 'Pool',
           'Tennis Court', 'Grocery Store', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                     $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['Status']  = get_approval($task['approval']);
                    $row['Enable/Disable Status']  = get_enable_disable($task['status']);
                    $row['Hot Property']  = get_hot($task['favourites']);
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                    $row['suitablefor']  = $task['suitablefor'];
                    $row['residentialfurinished']  = $task['residentialfurinished'];
                    $row['othercommunity']  = $task['othercommunity'];
                    $row['communitydetails']  = $task['communitydetails'];
                    $row['geysers']  = $task['geysers'];
                    $row['wardrobes']  = $task['wardrobes'];
                    $row['bachelors']  = $task['bachelors'];
                    $row['clinic']  = $task['clinic'];
                    $row['servantroom']  = $task['servantroom'];
                    $row['petsallowed']  = $task['petsallowed'];
                    $row['clubhouse']  = $task['clubhouse'];
                    $row['duplex']  = $task['duplex'];
                    $row['pool']  = $task['pool'];
                    $row['tennis']  = $task['tennis'];
                    $row['grocerystore']  = $task['grocerystore'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'],$row['Status'], $row['Enable/Disable Status'],$row['Hot Property'],$row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'], $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'], $row['suitablefor'],
                    $row['residentialfurinished'], $row['othercommunity'], $row['communitydetails'], $row['geysers'], $row['wardrobes'], $row['bachelors'], $row['clinic'], $row['servantroom'], $row['petsallowed'],
                    $row['clubhouse'], $row['duplex'], $row['pool'], $row['tennis'], $row['grocerystore'], $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
           }
            
            
        return response()->stream($callback, 200, $headers);
    }

  
  
  
  public function approval_exportCSV(Request $request){
      
       $fileName = 'approval_pending_list'.'_'.rand(0, 99999).'.csv';
        $pro_data = PropertyModel::where('approval',0)->get()->toArray();
        $pro_comm_data = CommercialModel::where('approval',0)->get()->toArray();
        $pro_basic_data = BasicModel::where('approval',0)->get()->toArray();
        $tasks = array_merge($pro_data,$pro_comm_data,$pro_basic_data);
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
          $columns = array('Property Type','Property Subtype','Property Name','Property ID', 'Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source', 
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available',  'Suitable For', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                    $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                    $row['suitablefor']  = $task['suitablefor'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'], $row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'],  $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'], $row['suitablefor'],
                    $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
        return response()->stream($callback, 200, $headers);
    }
   
   
   public function host_exportCSV(Request $request){
       $fileName = 'host_list'.'_'.rand(0, 99999).'.csv';
       $user_id = \Session::get('id');
        if(auth()->user()->type == 'super_admin'){
        $prodata1 = PropertyModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        $prodata2 = CommercialModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        $prodata3 = BasicModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        }else{
        $prodata1 = PropertyModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        $prodata2 = CommercialModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        $prodata3 = BasicModel::where('favourites', 1)->orderBy('id', 'desc')->get()->toArray();
        }
        $tasks = array_merge($prodata1,$prodata2,$prodata3);
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
             $columns = array('Property Type','Property Subtype','Property Name','Property ID', 'Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source', 
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available',  'Suitable For', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                    $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                     $row['suitablefor']  = $task['suitablefor'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'], $row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'], $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'],$row['suitablefor'],
                    $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
        return response()->stream($callback, 200, $headers);
    }
    
    
    public function disableproperty(Request $request){
       $fileName = 'disable_property_list'.'_'.rand(0, 99999).'.csv';
       $user_id = \Session::get('id');
       if(auth()->user()->type == 'super_admin'){
        $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        $prodata3 = BasicModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        }else{
        $prodata1 = PropertyModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        $prodata2 = CommercialModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        $prodata3 = BasicModel::where('status', 0)->orderBy('createdate', 'desc')->get()->toArray();
        }
        $tasks = array_merge($prodata1,$prodata2,$prodata3);
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
       $columns = array('Property Type','Property Subtype','Property Name','Property ID', 'Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source', 
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available',  'Suitable For', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                    $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                    $row['suitablefor']  = $task['suitablefor'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'], $row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'], $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'],$row['suitablefor'],
                    $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
        return response()->stream($callback, 200, $headers);
    }
    
    
    
    public function allproperty(Request $request){
        $fileName = 'all_property_list'.'_'.rand(0, 99999).'.csv';
        $user_id = \Session::get('id');
        $prodata1 = PropertyModel::orderBy('createdate', 'desc')->get()->toArray();
        $prodata2 = CommercialModel::orderBy('createdate', 'desc')->get()->toArray();
        $prodata3 = BasicModel::orderBy('createdate', 'desc')->get()->toArray();
        $tasks = array_merge($prodata1,$prodata2,$prodata3);
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
           $columns = array('Property Type','Property Subtype','Property Name','Property ID', 'Executive Name', 'Data Provided Date', 'Owner Name', 'Owner Number', 'Contact Two', 'Email', 'Supervisor Name', 'Supervisor Contact', 'Source',
           'Description', 'Lead Type', 'Service Charge', 'S&M Property', 'Location', 'Building Name', 'Unit', 'Landmark', 'Total Price', 'Price Per Sft', 'Maintenance', 'Deposit', 
           'Lockin', 'Built Up Area', 'Available From','Available Date', 'DG Backup', 'AC', 'Floor', 'Total Floors', 'No.of Car Parking', 'Lift', 'Security', 'Onsite Manager', 'Bath Rooms', 'Age', 'Plot Area', 'Carpet Area', 'Property Facing',
           'Keys Available',  'Suitable For', 'Property GPS Location', 'Landmark GPS Location', 'Video Url');
           
           $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($tasks as $task) {
                    $row['categoryid']  = get_cat_name($task['categoryid']);
                    $row['subcategoryid']  = get_sub_cat_name($task['subcategoryid']);
                    $row['propertyname']  = $task['propertyname'];
                    $row['propertyid']  = $task['propertyid'];
                    $row['executivename']  = $task['executivename'];
                    $row['date']  = $task['date'];
                    $row['ownername']  = $task['ownername'];
                    $row['ownernumber']  = $task['ownernumber'];
                    $row['contact_two']  = $task['contact_two'];
                    $row['email']  = $task['email'];
                    $row['supervisorname']  = $task['supervisorname'];
                    $row['supervisornumber']  = $task['supervisornumber'];
                    $row['source']  = $task['source'];
                    
                    $row['description']  = $task['description'];
                    $row['leadtype']  = $task['leadtype'];
                    $row['servicecharge']  = $task['servicecharge'];
                    $row['smproperty']  = $task['smproperty'];
                    $row['location']  = $task['location'];
                    $row['building_name']  = $task['building_name'];
                    $row['unit']  = $task['unit'];
                    $row['landmark']  = $task['landmark'];
                    $row['totalprice']  = $task['totalprice'];
                    $row['pricepersft']  = $task['pricepersft'];
                    $row['maintenance']  = $task['maintenance'];
                    $row['deposit']  = $task['deposit'];
                    $row['lockin']  = $task['lockin'];
                    
                    $row['builtuparea']  = $task['builtuparea'];
                    $row['availablefrom']  = $task['availablefrom'];
                    $row['availabledate']  = $task['availabledate'];
                    $row['dgbackup']  = $task['dgbackup'];
                    $row['ac']  = $task['ac'];
                    $row['floor']  = $task['floor'];
                    $row['totalfloors']  = $task['totalfloors'];
                    $row['carparking']  = $task['carparking'];
                    $row['lift']  = $task['lift'];
                    $row['security']  = $task['security'];
                    $row['onsitemanager']  = $task['onsitemanager'];
                    $row['bathrooms']  = $task['bathrooms'];
                    $row['age']  = $task['age'];
                    $row['plotarea']  = $task['plotarea'];
                    $row['carpetarea']  = $task['carpetarea'];
                    $row['propertyfacing']  = $task['propertyfacing'];
                    $row['keyavailable']  = $task['keyavailable'];
                    $row['suitablefor']  = $task['suitablefor'];
                    $row['locations']  = $task['locations'];
                    $row['landmark_gps']  = $task['landmark_gps'];
                    $row['video_url']  = $task['video_url'];
                    
                    fputcsv($file, array($row['categoryid'],$row['subcategoryid'],$row['propertyname'],$row['propertyid'], $row['executivename'], $row['date'], $row['ownername'], $row['ownernumber'], 
                    $row['contact_two'], $row['email'], $row['supervisorname'], $row['supervisornumber'], $row['source'], $row['description'], $row['leadtype'],
                    $row['servicecharge'], $row['smproperty'], $row['location'], $row['building_name'], $row['unit'], $row['landmark'], $row['totalprice'], $row['pricepersft'], $row['maintenance'],
                    $row['deposit'], $row['lockin'], $row['builtuparea'], $row['availablefrom'], $row['availabledate'], $row['dgbackup'], $row['ac'], $row['floor'], $row['totalfloors'], $row['carparking'],
                    $row['lift'], $row['security'], $row['onsitemanager'], $row['bathrooms'], $row['age'], $row['plotarea'], $row['carpetarea'], $row['propertyfacing'], $row['keyavailable'], $row['suitablefor'],
                    $row['locations'], $row['landmark_gps'], $row['video_url']));
                }
                fclose($file);
            }; 
        return response()->stream($callback, 200, $headers);
    }
    
    
    public function enquires(Request $request){
        $fileName = 'property_enquiry_list'.'_'.rand(0, 99999).'.csv';
        $user_id = \Session::get('id');
        $tasks = EnquiresModel::orderBy('createdate', 'desc')->get()->toArray();
        
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
           $columns = array('Name','Phone', 'Email', 'message', 'property', 'propertyid', 'type_of_loan', 'createdate');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['name']  = $task['name'];
                    $row['phone']  = $task['phone'];
                    $row['email']    = $task['email'];
                    $row['message']    = $task['message'];
                    $row['property']  = $task['property'];
                    $row['propertyid']  = $task['propertyid'];
                    $row['type_of_loan']  = $task['type_of_loan'];
                    $row['createdate']  = $task['createdate'];
                    
                    fputcsv($file, array($row['name'],$row['phone'], $row['email'], $row['message'], $row['property'], $row['propertyid'], 
                    $row['type_of_loan'], $row['createdate']));
                }
    
                fclose($file);
            };
        return response()->stream($callback, 200, $headers);
    }
    
    public function contacts(Request $request){
        $fileName = 'contacts_enquiry_list'.'_'.rand(0, 99999).'.csv';
        $user_id = \Session::get('id');
        $tasks = ContactModel::orderBy('createdate', 'desc')->get()->toArray();
        
        //dd($tasks);
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
           $columns = array('Name','Phone', 'Email', 'message', 'purpose', 'createdate');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['name']  = $task['name'];
                    $row['number']  = $task['number'];
                    $row['email']    = $task['email'];
                    $row['message']    = $task['message'];
                    $row['purpose']  = $task['purpose'];
                    $row['createdate']  = $task['createdate'];
                    
                    fputcsv($file, array($row['name'],$row['number'], $row['email'], $row['message'], $row['purpose'], $row['createdate']));
                }
    
                fclose($file);
            };
        return response()->stream($callback, 200, $headers);
    }

}

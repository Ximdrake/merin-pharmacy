<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Prescription;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
use Nexmo\Laravel\Facade\Nexmo;
use Carbon\Carbon;
use App\User;
use Mail;

class profileController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users= DB::table('users')
            ->select('users.*')->get();
        return view('pages.userProfile', compact('users'));
    }

     

     function sendMessage(Request $request){

       $medicine = Prescription::all();

     foreach($medicine as $med){

            $sched = explode('-' , $med->time);

          foreach($sched as $i=>$key){                   
            if($key==strtolower($request->data)){ 
                var_dump($request->data);
              $prescription =  Prescription::where('id', '=',$med->id)->first();
              $minutes = Carbon::now()->diffInMinutes($prescription->updated_at); 
              if($minutes>=1 && $prescription->status!="Done"){
                echo "maoni";

                var_dump("DIRI RA KUTOB");
             
                 $prescription->quantity = $prescription->quantity-$med->per_day;
                 $prescription->quantity_took=$prescription->quantity_took+$med->per_day;
                 
                 $patient= Patient::where('id', '=',$med->pid)->first();
                 $contact = $patient->contact_number;
                         if($prescription->quantity_took==$prescription->pres_quantity&&$prescription->quantity==0){
                             $prescription->status = "Done";
                             $prescription->save();
                            $patient= Patient::where('id', '=',$med->pid)->first();
                            $contact = $patient->contact_number;
                            var_dump("humana".$contact." ".$patient->firstname);
                             try{
                                Nexmo::message()->send([
                                    'to'   => $contact,
                                    'from' => 'Merin Pharmacy',
                                    'text' => 'Good Day Mr/Mrs. '.$patient->firstname." ".$patient->lastname.", "."This is to inform you that you have to taken all of your prescribed maintenance medicine ".$prescription->generic_name."(".$prescription->brand_name."). Thank you for following the required schedule of the entire maintenance period. Have a nice day!  - Merin Pharmacy"
                                ]);                    
                              }catch(\Exception $e){
                                   $data = array('name'=>"PharmASSIST",
                                    'email'=>"asidorx@gmail.com");
                                        Mail::send([],[],function($message) use ($data){
                                        $message->to($data['email'],'Hello Mr/Mrs '.$data['name'])->subject('Message Sending Error!'.$data['name'])
                                        ->setBody('The system failed to send the message to the patient due to service providers technical problem, you can remind him/her via personal text. Patient number: '.$contact);
                                        $message->from('pharmassisthesis@gmail.com','PharmASSIST');
                                        }); 
                                }
                             
                            }else if($prescription->quantity_took!=$prescription->pres_quantity&&$prescription->quantity==0){
                                $prescription->save();  
                                $patient= Patient::where('id', '=',$med->pid)->first();
                                $contact = $patient->contact_number;
                                var_dump("WAALA NA".$contact.$patient->firstname);
                                 try{
                                Nexmo::message()->send([
                                    'to'   => $contact,
                                    'from' => 'Merin Pharmacy',
                                    'text' => 'Good Day Mr/Mrs. '.$patient->firstname." ".$patient->lastname.", "."This is to inform you that you have 0 quantity left in your possession of ".$prescription->generic_name."(".$prescription->brand_name."). You need to refill your prescription to maintain your medication. Have a nice day!  - Merin Pharmacy"
                                ]);                    
                              }catch(\Exception $e){
                                   $data = array('name'=>"PharmASSIST",
                                    'email'=>"asidorx@gmail.com");
                                        Mail::send([],[],function($message) use ($data){
                                        $message->to($data['email'],'Hello Mr/Mrs '.$data['name'])->subject('Message Sending Error!'.$data['name'])
                                        ->setBody('The system failed to send the message to the patient due to service providers technical problem, you can remind him/her via personal text. Patient number: '.$contact);
                                        $message->from('pharmassisthesis@gmail.com','PharmASSIST');
                                        }); 
                                }
                                      
                            }else if($prescription->quantity_took!=$prescription->pres_quantity&&$prescription->quantity!=0){
                                 $prescription->save();
                                 $patient= Patient::where('id', '=',$med->pid)->first();
                                $contact = $patient->contact_number;
                                var_dump("naa pa".$contact.$patient->firstname);
                                       try{
                            Nexmo::message()->send([
                                'to'   => $contact,
                                'from' => 'Merin Pharmacy',
                                'text' => 'Good Day Mr/Mrs. '.$patient->firstname." ".$patient->lastname.", "."This is to remind you that you have to take your maintenance medicine (".$prescription->per_day.") ".$prescription->generic_name."(".$prescription->brand_name.") at exactly ".$key." You have ".$prescription->quantity." left in your possession.  - Merin Pharmacy"
                            ]);                    
                          }catch(\Exception $e){
                               $data = array('name'=>"PharmASSIST",
                                'email'=>"asidorx@gmail.com");
                                    Mail::send([],[],function($message) use ($data){
                                    $message->to($data['email'],'Hello Mr/Mrs '.$data['name'])->subject('Message Sending Error!'.$data['name'])
                                    ->setBody('The system failed to send the message to the patient due to service providers technical problem, you can remind him/her via personal text. Patient number :');
                                    $message->from('pharmassisthesis@gmail.com','PharmASSIST');
                                    }); 
                                    }
                            }
                }
            }      
        }
    }
}




    public function viewProfile($id)
    {
        $patients = Patient::All()->findOrFail($id);
        return View::make('pages.profile', compact($patients));
    }

    public function addPrescription(Request $request){
         $medicine = Prescription::create([
                    'pid'       => $request->id,
                    'generic_name'       => $request->generic_name,
                    'brand_name'       => $request->brand_name,
                    'dosage_form'        => $request->dosage_form,
                    'dosage_strength'  => $request->dosage_strength,
                    'pres_quantity'        => $request->pres_quantity,
                    'quantity'        => $request->onhand_quantity,
                    'signa'        => $request->signa,
                    'allergy'      => $request->allergy,
                    'time'        => $request->time,
                    'per_day'        => $request->per_day,
                    'refill_check'        => $request->refill_check
                ]);
        $medicine->save();
            return json_encode($request);
    }

    public function prescriptionDetails(Request $request){
        $prescription = Prescription::where('id','=',$request->id)->first();
        return json_encode($prescription);
    } 

    public function updatePrescription(Request $request){
            $prescription=  Prescription::find($request->drug_id);
            $prescription->generic_name = $request->generic_name; 
            $prescription->brand_name = $request->brand_name;
            $prescription->dosage_form = $request->dosage_form;
            $prescription->dosage_strength = $request->dosage_strength;
            $prescription->pres_quantity = $request->pres_quantity;
            $prescription->quantity = $request->quantity;
            $prescription->signa = $request->signa;
            $prescription->allergy = $request->allergy;
            $prescription->time = $request->time;
            $prescription->per_day = $request->per_day;
            $prescription->quantity_took = $request->quantity_took;
            $prescription->status = $request->status;
            $prescription->refill_check = $request->refill_check;    
            $prescription->save(); 
        return json_encode($request->quantity);
        }

    public function updateUser(Request $request){
           
            $users= User::find($request->id);
            $users->firstname = $request->first_name; 
            $users->lastname = $request->last_name;
            $users->email = $request->contact;
            $users->password = bcrypt($request->new_pass);
            $users->image_ext='jpg';
            $users->image = $request->captured_photo_edit;
            $users->save();
         
        return json_encode("OK");
        }


    }

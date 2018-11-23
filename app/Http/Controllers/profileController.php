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

class profileController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users= DB::table('patients')
            ->join('doctors', 'doctors.id', '=', 'patients.doc_id')
            ->select('patients.*','doctors.firstname as docfirstname','doctors.lastname as doclastname')->get();
        $doctors=Doctor::All();
        return view('pages.profile', compact('users','doctors'));
    }


     function sendMessage(Request $request){

       $medicine = Prescription::all();

     foreach($medicine as $med){
            if($med->time==strtolower($request->data)){ 
              var_dump($med->pid);

              $prescription =  Prescription::where('id', '=',$med->id)->first();
              $minutes = Carbon::now()->diffInMinutes($prescription->updated_at); 
              // if($minutes>5){
              //   $prescription->quantity = $prescription->quantity-$med->per_day;
              //     $prescription->save();  

              //     $patient= Patient::where('id', '=',$med->pid)->first();
              //     $contact = $patient->contact_number;
              //     try{
              //       Nexmo::message()->send([
              //           'to'   => $contact,
              //           'from' => 'PharmaSys',
              //           'text' => 'Good Day Mr/Mrs. '.$patient->firstname." ".$patient->lastname.", "."This is to remind you that you have to take your maintenance medicine ".$prescription->generic_name."(".$prescription->brand_name.") at exactly ".$med->time." You have ".$prescription->quantity."pcs left in your possession.  - PharmASSIST"
              //       ]);
              //     }catch(\Exception $e){
              //          $data = array('name'=>"PharmASSIST",
              //           'email'=>"asidorx@gmail.com");
              //               Mail::send([],[],function($message) use ($data){
              //               $message->to($data['email'],'Hello Mr/Mrs '.$data['name'])->subject('Message Sending Error!'.$data['name'])
              //               ->setBody('The system failed to send the message to the patient due to service providers technical problem, you can remind him/her via personal text. Patient number : 09477599352');
              //               $message->from('pharmassisthesis@gmail.com','PharmASSIST');
              //               });   
              //   }
              
              //  var_dump($contact);

              // }
              
              
            }
            }

       return json_encode($request->data);

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
            $prescription->refill_check = $request->refill_check;    
            $prescription->save(); 
        return json_encode($request->quantity);
        }

    public function deletePrescription(Request $request){
            
    }


    }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Prescription;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
Use Alert;

class studentController extends Controller
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
        return view('pages.students', compact('users','doctors'));
    }

    public function addPatient(Request $request){
                       
                    $patient = new Patient();
                    $patient->middlename = $request->middle_name;
                    $patient->firstname  = $request->first_name;
                    $patient->lastname   = $request->last_name;
                    $patient->spouse_g   = $request->guardian;
                    $patient->contact_number = $request->contact;
                    $patient->birthdate =$request->bday;
                    $patient->gender = $request->gender;
                    $patient->doc_id    = $request->doc_id;
                    $patient->address   = $request->address;
                    $patient->status    = "On Maintenance";          
                    $patient->image_ext='jpg';
                    $patient->image = $request->captured_photo;
                    $patient->save();

            $medicine = Prescription::create([
                    'pid'       => $patient->id,
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
            return json_encode("success");
    }

    public function makati(){
        $users= DB::table('patients')
            ->select('patients.*','patients.image as image')->get();
        return Datatables::of($users)
        ->editColumn('name', function($data){
            return $data->firstname.' '.$data->middlename.' '.$data->lastname;
        })
        ->editColumn('doctor', function($data){
            return $data->doc_id;
        })
        ->addColumn('action', function($data){
                 return '<button class="btn btn-xs "><a href="patients/'.$data->id.'"><i class="fa fa-eye"></i></a></button>&nbsp;&nbsp;&nbsp; <button class="btn btn-xs btn-warning update_patient waves-effect" id="'.$data->id.'" data-toggle="modal" data-target="#edit_form_modal"><i class="fa fa-edit"></i></button> &nbsp;
                     <button class="btn btn-xs btn-danger delete_patient waves-effect" id="'.$data->id.'"><i class="fa fa-trash"></i></button>';          
        })
        ->make(true);
    }

     public function patient($id)
    {
        
        $users= DB::table('patients')
            ->select('patients.*')
            ->where('patients.id',$id)
            ->get();
        $medicine= DB::table('prescriptions')
            ->select('prescriptions.status')
            ->where('prescriptions.pid',$id)
            ->where('status','Done')
            ->get();
        $meds= DB::table('prescriptions')
            ->select('prescriptions.status')
            ->where('prescriptions.pid',$id)
            ->get();
        return view('pages.profile', compact('users','medicine','meds'));
    }
     public function prescription($id){
       $medicine= DB::table('prescriptions')
            ->where('pid','=',$id)
            ->get();

        return Datatables::of($medicine)
        ->addColumn('action', function($data){
                 return '<button class="btn btn-xs btn-warning prescription-edit waves-effect" id="'.$data->id.'" data-toggle="modal" data-target="#prescription_edit_modal"><i class="fa fa-edit"></i></button> &nbsp;
                     <button class="btn btn-xs btn-danger delete_prescription waves-effect" id="'.$data->id.'"><i class="fa fa-trash"></i></button>';          
        })
         ->editColumn('status', function($data){
                    if($data->status==null){
                         return "On Going";
                    }
            
        })
        ->make(true);
    }

    public function deletePatient(Request $request){

        $patient = Patient::find($request->id);
        $patient->delete();
       
        return json_encode("Success");

    }
    public function deletePrescription(Request $request){

        $drug = Prescription::find($request->id);
        $drug->delete();
       
        return json_encode("Success");

    }

    public function Patientdetails(Request $request){
         $users= DB::table('patients')
            ->select('patients.*')
            ->where('patients.id',$request->id)
            ->get();

            return json_encode($users);
    }
    public function editPatient(Request $request){

                    $patient=  Patient::find($request->id);
                    $patient->middlename = $request->middle_name;
                    $patient->firstname  = $request->first_name;
                    $patient->lastname   = $request->last_name;
                    $patient->spouse_g   = $request->guardian;
                    $patient->contact_number = $request->contact;
                    $patient->birthdate =$request->bday;
                    $patient->gender = $request->gender;
                    $patient->doc_id = $request->doc_id;
                    $patient->address   = $request->address;
                    $patient->status    = "On Maintenance";          
                    $patient->image_ext='jpg';
                    $patient->image = $request->captured_photo_edit;
                    $patient->save();

            return json_encode($request->captured_photo_edit);
    }

}

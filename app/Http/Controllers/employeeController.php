<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use Auth;
use Yajra\Datatables\Datatables;
use Alert;

class employeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        Alert::message('Robots are working!');
        return view('pages.employees');
    }

    public function makatiEmployee(){
        $id = Auth::user()->id;
        $mak = Auth::all();

        return Datatables::of($mak)
        ->addColumn('action', function($data){
            return 'Actions here';
        })
        ->make(true);
    }

    public function doctorView(){
         $doctor= Doctor::All();

        return Datatables::of($doctor)
        ->addColumn('action', function($data){
                 return '<button class="btn btn-xs btn-warning doctor-edit waves-effect" id="'.$data->id.'" data-toggle="modal" data-target="#edit_doctor_modal"><i class="fa fa-edit"></i></button> &nbsp;
                     <button class="btn btn-xs btn-danger delete_doctor waves-effect" id="'.$data->id.'"><i class="fa fa-trash"></i></button>';          
        })
         ->addColumn('name', function ($data){
            return 'Dr. '.$data->firstname." ".$data->middlename." ".$data->lastname;
        })
        ->make(true);
    }

    public function addDoctor(Request $request){                 
            $doctor = new Doctor();
            $doctor->middlename = $request->middle_name;
            $doctor->firstname  = $request->first_name;
            $doctor->lastname   = $request->last_name;
            $doctor->clinic_location   = $request->clinic;
            $doctor->contact_number = $request->contact_number;
            $doctor->license_number =$request->license;
            $doctor->email = $request->email;
            $doctor->specialty    = $request->specialty;
            $doctor->save();
            return json_encode("success");
            }

    public function doctorDetails(Request $request){
         $users= Doctor::All()
                ->where('id',$request->id)->first();
            return json_encode($users);
        }

    public function updateDoctor(Request $request){
            $doctor=  Doctor::find($request->id);
            $doctor->firstname = $request->first_name; 
            $doctor->middlename = $request->middle_name;
            $doctor->lastname = $request->last_name;
            $doctor->clinic_location = $request->clinic;
            $doctor->contact_number = $request->contact_number;
            $doctor->license_number = $request->license;
            $doctor->email = $request->email;
            $doctor->specialty = $request->specialty;
            $doctor->save(); 
            Alert::info('Email was sent!');
        return json_encode($request->doctor_id);
        }

    public function deleteDoctor(Request $request){
            $doctor = Doctor::find($request->id);
            $doctor->delete();
            return json_encode("Success");

         }


}

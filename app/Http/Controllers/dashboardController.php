<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Doctor;
use App\Prescription;
use Illuminate\Http\Request;

class dashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $doctors=Doctor::All();
            $patients=Patient::All();
            $prescriptions=Prescription::All();
       return view('pages.dashboard', compact('patients','doctors','prescriptions'));
    }
}

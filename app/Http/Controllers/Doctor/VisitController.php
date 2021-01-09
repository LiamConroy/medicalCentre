<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Doctor;
use App\Models\Patient;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:doctor');
        
    }

    public function index()
    {
        //$visits = Visit::where('doctor_id', '=','patient_id'  );
       $visits = Visit::all();

        return view ('doctor.visits.index', [
            'visits' => $visits
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

       return view ('doctor.visits.create', [
            'doctors' => $doctors,
            'patients' => $patients
        ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'date_of' => 'required',
            'time_of' => 'required|max:191',
            'duration' => 'required|integer|max:191',
            'cost' => 'required|min:0.01|max:191'
        ]);  
        
        $visit = new Visit();
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->date_of = $request->input('date_of');
        $visit->time_of = $request->input('time_of');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->save();

        
        return redirect()->route('doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);
        return view('doctor.visits.show', ['visit' => $visit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visits = Visit::all();
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view ('doctor.visits.edit', [
            'visits' => $visits,
            'doctors' => $doctors,
            'patients' => $patients
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);

        
        $request->validate([
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'date_of' => 'required',
            'time_of' => 'required|max:191',
            'duration' => 'required|integer|max:191',
            'cost' => 'required|min:0.01|max:191'
        ]);  
        
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->date_of = $request->input('date_of');
        $visit->time_of = $request->input('time_of');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->save();

        
        return redirect()->route('doctor.visits.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id); 
        $visit->delete();

        return redirect()->route('doctor.visits.index');
    }
}

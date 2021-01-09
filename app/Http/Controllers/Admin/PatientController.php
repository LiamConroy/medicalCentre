<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();

        return view ('admin.patients.index', [
            'patients' => $patient
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.patients.create");
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
            'name' => 'required|string|max:25',
            'postal_address' => 'required|string|max:191',
            'phone_number' => 'required|max:191',
            'email' => 'required|string|max:191',
            'health_insurance' => 'required|bool|max:191',
            'company_name' => 'required|string|max:191',
            'policy_num' => 'required|string|max:191',
            'password' => 'required|string|max:191'
        ]);  
        
        $user = new User();
        $user->name = $request->input('name');
        $user->postal_address = $request->input('postal_address');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
        $user->save();

        $user->roles()->attach(Role::where('name', 'patient')->first());

        $patient = new Patient();
        $patient->health_insurance = $request->input('health_insurance');
        $patient->company_name = $request->input('company_name');
        $patient->policy_num = $request->input('policy_num');
        $patient->user_id = $user->id;
        $patient->save();

        
        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::all();

        return view ('admin.patients.edit', [
            'patients' => $patient
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

        $patient = Patient::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string|max:25',
            'postal_address' => 'required|string|max:191',
            'phone_number' => 'required|max:191',
            'email' => 'required|string|max:191',
            'health_insurance' => 'required|bool|max:191',
            'company_name' => 'required|string|max:191',
            'policy_num' => 'required|string|max:191',
            'password' => 'required|string|max:191'
        ]);  
        
        
        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->postal_address = $request->input('postal_address');
        $patient->phone_number = $request->input('phone_number');
        $patient->email = $request->input('email');
        $patient->health_insurance = $request->input('health_insurance');
        $patient->company_name = $request->input('company_name');
        $patient->policy_num = $request->input('policy_num');
        $patient->save();

        
        return redirect()->route('admin.patients.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id); 
        $patient->delete();

        return redirect()->route('admin.patients.index');
    }
}

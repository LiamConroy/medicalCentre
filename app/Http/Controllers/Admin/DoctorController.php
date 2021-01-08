<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
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
        $doctors = Doctor::all();

        return view ('admin.doctors.index', [
            'doctors' => $doctors
        ]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.doctors.create");
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
            'start_date' => 'required'
        ]);  
        
        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->postal_address = $request->input('postal_address');
        $doctor->phone_number = $request->input('phone_number');
        $doctor->email = $request->input('email');
        $doctor->start_date = $request->input('start_date');
        $doctor->save();

        
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::all();

        return view ('admin.doctors.edit', [
            'doctors' => $doctor
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

        $doctor = Doctor::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string|max:25',
            'postal_address' => 'required|string|max:191',
            'phone_number' => 'required|max:191',
            'email' => 'required|string|max:191',
            'start_date' => 'required'
        ]);  
        
        
        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->postal_address = $request->input('postal_address');
        $doctor->phone_number = $request->input('phone_number');
        $doctor->email = $request->input('email');
        $doctor->start_date = $request->input('start_date');
        $doctor->save();

        
        return redirect()->route('admin.doctors.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id); 
        $doctor->delete();

        return redirect()->route('admin.doctors.index');
    }
}

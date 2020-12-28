<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitController extends Controller
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
        $visits = Visit::all();

        return view ('admin.visits.index', [
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
        return view("admin.visit.create");
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
            'date_of' => 'required|date|max:191',
            'time_of' => 'required|time|max:191',
            'duration' => 'required|integer|max:191',
            'cost' => 'required|decimal|max:191'
        ]);  
        
        $visit = new Visit();
        $visit->date_of = $request->input('date_of');
        $visit->time_of = $request->input('time_of');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->save();

        
        return redirect()->route('admin.visit.index');
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
        return view('admin.visits.show', ['visit' => $visit]);
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

        return view ('admin.visits.edit', [
            'visits' => $visits
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
            'date_of' => 'required|date|max:191',
            'time_of' => 'required|time|max:191',
            'duration' => 'required|integer|max:191',
            'cost' => 'required|decimal|max:191'
        ]);  
        
        
        $visit->date_of = $request->input('date_of');
        $visit->time_of = $request->input('time_of');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->save();

        
        return redirect()->route('admin.visit.index'); 
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

        return redirect()->route('admin.visits.index')
    }
}

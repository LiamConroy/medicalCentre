@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Add new visit
       </div>

       <div class="card-body">
         @if($errors->any())
             <div class="alert alert-danger">
               <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
               </ul>
             </div>
         @endif
        <form action="{{ route('doctor.visits.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover" />
                </div> --}}

                <div class="form-group">
                    <label for="doctor">Doctor</label>
                    <select name='doctor_id'>
                      @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ (old('doctor_id') == $doctor->id) ? "selected" : "" }}>{{ $doctor->user->name }}</option>
                      @endforeach
                    </select>
                </div> 

                 <div class="form-group">
                    <label for="patient">Patient</label>
                    <select name='patient_id'>
                      @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ (old('patient_id') == $patient->id) ? "selected" : "" }}>{{ $patient->user->name }}</option>
                      @endforeach
                    </select>
                </div> 
                
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date_of" id="date_of" value="{{ old('date_of') }}" />
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" name="time_of" id="time_of" value="{{ old('time_of') }}" />
                </div>
                <div class="form-group">
                    <label for="time">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration') }}" />
                </div>
                
                <div class="form-group">
                    <label for="year">Cost</label>
                    <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost') }}" />
                </div>
                <div>
                  <a href="{{ route('doctor.visits.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection

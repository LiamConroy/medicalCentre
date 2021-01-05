@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit Patients
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
         @foreach ($patients as $patient)
        <form method="POST" action="{{ route('admin.patients.update',  $patient->id) }}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
        @endforeach
                {{-- <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover" />
                </div> --}}

                {{-- <div class="form-group">
                    <label for="publisher">Duration</label>
                    <select name='publisher_id'>
                      @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ (old('publisher_id') == $publisher->id) ? "selected" : "" }}>{{ $publisher->name }}</option>
                      @endforeach
                    </select>
                </div> --}}
               <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="postal_address">Postal Address</label>
                    <input type="text" class="form-control" name="postal_address" id="postal_address" value="{{ old('postal_address') }}" />
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" />
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" />
                </div>

                <div class="form-group">
                    <label for="health_insurance">Do you have health insurance?</label>
                    <input type="text" class="form-control" name="health_insurance" id="health_insurance" value="{{ old('health_insurance') }}" />
                </div>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}" />
                </div>

                 <div class="form-group">
                    <label for="policy_num">Policy Number</label>
                    <input type="string" class="form-control" name="policy_num" id="policy_num" value="{{ old('policy_num') }}" />
                </div>
              </form>
              
           </div>
        </div>
      </div>
   </div>
</div>
@endsection

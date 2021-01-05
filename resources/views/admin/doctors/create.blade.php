@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Add new Doctor
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
        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" />
                </div>
                <div>
                  <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection

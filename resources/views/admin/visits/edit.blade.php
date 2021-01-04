@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit visit
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
         @foreach ($visits as $visit)
        <form method="POST" action="{{ route('admin.visits.update',  $visit->id) }}" >
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
                    <label for="date_of">Date</label>
                    <input type="date" class="form-control" name="date_of" id="date_of" value="{{ old('date_of'), $visit->date_of }}" />
                </div>
                <div class="form-group">
                    <label for="time_of">Time</label>
                    <input type="time" class="form-control" name="time_of" id="time_of" value="{{ old('time_of'), $visit->time_of }}" />
                </div>
                <div class="form-group">
                    <label for="time">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration'), $visit->duration }}" />
                </div>
                
                <div class="form-group">
                    <label for="year">Cost</label>
                    <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost'), $visit->cost }}" />
                </div>
                <div>
                  <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
              
           </div>
        </div>
      </div>
   </div>
</div>
@endsection

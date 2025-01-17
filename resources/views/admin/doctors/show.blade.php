@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Doctors Information
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Name</td>
                              <td>{{ $doctor->name }}</td>
                            </tr>
                            <tr>
                              <td>Postal Address</td>
                              <td>{{ $doctor->postal_address }}</td>
                            </tr>
                            <tr>
                              <td>Phone Number</td>
                              <td>{{  $doctor->phone_number }}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>{{  $doctor->email }}</td>
                            </tr>
                            <tr>
                              <td>Start Date</td>
                              <td>{{  $doctor->start_date }}</td>
                            </tr>
                        </tbody>
                      </table>

                      <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
                      <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>

                       <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                            </form>
                      
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

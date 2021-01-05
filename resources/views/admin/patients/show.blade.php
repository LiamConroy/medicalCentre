@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Patients Information
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Name</td>
                              <td>{{ $patient->name}}</td>
                            </tr>
                            <tr>
                              <td>Postal Address</td>
                              <td>{{ $patient->postal_address }}</td>
                            </tr>
                            <tr>
                              <td>Phone Number</td>
                              <td>{{  $patient->phone_number }}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>{{  $patient->email }}</td>
                            </tr>
                            <tr>
                              <td>Health Insurance (Y/N)</td>
                              <td>{{  $patient->health_insurance }}</td>
                            </tr>

                            <tr>
                              <td>Company Name</td>
                              <td>{{  $patient->company_name }}</td>
                            </tr>

                            <tr>
                              <td>Policy Number</td>
                              <td>{{  $patient->policy_num }}</td>
                            </tr>
                        </tbody>
                      </table>

                      <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
                      <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>

                       <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
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

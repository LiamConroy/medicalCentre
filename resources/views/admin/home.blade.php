@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                       <table>
                        <thread>
                            <th class = "ml-5"><a href = "{{route('admin.doctors.index')}}">Doctor</a></th>
                            <th class = "ml-5"><a href = "{{route('admin.patients.index')}}">Patients</th>
                            <th class = "ml-5"><a href = "{{route('admin.visits.index')}}">Visits</th>
                        </thread>
                       </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">

            <p id = "alert-message" class = "alert collapse"></p>

            <div class = "card">
                <div class = "card-header">
                Visits
                <a href="{{ route('admin.visits.create') }}" class ="btn btn-primary float-right">Add</a>
                </div>

                <div class = "card-body">
                @if (count($visits) === 0)
                    <p>There bruh no visits!</p>
                @else

                    <table id="table-visits" class = "table table-hover">
                        <thread>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Cost</th>
                        </thread>  
                        <tbody>
                        @foreach ($visits as $visit)
                            <tr data-id="{{$visit->id}}">
                            <td>{{$visit->doctor->user->name}}</td>
                            <td>{{$visit->patient->user->name}}</td>
                            <td>{{$visit->date_of}}</td>
                            <td>{{$visit->time_of}}</td>
                            <td>{{$visit->duration}}</td>
                            <td>{{$visit->cost}}</td>
                            <td>
                                <a href="{{ route('admin.visits.show', $visit->id) }}" class ="btn btn-primary">View</a>
                                <a href="{{ route('admin.visits.edit', $visit->id) }}" class ="btn btn-primary">Edit</a>
                                <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                @endforeach
                 </tbody>
                </table>
            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
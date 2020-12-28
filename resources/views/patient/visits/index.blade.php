@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">

            <p id = "alert-message" class = "alert collapse"></p>

            <div class = "card">
                <div class = "card-header">
                Visits
                </div>

                <div class = "card-body">
                @if (count($visits) === 0)
                    <p>There are no visits!</p>
                @else

                    <table id="table-books" class = "table table-hover">
                        <thread>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Cost</th>
                        </thread>  
                        <tbody>
                        @foreach ($visits as $visit)
                            <tr data-id="{{$visit->id}}">
                            <td>{{$visit->date}}</td>
                            <td>{{$visit->time}}</td>
                            <td>{{$visit->duration}}</td>
                            <td>{{$visit->cost}}</td>
                            <td>
                                <a href="{{ route('patient.visits.show', $visit->id) }}" class ="btn btn-primary">View</a>
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
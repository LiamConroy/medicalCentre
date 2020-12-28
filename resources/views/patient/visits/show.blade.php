@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Visit Information
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Date</td>
                              <td>{{ $visit->date_of }}</td>
                            </tr>
                            <tr>
                              <td>Time</td>
                              <td>{{ $visit->time_of }}</td>
                            </tr>
                            <tr>
                              <td>Duration</td>
                              <td>{{  $visit->duration }}</td>
                            </tr>
                            <tr>
                              <td>Cost</td>
                              <td>{{  $visit->cost }}</td>
                            </tr>
                        </tbody>
                      </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.default')

@section('content')
<div>
    @if(count($vehicles))
        <table border="1">
            <thead>
            <tr>

                <th>Make</th>
                <th>Model</th>
                <th>Year</th>

            </tr>
            </thead>
            <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->make}}</td>
                    <td>{{ $vehicle->model}}</td>
                    <td>{{ $vehicle->year}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        No Data Found
    @endif
</div>

<a href="{{route('vehicle.search')}}">Search Again</a>
@stop

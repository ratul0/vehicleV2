@extends('layouts.default')

@section('content')
<div>
    @if(count($vehicles))
        <table class="display table table-bordered table-striped" id="dataTable">
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
        <div class="pagination"> {{ $vehicles->links() }} </div>
    @else
        No Data Found
    @endif
</div>


<a class="btn btn-primary" href="{{route('vehicle.search')}}">Search Again</a>

@stop

@section('style')
    {{ HTML::style('assets/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
@stop

@section('script')

    {{ HTML::script('js/chosen_dropdown/chosen.jquery.min.js') }}
    {{ HTML::script('js/chosen_dropdown/chosen.proto.min.js') }}
    {{ HTML::script('assets/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}


    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#dataTable').dataTable({

            });



        });
    </script>



@stop

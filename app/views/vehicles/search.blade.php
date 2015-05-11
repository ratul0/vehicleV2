@extends('layouts.default')

@section('content')
    <h1>Search for Vehicle : </h1>

    {{ Form::open(['route' => 'vehicle.doSearch']) }}

    <div>
        {{Form::label('make','Make')}}
        {{ Form::select('make', $make, '', ['id' => 'make']) }}
    </div>

    <div>
        <label for="model">Model :</label>
        <select id="model" name="model">
            <option></option>
        </select>
    </div>

    <div>
        {{Form::label('year','Year')}}
        {{ Form::text('year', null) }}
    </div>

    <div>
        {{Form::label('zip','Zip Code')}}
        {{ Form::text('zip', null) }}
    </div>

    <div>
        {{ Form::submit('Search') }}
    </div>


    {{ Form::close() }}

@stop

@section('style')
    {{ HTML::style('css/chosen_dropdown/chosen.css') }}
@stop


@section('script')

    {{ HTML::script('js/chosen_dropdown/chosen.jquery.min.js') }}
    {{ HTML::script('js/chosen_dropdown/chosen.proto.min.js') }}



    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $("#make").chosen();

            $('#make').change(function(){
                var id = $(this).val();
                var data = 'id='+ id;
                console.log(data);
                $.ajax({
                    type:"GET",
                    data:data,
                    url:"{{URL::to('api/dropdown')}}",
                    success:function(data){
                        var model = $('#model');
                        model.empty();
                        //console.log(data);
                        console.log(data);
                        var test = $.parseJSON(data)
                        $.each(test, function(key, value) {
                            model.append($("<option/>", {
                                value: key,
                                text: value
                            }));
                        });
                    }
                });
            });
        });
    </script>



@stop
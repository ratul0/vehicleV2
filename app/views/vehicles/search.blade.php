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
            <option>Please choose car make first</option>
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
        {{ Form::submit('Submit') }}
    </div>


    {{ Form::close() }}

@stop


@section('script')

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
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
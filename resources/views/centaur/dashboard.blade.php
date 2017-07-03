@extends('centaur.app')

@section('title', 'Dashboard')
<style>
    .jumbotron>p{
        color: #333;
    }
</style>
@section('content')
<div class="row">
    @if (Sentinel::check() && Sentinel::inRole('administrator'))

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center text-muted">Admin  Dashboard!</h1>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <!-- HTML -->
                <div id="departmentdiv" style="height: 400px;width:100%;"></div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <!-- HTML -->
                <div id="chartdiv" style="height: 400px;width: 100%;"></div>
            </div>
        </div>
    @else
        <?php  $department_id = Sentinel::getUser()->department_id; ?>
       <div class="page-header">
         <h1 class="text-center text-muted">  The {{ \App\Department::find($department_id)->name }} Department </h1>
       </div>
    @endif

    <?php
        $user = Sentinel::findById(1);

        // var_dump(Activation::create($user));
    ?>
</div>
<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart( "chartdiv", {
        "type": "pie",
        "theme": "light",
        "dataProvider": [ {
            "country": "Available Resources",
            "value": "{{ $available_assets }}"
        }, {
            "country": "Booked Resources",
            "value": "{{ $booked_assets }}"
        }, ],
        "valueField": "value",
        "titleField": "country",
        "outlineAlpha": 0.4,
        "depth3D": 15,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 30,

    } );
</script>

<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("departmentdiv", {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": [
            @foreach(DB::table('departments')->get() as $department)
            {
            "country": "{{ $department->name }}",
            "visits": "{{ DB::table('asset_user')->where('department_id',$department->id)->count() }}",
            "color": "#FF0F00"
        },
        @endforeach
        ],
        "valueAxes": [{
            "position": "left",
            "title": "Frequency"
        }],
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 1,
            "lineAlpha": 0.1,
            "type": "column",
            "valueField": "visits"
        }],
        "depth3D": 20,
        "angle": 30,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45
        },


    });
</script>



@stop
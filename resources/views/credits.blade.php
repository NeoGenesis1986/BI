@extends('main_layout')
@section('title') Crédit @endsection
@section('scripts')
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <canvas id="myChart" style="height: 400px;"></canvas>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h4>Légende</h4>
        <div id="legendDiv"></div>
    </div>
</div>
<script>
    var data = [{
           value: {{$credit->suivi00}},
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Suivis < 30"
        }, {
            value: {{$credit->suivi30}},
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Suivis > 30"
        }, {
            value: {{$credit->suivi60}},
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Suivis > 60"
        }, {
            value: {{$credit->suivi90}},
            color: "#00FF00",
            highlight: "#A1EFA1",
            label: "Suivis > 90"
        }
    ];
    var options = {
        //scaleOverride: true,
        //scaleSteps: 10,
        //scaleStepWidth: 1000000,
        //scaleStartValue: 0,
        legendTemplate : "<ul style=\"padding-left: 16px;\" class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><i class=\"fa fa-square-o\" style=\"background-color:<%=segments[i].fillColor%>; color:<%=segments[i].fillColor%>; margin-right: 8px;\"></i><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    };
    var ctx = document.getElementById("myChart").getContext("2d");
    var myNewChart = new Chart(ctx).Pie(data, options);
    document.getElementById('legendDiv').innerHTML = myNewChart.generateLegend();
</script>
@endsection
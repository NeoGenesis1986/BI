@extends('main_layout')
@section('title') Chiffre d'affaires @endsection
@section('scripts')
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
@endsection
@section('content')
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <canvas id="myChart" style="width:100%; height: 400px;"></canvas>
    </div>
    <div id="legendDiv" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    <script>
        var serie = <?php
                            $values = '[';
                            for($i = 1; $i<=12; $i++) {
                                $value = 0;
                                foreach($turnovers as $turnover) {
                                    if(date('n', strtotime($turnover->date)) == $i) {
                                        $value = $turnover->value;
                                        break;
                                    }
                                }
                                $values .= $value;
                                if($i < 12) {
                                    $values .= ', ';
                                }
                            }
                            $values .= ']';
                            echo $values;
                    ?>;
        var data = {
            labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            datasets: [{
                label: "Chiffre d'affaires",
                fillColor: "#7B66BF",
                strokeColor: "#7B66BF",
                highlightFill: "#B8AAE4",
                highlightStroke: "#B8AAE4",
                data: serie
            }]
        };
        var options = {
            scaleOverride : true,
            scaleSteps : 10,
            scaleStepWidth : 1000000,
            scaleStartValue : 0,
            responsive : true,
            legendTemplate: "<ul style=\"padding-left: 16px;\" class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><i class=\"fa fa-square-o\" style=\"background-color:<%=datasets[i].fillColor%>; color:<%=datasets[i].fillColor%>; margin-right: 8px;\"></i><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
        };
        var ctx = document.getElementById("myChart").getContext("2d");
        var myNewChart = new Chart(ctx).Bar(data, options);
        document.getElementById('legendDiv').innerHTML = myNewChart.generateLegend();
    </script>
@endsection
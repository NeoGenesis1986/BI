<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crédit</title>
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
</head>
<body>
<canvas id="myChart" style="width: 80%; height: 400px;"></canvas>
<script>
    var data = [
            {
                value: {{$credit->suivi00}},
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Suivis < 30"
            },
            {
                value: {{$credit->suivi30}},
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Suivis > 30"
            },
            {
                value: {{$credit->suivi60}},
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Suivis > 60"
            },
            {
                value: {{$credit->suivi90}},
                color: "#00FF00",
                highlight: "#00FFFF",
                label: "Suivis > 90"
            }
        ];
    var options = {
        //scaleOverride: true,
        //scaleSteps: 10,
        //scaleStepWidth: 1000000,
        //scaleStartValue: 0,
        responsive: true
    };
    var ctx = document.getElementById("myChart").getContext("2d");
    var myNewChart = new Chart(ctx).Pie(data, options);
</script>
</body>
</html>
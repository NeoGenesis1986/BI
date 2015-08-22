<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stock</title>
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
</head>
<body>
<canvas id="myChart" style="width: 80%; height: 400px;"></canvas>
<script>
    <?php
        $values = 'var serie = [';
        $dates = 'var labels = [';
        $nbElements = count($stocks);
        $i = 0;
        foreach($stocks as $stock) {
            $values .= $stock->value;
            $dates .= '"' . $stock->date . '"';
            $i++;
            if($i < $nbElements) {
                $values .= ', ';
                $dates .=', ';
            }
        }
        $values .= '];';
        $dates .= '];';
    ?>
    {!!$values!!}
    {!!$dates!!}
    var data = {
        labels: labels,
        datasets: [
            {
                label: "Stock",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: serie
            }
        ]
    };
    var options = {
        //scaleOverride : true,
        //scaleSteps : 10,
        //scaleStepWidth : 1000000,
        //scaleStartValue : 0,
        datasetFill: true,
        responsive : true
    };
    var ctx = document.getElementById("myChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(data, options);
</script>
</body>
</html>
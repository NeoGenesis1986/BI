<canvas id="stockChart" style="width: 100%; height: 80%; padding-left: 8px;"></canvas>
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
        datasets: [{
            label: "Stock",
            fillColor: "#8E8EBF",
            strokeColor: "#7676A0",
            pointColor: "#5D5D61)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#8E8E94",
            data: serie
        }]
    };
    var options = {
        //scaleOverride : true,
        //scaleSteps : 10,
        //scaleStepWidth : 1000000,
        //scaleStartValue : 0,
        datasetFill: true,
        responsive: true
    };
    var stockCtx = document.getElementById("stockChart").getContext("2d");
    var stockChart = new Chart(stockCtx).Line(data, options);
</script>
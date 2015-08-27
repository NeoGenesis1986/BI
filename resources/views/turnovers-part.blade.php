<canvas id="myChart" style="width: 100%; height: 88%;"></canvas>
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
            label: "My First dataset",
            fillColor: "rgba(40, 11, 133, 0.5)",
            strokeColor: "rgba(220, 220, 220, 0.8)",
            highlightFill: "rgba(220, 220, 220, 0.75)",
            highlightStroke: "rgba(50, 50, 50, 0.5)",
            data: serie
        }]
    };
    var options = {
        //scaleFontColor: "#FFFFFF",
        scaleOverride : true,
        scaleSteps : 10,
        scaleStepWidth : 1000000,
        scaleStartValue : 0,
        responsive : false
    };
    //Chart.default.global.scaleFontColor = "#FFFFFF";
    var ctx = document.getElementById("myChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(data, options);
</script>
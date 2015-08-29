<canvas id="turnoversChart" style="width: 100%; height: 88%;"></canvas>
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
        datasets: [
            {
                label: "My First dataset",
                fillColor: "#7B66BF",
                strokeColor: "#7B66BF",
                highlightFill: "#B8AAE4",
                highlightStroke: "#B8AAE4",
                data: serie
            }
        ]
    };
    var options = {
        scaleOverride : true,
        scaleSteps : 10,
        scaleStepWidth : 1000000,
        scaleStartValue : 0,
        responsive : true
    };
    var turnoversCtx = document.getElementById("turnoversChart").getContext("2d");
    var turnoversChart = new Chart(turnoversCtx).Bar(data, options);
</script>
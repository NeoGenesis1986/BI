<!DOCTYPE HTML>
<html>
    <head>
        <title>Chiffre d'affaires</title>
        <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
    </head>
    <body>
        <canvas id="myChart" style="width: 80%; height: 400px;"></canvas>
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
                labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: serie
                    }
                ]
            };
            var options = {
                scaleOverride : true,
                scaleSteps : 10,
                scaleStepWidth : 1000000,
                scaleStartValue : 0
            };
            var ctx = document.getElementById("myChart").getContext("2d");
            var myNewChart = new Chart(ctx).Bar(data, options);
        </script>
    </body>
</html>
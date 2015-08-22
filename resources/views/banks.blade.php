<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Banques</title>
    <script src="{{ URL::asset('js/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('js/justgage.min.js') }}"></script>
    <script src="{{ URL::asset('js/number_format.js') }}"></script>
</head>
<body>
@foreach($banks as $bank)
    <div id="myChart{{$bank->id}}" style="width: 80%; height: 300px; border: solid black 1px;"></div>
    <script>
        var g{{$bank->id}} = new JustGage({
            id: "myChart{{$bank->id}}",
            value: {{$bank->value / 1000.0}},
            min: 0,
            max: 3000,
            title: "{{$bank->name . " @ " . $bank->date}}",
            label: "K TND",
            relativeGaugeSize: true,
            donut: false,
            counter: true,
            customSectors: [
                {color : "red", lo : 0, hi : 1000},
                {color : "yellow", lo : 1000, hi : 2000},
                {color : "green", lo : 2000, hi : 3000}
            ],
            textRenderer: customValue
        });
        function customValue(val) {
            return number_format(val, 0, '.', ' ');
        }
    </script>
@endforeach
</body>
</html>
@extends('main_layout')
@section('title') Banques @endsection
@section('scripts')

@endsection
@section('content')
@foreach($banks as $bank)
    <div id="myChart{{$bank->id}}" style="width: 300px; height: 300px; display: inline-flex;"></div>
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
@endsection
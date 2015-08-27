<div id="myChart{{ $bank->id }}" style="width: 100%; height: 100%;"></div>
<script>
    var g{{ $bank->id }} = new JustGage({
        id: "myChart{{ $bank->id }}",
        value: {{ $bank->value / 1000.0 }},
        min: 0,
        max: 3000,
        title: "{{ $bank->date }}",
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
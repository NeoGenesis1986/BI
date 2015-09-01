@extends('main_layout')
@section('title') Tableau de bord @endsection
@section('scripts')
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('js/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('js/justgage.min.js') }}"></script>
    <script src="{{ URL::asset('js/number_format.js') }}"></script>
@endsection
@section('content')
    <h2><i class="fa fa-dashboard"></i> Tableau de bord</h2>
    <div class="container-fluid">
        @foreach($rows as $row)
            <div class="row dashboard-row" style="height: {{ $row->height }}px;">
                @foreach($row->items as $item)
                    <div class="col-xs-12 col-sm-12 col-md-{{ $item->nbColumns * 3 }} dashboard-column">
                        <div class="grey-panel pn" style="width: 100%; height: inherit;">
                            @if($item->name == 'Chiffre d\'affaires')
                                <div class="grey-header">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                                @include('turnovers-part', ['turnovers' => \App\Turnover::all()])
                            @elseif($item->name == 'Banque Zitouna')
                                <div class="grey-header">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                                @include('bank-part', ['bank' => \App\Bank::distinct()->where('name', 'Zitouna')->orderBy('date', 'desc')->groupBy('name')->first()])
                            @elseif($item->name == 'Banque AB')
                                <div class="grey-header">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                                @include('bank-part', ['bank' => \App\Bank::distinct()->where('name', 'AB')->orderBy('date', 'desc')->groupBy('name')->first()])
                            @elseif($item->name == 'Crédits')
                                <?php $credits = \App\Credit::orderBy('date', 'desc')->first(); ?>
                                <div class="grey-header">
                                    <h4>{{ $item->title }} = {{ number_format(($credits->suivi00 + $credits->suivi30 + $credits->suivi60 + $credits->suivi90) / 1000.0, 3, '.', ' ') }} K TND</h4>
                                </div>
                                @include('credits-part', ['credit' => $credits, 'size' => min(($row->height - 100), ($item->nbColumns * 150))])
                            @elseif($item->name == 'Stock')
                                <div class="grey-header">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                                @include('stocks-part', ['stocks' => \App\Stock::orderBy('date')->get()])
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
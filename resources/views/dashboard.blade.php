@extends('main_layout')
@section('title') Tableau de bords @endsection
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
            <div class="row" style="height: {{ $row->height }}px;">
                @foreach($row->items as $item)
                    <?php
                        if($item->nbColumns == 1) { $xs = 12; $sm = 12; $md = 3; }
                        else if($item->nbColumns == 2) { $xs = 12; $sm = 12; $md = 6; }
                        else { $xs = 12; $sm = 12; $ms = 12; }
                    ?>
                    <div class="col-xs-{{ $xs }} col-sm-{{ $sm }} col-md-{{ $md }} dashboard-column">
                        <div class="grey-panel pn" style="width: 100%; height: inherit;">
                            <div class="grey-header">
                                <h4>{{ $item->title }}</h4>
                            </div>
                            @if($item->name == 'Chiffre d\'affaires')
                                @include('turnovers-part', ['turnovers' => \App\Turnover::all()])
                            @elseif($item->name == 'Banque Zitouna')
                                @include('bank-zitouna-part', ['bank' => \App\Bank::distinct()->where('name', 'Zitouna')->orderBy('date', 'desc')->groupBy('name')->first()])
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
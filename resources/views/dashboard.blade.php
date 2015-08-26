@extends('main_layout')
@section('title') Tableau de bords @endsection
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
                            @if($item->nbColumns == 2)
                                @include('turnovers-part', ['turnovers' => \App\Turnover::all(), 'width' => (300 * $item->nbColumns), 'height' => $row->height])
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function() {
        $rows = [];
        $row = new App\Classes\Row();
        $row->height = 400;
        $items = [];

        $item1 = new App\Classes\Item();
        $item1->title = 'Solde Banque Zitouna' ;
        $item1->name = 'Banque Zitouna';
        $item1->nbColumns = 1;

        $item2 = new App\Classes\Item();
        $item2->title = 'Chiffre d\'affaires';
        $item2->nbColumns = 2;
        $item2->name = 'Chiffre d\'affaires';

        $item3 = new App\Classes\Item();
        $item3->title = 'Item3';
        $item3->nbColumns = 1;

        $items[] = $item1;
        $items[] = $item2;
        $items[] = $item3;

        $row->items = $items;
        $rows[] = $row;

       return view('dashboard', ['rows' => $rows]);
    });

    Route::get('/banks/jsonIndex', 'BanksController@jsonIndex');

    Route::controllers([
        'turnovers' => 'TurnoversController',
        'banks' => 'BanksController',
        'credits' => 'CreditsController',
        'stocks' => 'StocksController'
    ]);

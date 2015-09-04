<?php

namespace App\Http\Controllers;

use App\Classes\Item;
use App\Classes\Row;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        $rows = [];
        $row1 = new Row();
        $row1->height = 400;
        $items = [];

        $item1 = new Item();
        $item1->title = 'Solde Banque Zitouna' ;
        $item1->name = 'Banque Zitouna';
        $item1->nbColumns = 1;

        $item2 = new Item();
        $item2->title = 'Chiffre d\'affaires';
        $item2->nbColumns = 2;
        $item2->name = 'Chiffre d\'affaires';

        $item3 = new Item();
        $item3->title = 'Solde Banque AB';
        $item3->name = 'Banque AB';
        $item3->nbColumns = 1;

        $items[] = $item1;
        $items[] = $item2;
        $items[] = $item3;

        $row1->items = $items;


        $row2 = new Row();
        $row2->height = 300;
        $items2 = [];

        $item4 = new Item();
        $item4->title = 'Crédit en jours' ;
        $item4->name = 'Crédits';
        $item4->nbColumns = 2;

        $items2[] = $item4;

        $item5 = new Item();
        $item5->title = 'Stock' ;
        $item5->name = 'Stock';
        $item5->nbColumns = 2;

        $items2[] = $item5;

        $row2->items = $items2;

        $rows[] = $row1;
        $rows[] = $row2;

        return view('dashboard', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
}

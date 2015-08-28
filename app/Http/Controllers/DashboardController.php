<?php

namespace App\Http\Controllers;

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
        $row = new \App\Classes\Row();
        $row->height = 400;
        $items = [];

        $item1 = new \App\Classes\Item();
        $item1->title = 'Solde Banque Zitouna' ;
        $item1->name = 'Banque Zitouna';
        $item1->nbColumns = 1;

        $item2 = new \App\Classes\Item();
        $item2->title = 'Chiffre d\'affaires';
        $item2->nbColumns = 2;
        $item2->name = 'Chiffre d\'affaires';

        $item3 = new \App\Classes\Item();
        $item3->title = 'Item3';
        $item3->nbColumns = 1;

        $items[] = $item1;
        $items[] = $item2;
        $items[] = $item3;

        $row->items = $items;
        $rows[] = $row;

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

<?php

namespace App\Http\Controllers;

use App\Credit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        return view('credits', ['credit' => Credit::orderBy('date', 'desc')->first()]);
    }

    public function jsonIndex() {
        return response()->json(Credit::orderBy('date', 'desc')->select(['id', 'date', 'suivi00', 'suivi30', 'suivi60', 'suivi90'])->first());
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

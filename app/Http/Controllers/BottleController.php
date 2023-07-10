<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Http\Controllers\Controller;
use App\Models\BottleConsumed;
use App\Models\BottleInCellar;
use App\Models\Cellar;
use Illuminate\Http\Request;

class BottleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all bottles
        $bottles = Bottle::all();
        return view('bottle.index');
        // return response()->json(['success' => true, 'data' => $bottles])->header('Content-Type', 'application/json');
    }
///////////////////////////////////////////////////////////////////////////////
    /**
     * Autocomplete bottle based on name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autocompleteBottle(Request $request)
    {
        // Get the name and number of results from the request
        $nom = $request->input('nom');
        $nb_resultat = $request->input('nb_resultat', 10);

        // Search for bottles with matching names
        $rows = Bottle::where('name', 'like', '%' . $nom . '%')
            ->limit($nb_resultat)
            ->get(['id', 'name']);

        return response()->json($rows);
    }
/////////////////////////////////////////////////////////////////////////
    /**
     * Add a new bottle to the cellar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouterNouvelleBottleCellier(Request $request)
    {
        // Get the bottle ID and cellar ID from the request
        $bottleId = $request->input('bottle_id');
        $cellarId = $request->input('cellar_id');

        // Check if the cellar and bottle exist
        $cellar = Cellar::findOrFail($cellarId);
        $bottle = Bottle::findOrFail($bottleId);

        // Add the existing bottle to the cellar
        $bottleInCellar = new BottleInCellar([
            'bottle_id' => $bottleId,
            'cellar_id' => $cellarId,
            'quantity' => 1
        ]);
        $result = $bottleInCellar->save();

        return response()->json($result);
    }
///////////////////////////////////////////////////////////////////////
    /**
     * Consume a bottle from the cellar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function boireBottleCellier(Request $request)
    {
        // Get the bottle ID, cellar ID, consumption date, and note from the request
        $bottleId = $request->input('bottle_id');
        $cellarId = $request->input('cellar_id');
        $consumptionDate = $request->input('consumption_date');
        $note = $request->input('note');

        // Add consumed bottle information to the BottleConsumed table
        $bottleConsumed = new BottleConsumed([
            'bottle_id' => $bottleId,
            'cellar_id' => $cellarId,
            'consumption_date' => $consumptionDate,
            'note' => $note
        ]);

        $bottleConsumed->save();

        // Decrease the quantity of bottles in the BottleInCellar table
        $bottleCellier = BottleInCellar::where('bottle_id', $bottleId)
            ->where('cellar_id', $cellarId)
            ->first();

        if ($bottleCellier) {
            $bottleCellier->quantity = $bottleCellier->quantity - 1;
            $bottleCellier->save();
        }

        return response()->json(['success' => true, 'message' => 'Bottle consumed and quantity updated']);
    }
////////////////////////////////////////////////////////////////////////////
    /**
     * Add or update the quantity of a bottle in the cellar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouterBottleCellier(Request $request)
    {
        // Get the bottle ID, cellar ID, and new quantity from the request
        $bottleId = $request->input('bottle_id');
        $cellarId = $request->input('cellar_id');
        $newQuantity = $request->input('new_quantity');

        // Search for the existence of BottleInCellar
        $bottleInCellar = BottleInCellar::where('bottle_id', $bottleId)
            ->where('cellar_id', $cellarId)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->quantity = $newQuantity;
            $bottleInCellar->save();

            return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Bottle not found in the cellar']);
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bottle  $cellar
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottle)
    {
        return view('bottle.show', ['bottle' => $bottle]);
    }
}


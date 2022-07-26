<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charge = Charge::all()->sortBy(['created_at', 'ASC']);
        return view('charge.index', ['data' => $charge]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('charge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Charge::create($request->all());
        $charge = new Charge();
        $charge->operation = $request->operation;
        $charge->date = date('Y-m-d H:i:s', strtotime($request->date));
        $charge->montant = $request->montant;
        $charge->save();
        return redirect('charge');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Charge $charge)
    {
        $charge = Charge::find($request->id);
        return view('charge.update', compact('charge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charge $charge)
    {
        $charge = Charge::find($request->id);
        $charge->operation = $request->operation;
        $charge->date = date('Y-m-d H:i:s', strtotime($request->date));
        $charge->montant = $request->montant;
        $charge->save();
        return redirect('charge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Charge $charge)
    {
        foreach($request->ids as $id) {
            Charge::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

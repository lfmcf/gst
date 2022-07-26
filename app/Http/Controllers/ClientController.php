<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all()->sortBy(['created_at', 'ASC']);
        return view('clients.index', ['data' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id, client $client)
    {
        $client = client::findorFail($id);
        return view('clients.update', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        $client = client::findorFail($request->id);
        $client->name = $request->name;
        $client->lastName = $request->lastName;
        $client->tel = $request->tel;
        $client->activite = $request->activite;
        $client->adresse = $request->adresse;
        $client->localisation = $request->localisation;
        $client->save();
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, client $client)
    {
        foreach($request->ids as $id) {
            client::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

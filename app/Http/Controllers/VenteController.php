<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\ExternProduct;
use App\Models\InternProduct;
use App\Models\Seller;
use App\Models\Vente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vente::all()->sortBy(['created_at', 'DESC']);
        
        return view('vente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exproduit = collect(ExternProduct::all());
        $enproduit = collect(InternProduct::all());
        $produit = $exproduit->merge($enproduit);
        // dd($exproduit);
        $clinet = client::all();
        $vendeur = Seller::all();
        return view('vente.create', ['produit' => $produit, 'client' => $clinet, 'vendeur' => $vendeur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $vent = new Vente();
        $vent->bon = $request->bon;
        $vent->date = date('Y-m-d H:i:s', strtotime($request->date));
        $vent->vendeur = $request->vendeur;
        $vent->client = $request->client;
       
        $arr = array('name' => array(), 'quantite' => array(), 'prix_u' => array(), 'somme' => array());
        $pr = $request->produit;
        
        for($i = 0;$i < count($pr); $i++){
            $arr['name'][$i] = $request->produit[$i];
            $arr['quantite'][$i] = $request->quantite[$i];
            $arr['prix_u'][$i] = $request->prix[$i];
            $arr['somme'][$i] = $request->somme[$i];
        }
        // dd($arr);
        // $vent->produit = json_encode($arr);
        $vent->produit = $arr;
        $vent->payment = $request->payment;
        $arr2 = array('montant' => array(), 'date' => array());
        $arr2['montant'][0] = $request->avance;
        $arr2['date'][0] = Carbon::now();
        $vent->avance = $arr2;
        $vent->reste = $request->reste;
        $vent->numerotc = $request->numerotc;
        $vent->datetc = date('Y-m-d H:i:s', strtotime($request->datetc));
        $vent->observation = $request->observation;
        $vent->save();

        for($i = 0;$i < count($pr); $i++){
            $nom = explode(",", $request->produit[$i]);
            //dd(isset($nom[1]));
            if(isset($nom[1])) {
                $produit = InternProduct::where('productName',$nom[0])->first();
                if($request->quantite[$i] > $produit->quantite) {
                    return response()->json(['produit' => $nom[0]], 400);
                }
                $produit->quantite = $produit->quantite - $request->quantite[$i];
                $produit->save();
            }else {
                $produit = ExternProduct::where('productName', $nom[0])->first();
                if($request->quantite[$i] > $produit->quantite) {
                    return response()->json(['produit' => $nom[0]], 400);
                }
                $produit->quantite = $produit->quantite - $request->quantite[$i];
                $produit->save();
            }
            
        }
        return redirect('vente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Vente $vente)
    {
        $vente = Vente::find($request->id);
        $exproduit = collect(ExternProduct::all());
        $enproduit = collect(InternProduct::all());
        $produit = $exproduit->merge($enproduit);
        // dd($exproduit);
        $clinet = client::all();
        $vendeur = Seller::all();
        // dd(gettype($vente->produit));
        return view('vente.update', ['produit' => $produit, 'client' => $clinet, 'vendeur' => $vendeur, 'vente' => $vente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->ids as $id) {
            Vente::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function getavance(Request $request) {
        
        $vent = Vente::find($request->id);
        $vent['avance'] = json_decode($vent['avance'], true);
        return view('vente.avance', compact('vent'));
    }

    public function updateAvance(Request $request) {
        $vent = Vente::find($request->id);
        $avance = json_decode($vent->avance, true);
        array_push($avance['date'], $request->date);
        array_push($avance['montant'], $request->montant);
        $vent->avance = json_encode($avance);
        $vent->save();
        return redirect('vente');
    }
}

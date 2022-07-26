<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\client;
use App\Models\Dashboard;
use App\Models\ExternProduct;
use App\Models\InternProduct;
use App\Models\Vente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        $cntpex = ExternProduct::count();
        $cntpin = InternProduct::count();
        $clits = client::count();
        $vnts = Vente::count();

        $echeance = Vente::where('payment', 'Traite')
                ->orWhere(function($query){
                    $query->where('payment', 'Chèque');
                })
                ->where('reste', '>', '0')
                ->get()
                ->sortBy(['created_at', 'DESC']);

        $clt = Vente::where("reste", '>', 0)->get();

        $caise = Vente::all();
        $charge = Charge::all();

        $total = 0;
        foreach ($caise as $cs) {
            foreach($cs->avance['montant'] as $av) {
                $total = $total + intval($av); 
            }
        }

        foreach($charge as $ch) {
            $total = $total - $ch->montant;
        }

        $from = date('Y-m-01');
        $to = date('Y-m-t');
        $situation = $this->getSituation($from, $to);
        
        return view('dashboard', compact('echeance', 'cntpex', 'cntpin', 'clits', 'vnts', 'clt', 'total', 'situation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }

    public function situation(Request $request) {
        // dd(gettype($request->from));
       $situation = $this->getSituation(date("y-m-d", strtotime($request->from)), date("y-m-d", strtotime($request->to)));
       return response()->json($situation);
    }

    public function getSituation($from, $to) 
    {
        $situation = Vente::whereBetween('created_at', [$from, $to])
        ->get()->groupBy('produit.name');
        return $situation;
    }
}

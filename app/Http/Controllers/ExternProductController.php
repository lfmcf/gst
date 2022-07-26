<?php

namespace App\Http\Controllers;

use App\Models\ExternProduct;
use Illuminate\Http\Request;

class ExternProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ExternProduct::all()->sortBy(['created_at', 'ASC']);
        return view('exproduct.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('exproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ExternProduct::create($request->all());
        return redirect('exproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternProduct  $externProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ExternProduct $externProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternProduct  $externProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ExternProduct $externProduct, Request $request)
    {
        $exProduct = ExternProduct::find($request->id);
        return view('exproduct.update', compact('exProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternProduct  $externProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $exProduct = ExternProduct::find($request->id);
        $exProduct->productName = $request->productName;
        $exProduct->reference = $request->reference;
        $exProduct->marque = $request->marque;
        $exProduct->usage = $request->usage;
        $exProduct->quantite = $request->quantite;
        $exProduct->price = $request->price;
        $exProduct->save();
        return redirect('exproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternProduct  $externProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->ids as $id) {
            ExternProduct::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

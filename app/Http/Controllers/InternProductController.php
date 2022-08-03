<?php

namespace App\Http\Controllers;

use App\Models\InternProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InternProduct::all()->sortBy(['created_at', 'ASC']);
        return view('inproduct.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InternProduct::create($request->all());
        return redirect('inproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternProduct  $internProduct
     * @return \Illuminate\Http\Response
     */
    public function show(InternProduct $internProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternProduct  $internProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InternProduct $internProduct)
    {
        $internProduct = InternProduct::find($request->id);
        return view('inproduct.update', compact('internProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternProduct  $internProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternProduct $internProduct)
    {
        $internProduct = InternProduct::find($request->id);
        $internProduct->productName = $request->productName;
        $internProduct->reference = $request->reference;
        $internProduct->volume = $request->volume;
        $internProduct->price = $request->price;
        $internProduct->quantite = $request->quantite;
        
        $internProduct->save();
        return redirect('inproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternProduct  $internProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InternProduct $internProduct)
    {
        foreach($request->ids as $id) {
            InternProduct::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

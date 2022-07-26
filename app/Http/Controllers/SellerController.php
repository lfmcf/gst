<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::all()->sortBy(['created_at', 'ASC']);
        return view('seller.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Seller::create($request->all());
        return redirect('vendeur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Seller $seller)
    {
        $seller = Seller::find($request->id);
        return view('seller.update', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $seller = Seller::find($request->id);
        $seller->name = $request->name;
        $seller->lastName = $request->lastName;
        $seller->sector = $request->sector;
        $seller->tel = $request->tel;
        $seller->save();
        return redirect('vendeur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Seller $seller)
    {
        foreach($request->ids as $id) {
            Seller::find($id)->delete($id);
        }
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

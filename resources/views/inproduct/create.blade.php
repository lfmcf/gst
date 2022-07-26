@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Ajouter produit interne</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">ajouter produit interne</h4> -->
                <form action="{!! route('storeinproduct') !!}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="prductName" class="form-label">Nom produit</label>
                                <input type="text" class="form-control" name="productName" id="productName" placeholder="nom produit">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="reference" class="form-label">Réference</label>
                                <input type="text" class="form-control" name="reference" id="reference" placeholder="réference">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="volume" class="form-label">Volume</label>
                                <input type="text" class="form-control" name="volume" id="volume" placeholder="volume">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="price" class="form-label">Prix</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="prix">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Quantité">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
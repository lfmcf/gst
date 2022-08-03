@extends('layouts.master')

@section('title', 'Page Title')



@section('content')

<div class="row">
    <div class="col-12">
        <h4 class="page-title">Ajouter produit externe</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Ajouter produit externe</h4> -->
                <form action="{!! route('storeexproduct') !!}" method="POST">
                    @csrf
                    <input style="display: none;" name="created_by" value="{{Auth::user()->id}}" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="productName" class="form-label">Nom produit</label>
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
                                <label for="marque" class="form-label">Marque</label>
                                <input type="text" class="form-control" name="marque" id="marque" placeholder="marque">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="usage" class="form-label">Usage</label>
                                <input type="text" class="form-control" name="usage" id="usage" placeholder="usage">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Quantité">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="text" class="form-control" name="price" id="prix" placeholder="prix">
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
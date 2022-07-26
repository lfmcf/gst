@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Modifier produit externe</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Modifier produit externe</h4> -->
                <form action="{!! route('updateexproduct') !!}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="id" value="{{$exProduct->id}}" style="display:none">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="productName" class="form-label">Nom produit</label>
                                <input type="text" class="form-control" name="productName" id="productName" value="{{$exProduct->productName}}" placeholder="nom produit">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="reference" class="form-label">Réference</label>
                                <input type="text" class="form-control" name="reference" id="reference" value="{{$exProduct->reference}}" placeholder="réference">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="marque" class="form-label">Marque</label>
                                <input type="text" class="form-control" name="marque" id="marque" value="{{$exProduct->marque}}" placeholder="marque">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="usage" class="form-label">Usage</label>
                                <input type="text" class="form-control" name="usage" id="usage" value="{{$exProduct->usage}}" placeholder="usage">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="text" class="form-control" name="quantite" id="quantite" value="{{$exProduct->quantite}}" placeholder="Quantité">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="text" class="form-control" name="price" id="prix" value="{{$exProduct->price}}" placeholder="prix">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Modifier vente</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Modifier vente</h4> -->
                <form action="{!! route('storevente') !!}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$vente->id}}" style="display:none;" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="bon" class="form-label">Bon n°</label>
                                <input type="text" class="form-control" name="bon" id="bon" placeholder="Bon n°" value="{{$vente->bon}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control datepicker" name="date" id="date">
                            </div>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="vendeur" class="form-label">Vendeur</label>
                                <select name="vendeur" id="vendeur" class="form-control js-example-basic-single" value="{{$vente->vendeur}}">
                                    <option selected disabled>Selectionnr vendeur</option>
                                </select>
                                <!-- <input type="text" class="form-control" name="sector" id="sector" placeholder="Vendeur"> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="client" class="form-label">Client</label>
                                <!-- <input type="text" class="form-control" name="sector" id="sector" placeholder="secteur"> -->
                                <select class="form-control js-example-basic-single" name="client" id="client" value="{{$vente->client}}">
                                    <option selected disabled>Selectionnr client</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: end;">
                        <button type="button" class="btn btn-primary btn-sm mb-3" onclick="addpr" id="addpr">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                    <!-- <span id="writeroot"></span> -->
                    <div id="readroot">
                      <?php $pr = $vente->produit; for($i = 0; $i < count($pr['name']);  $i++) { ?> 
                        <fieldset class="border p-2 mb-4" id="root">
                            <legend class="w-auto" id="leg"></legend>
                            <div id="rm" style="<?php echo $i>0 ? "display:flex;" : "display:none;" ?> justify-content:end">
                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode)">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="row prfi">
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="produit" class="form-label">Produit</label>
                                        <select class="form-control js-example-basic-single" name="produit[]" id="produit" value="{{$pr['name'][$i]}}">
                                            <option disabled>Selectionnr produit</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="quantite" class="form-label">Quantité</label>
                                        <input type="text" class="form-control quantite" name="quantite[]" id="quantite" placeholder="Quantité" value="{{$pr['quantite'][$i]}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="prix" class="form-label">Prix unitaire</label>
                                        <input type="text" class="form-control" name="prix[]" id="prix" placeholder="Prix unitaire" value="{{$pr['prix_u'][$i]}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="somme" class="form-label">Somme</label>
                                        <input type="text" class="form-control" name="somme[]" id="somme" placeholder="Somme" value="{{$pr['somme'][$i]}}">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="payment" class="form-label">Payment</label>
                                <select class="form-control js-example-basic-single" name="payment" id="payment" >
                                    <option disabled value="">Selectionner payement</option>
                                    <option <?php $vente->payment == "Traite" ? 'selected' : '' ?>   value="Traite">Traite</option>
                                    <option <?php $vente->payment == "Chèque" ? 'selected' : '' ?> value="Chèque">Chèque</option>
                                    <option <?php $vente->payment == "Crédit" ? 'selected' : '' ?> value="Crédit">Crédit</option>
                                    <option <?php $vente->payment == "Espèce" ? 'selected' : '' ?> value="Espèce">Espèce</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="reste" class="form-label">Reste</label>
                                <input type="text" class="form-control" name="reste" id="reste" placeholder="Reste" value="{{$vente->reste}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="observation" class="form-label">Observation</label>
                                <textarea type="text" class="form-control" name="observation" id="observation" value="{{$vente->observation}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.datepicker').datepicker({format: 'dd/mm/yyyy'})
        $('.datepicker').datepicker('setDate', new Date("{{$vente->date}}"));
    });

    var prodoptions = $("#produit");
    var clioptions = $("#client");
    var vendoptions = $("#vendeur");

    var produit = '{!! json_encode($produit) !!}';
    var client = '{!! json_encode($client) !!}';
    var vendeur = '{!! json_encode($vendeur) !!}';
    var vent = '{!! json_encode($vente->produit) !!}';


    produit = JSON.parse(produit);
    client = JSON.parse(client);
    vendeur = JSON.parse(vendeur);
    vent = JSON.parse(vent);
    console.log(vent.name);
    
    



    $.each(produit, function() {
        if (this.volume) {
            prodoptions.append(new Option(this.productName + ' , ' + this.volume, this.productName + ' , ' + this.volume));
        } else {
            prodoptions.append(new Option(this.productName, this.productName));
        }
    });

    $.each(client, function() {
        this.name == '{{$vente->client}}' ? 
        clioptions.append(new Option(this.name + ' ' + this.lastName, this.name + ' ' + this.lastName, true, true))
        : clioptions.append(new Option(this.name + ' ' + this.lastName, this.name + ' ' + this.lastName, false));
    });

    $.each(vendeur, function() {
        this.name == '{{$vente->vendeur}}' ?
        vendoptions.append(new Option(this.name, this.name, true, true)) :
        vendoptions.append(new Option(this.name, this.name, false));
    });

    var counter = 0;

    function moreFields() {
        counter++;
        var newFields = $('#root').last().clone();
        newFields.id = '';
        newFields.find("input").val("").end();
        newFields.find("select").val("").end();
        $(newFields).insertAfter('#root').last();

        if (counter > 0) {
            newFields.children().attr('id', 'rm').css('display', 'flex')
        }

    }

    $("#addpr").on('click', function() {
        moreFields();
    });

    $('#readroot').on('input', '#quantite', function(e) {

        var prix = $(this).parent().parent().parent().find('#prix').val();
        if (prix) {
            $(this).parent().parent().parent().find('#somme').val(prix * e.target.value)
        }

    });

    $('#readroot').on('input', '#prix', function(e) {

        var quantite = $(this).parent().parent().parent().find('#quantite').val();
        // console.log($(this).parent().parent().parent().find('#quantite').val())
        // console.log(quantite)
        if (quantite) {
            $(this).parent().parent().parent().find('#somme').val(quantite * e.target.value)
        }

    });
</script>

@stop
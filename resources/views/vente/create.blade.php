@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Formulaire de vente</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Formulaire de vente</h4> -->
                <form id="theForm" action="{!! route('storevente') !!}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="bon" class="form-label">Bon n°</label>
                                <input type="text" class="form-control" name="bon" id="bon" placeholder="Bon n°">
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
                                <select name="vendeur" id="vendeur" class="form-control js-example-basic-single">
                                    <option selected disabled>Selectionnr vendeur</option>
                                </select>
                                <!-- <input type="text" class="form-control" name="sector" id="sector" placeholder="Vendeur"> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="client" class="form-label">Client</label>
                                <!-- <input type="text" class="form-control" name="sector" id="sector" placeholder="secteur"> -->
                                <select class="form-control js-example-basic-single" name="client" id="client">
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
                        <fieldset class="border p-2 mb-4" id="root">
                            <legend class="w-auto" id="leg"></legend>
                            <div id="rm" style="display: none; justify-content: end">
                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode)">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="row prfi">
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="produit" class="form-label">Produit</label>
                                        <select class="form-control js-example-basic-single" name="produit[]" id="produit">
                                            <option selected disabled>Selectionnr produit</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="quantite" class="form-label">Quantité</label>
                                        <input type="text" class="form-control quantite" name="quantite[]" id="quantite" placeholder="Quantité">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="prix" class="form-label">Prix unitaire</label>
                                        <input type="text" class="form-control" name="prix[]" id="prix" placeholder="Prix unitaire">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="somme" class="form-label">Somme</label>
                                        <input type="text" class="form-control" name="somme[]" id="somme" placeholder="Somme">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- <fieldset class="border p-2 mb-4">
                        <legend class="w-auto"> Produit - 1</legend>
                        <div key={index}>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="prix" class="form-label">Prix unitaire</label>
                                        <input type="text" class="form-control" name="prix" id="prix" placeholder="Prix unitaire">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <label for="somme" class="form-label">Somme</label>
                                        <input type="text" class="form-control" name="somme" id="somme" placeholder="Somme">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset> -->

                    <div class="row">
                        <div>
                            <div class="mb-4 form-group row">
                                <label for="payment" class="col-sm-1 col-form-label">Total</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="total" placeholder="Total">
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="payment" class="form-label">Payment</label>
                                <select class="form-control form-control-md js-example-basic-single" name="payment" id="payment">
                                    <option>Selectionner payement</option>
                                    <option>Traite</option>
                                    <option>Chèque</option>
                                    <option>Crédit</option>
                                    <option>Espèce</option>
                                </select>
                                <!-- <input type="text" class="form-control" name="payment" id="payment" placeholder="Payment"> -->
                            </div>
                        </div>
                        <div class="col-4" style="display: none;">
                            <div class="mb-4">
                                <label for="numero" class="form-label">Numero</label>
                                <input type="text" class="form-control" name="numerotc" id="numero" placeholder="Numero">
                            </div>
                        </div>
                        <div class="col-4" style="display: none;">
                            <div class="mb-4">
                                <label for="datec" class="form-label">Date Payment</label>
                                <input type="text"  class="form-control datepicker" name="datetc" id="datec">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="avance" class="form-label">Avance</label>
                                <input type="text" class="form-control" name="avance" id="avance" placeholder="Avance">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="reste" class="form-label">Reste</label>
                                <input type="text" class="form-control" name="reste" id="reste" placeholder="Reste">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                       
                        
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="observation" class="form-label">Observation</label>
                                <textarea type="text" class="form-control" name="observation" id="observation"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="addvente" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({format: 'dd/mm/yyyy',});
        $('.js-example-basic-single').select2();
    });

    var prodoptions = $("#produit");
    var clioptions = $("#client");
    var vendoptions = $("#vendeur");

    var produit = '{!! json_encode($produit) !!}';
    var client = '{!! $client !!}';
    var vendeur = '{!! json_encode($vendeur) !!}';

    produit = JSON.parse(produit);
    client = JSON.parse(client);
    vendeur = JSON.parse(vendeur);

    $.each(produit, function() {

        if (this.volume) {
            prodoptions.append(new Option(this.productName + ' , ' + this.volume, this.productName + ' , ' + this.volume));
        } else {
            prodoptions.append(new Option(this.productName, this.productName));
        }

    });

    $.each(client, function() {
        clioptions.append(new Option(this.name + ' ' + this.lastName, this.name + ' ' + this.lastName));
    });

    $.each(vendeur, function() {
        vendoptions.append(new Option(this.name, this.name));
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

    $("#readroot").on('change', '#prix', function(e) {
        var val = 0;
        $('input[name^="somme"]').each(function() {
            val += parseInt($(this).val());
        });
        $('#total').val(val);
    });

    $('#avance').on('input', function(e) {
        var total = $('#total').val();
        $('#reste').val(total - parseInt(e.target.value))
    });

    $('#payment').on('change', function(e) {
        if(e.target.value == 'Traite' || e.target.value == 'Chèque') {
            $('#numero').parent().parent().css('display', 'block');
            $('#datec').parent().parent().css('display', 'block');
        }else {
            $('#numero').parent().parent().css('display', 'none');
            $('#datec').parent().parent().css('display', 'none');
        }
    })

    $("#theForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                window.location.href = "/vente"
            },
            error: function(data) {
                console.log(data)
            }
        });

    });

   
    
</script>

@stop
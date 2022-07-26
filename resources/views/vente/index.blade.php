@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Tableau des ventes</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            @csrf
            <div class="card-body">
                <div class="card-body-head mb-3">
                    <span></span>
                    <!-- <h4 class="header-title">Tableau des ventes</h4> -->
                    <button type="button" class="btn btn-primary" id="btnSubmit">Ajouter</button>
                </div>
                <div id="toolbar">
                    <button id="removeButton" class="btn btn-secondary">Supprimer</button>
                </div>
                <table id="table" data-search="true" data-pagination="true" data-toolbar="#toolbar" data-show-export="true" data-detail-view="true" data-detail-formatter="detailFormatter">
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btnSubmit").click(function() {
            window.location.href = "{{route('createVente')}}"
        });
    });

    var $table = $('#table');

    var data = '{!! $data !!}';

    function operateFormatter(value, row, index) {
        return [
            '<a class="update" id="#update" data-id=' + row.id + ' href="javascript:void(0)" title="Modifier">',
            '<i class="bi bi-pencil"></i>',
            '</a>  ',
            
            '<a class="add" href="javascript:void(0)" data-id=' + row.id + ' title="Ajouter avance">',
            '<i class="bi bi-plus-square-fill"></i>',
            '</a>'
        ].join('')
    }

    function avanceFormatter(value, row) {
        return value.montant.reduce((a, b) => parseInt(a) + parseInt(b), 0)
    }


    function initTable() {
        $table.bootstrapTable('destroy').bootstrapTable({
            // height: 550,

            data: JSON.parse(data),
            columns: [{
                    field: 'state',
                    checkbox: true,
                    align: 'center',
                    valign: 'middle',
                },
                {
                    title: 'Bon n°',
                    field: 'bon',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    //   footerFormatter: totalTextFormatter
                },
                {
                    title: 'Vendeur',
                    field: 'vendeur',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    //   footerFormatter: totalTextFormatter
                },
                {
                    title: 'Client',
                    field: 'client',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    //   footerFormatter: totalTextFormatter
                },
                {
                    title: 'Payment',
                    field: 'payment',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    //   footerFormatter: totalTextFormatter
                },
                {
                    title: 'Avance',
                    field: 'avance',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    formatter: 'avanceFormatter'
                }, 
                {
                    title: 'Reste',
                    field: 'reste',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    //   footerFormatter: totalTextFormatter
                },
                {
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    clickToSelect: false,
                    formatter: operateFormatter,
                    events: window.operateEvents,
                }
            ]
        })
    }

    initTable();

    $('.update').on('click', function(e) {
        var id = $(this).data("id");
        window.location.href = "/vente/update/" + id;
    });

    $('.add').on('click', function(e) {
        var id = $(this).data("id");
        window.location.href = "/avance/" + id;
    });

    var token = $('input[name="_token"]').attr('value');

    $('#removeButton').click(function() {
        var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
            return row.id
        });
        $table.bootstrapTable('remove', {
            field: 'id',
            values: ids
        });
        $.ajax({
            type: "post",
            url: "/deleteVente",
            data: {
                "ids": ids
            },
            headers: {
                "X-CSRF-Token": token
            }
        }).done(function(msg) {
            console.log(msg)
        });
    })

    function detailFormatter(index, row) {

        // var html = []
        var html = ["<table class='table'><thead><tr><th data-field='id'>Nom produit</th><th>Quantité</th><th>Prix</th><th>Somme</th></tr></thead><tbody>"]
        // console.log(Object.keys(row.produit).length)
        // console.log(row.produit.name)
        for (var i = 0; i < row.produit.name.length; i++) {

            var table = "<tr>";

            table += "<td>" + row.produit.name[i] + "</td>";
            table += "<td>" + row.produit.quantite[i] + "</td>";
            table += "<td>" + row.produit.prix_u[i] + "</td>";
            table += "<td>" + row.produit.somme[i] + "</td>";

            table += "</tr>";

            html.push(table)


        }

        html.push('</tbody></table>')
        return html.join('')
    }
</script>

@stop
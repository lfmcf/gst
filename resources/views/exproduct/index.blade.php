@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Tableau produits externes</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
        @csrf
            <div class="card-body">
                <div class="card-body-head mb-3">
                    <!-- <h4 class="header-title">Tableau produits externes</h4> -->
                    <span></span>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Ajouter</button>
                </div>
                <div id="toolbar">
                    <button id="removeButton" class="btn btn-secondary">Supprimer</button>
                </div>
                <table id="table" data-search="true" data-pagination="true" data-toolbar="#toolbar" data-show-export="true" data-detail-formatter="detailFormatter"></table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btnSubmit").click(function() {
            window.location.href = "{{route('createExProduct')}}"
        });
    });

    var $table = $('#table');
    var data = '{!! json_encode($data) !!}';

    function operateFormatter(value, row, index) {
        return [
            '<a class="update" id="update" data-id=' + row.id + ' href="javascript:void(0)" title="Like">',
            '<i class="bi bi-pencil"></i>',
            '</a>  ',
           
        ].join('')
    }

    function initTable() {
        $table.bootstrapTable('destroy').bootstrapTable({
            height: 400,
            data: JSON.parse(data),
            columns: [{
                field: 'state',
                checkbox: true,
                align: 'center',
                valign: 'middle',
            },
            {
                title: 'Nom produit',
                field: 'productName',
                align: 'center',
                valign: 'middle',
                sortable: true,
                //   footerFormatter: totalTextFormatter
            },{
                title: 'Réference',
                field: 'reference',
                align: 'center',
                valign: 'middle',
                sortable: true,
                //   footerFormatter: totalTextFormatter
            },{
                title: 'Marque',
                field: 'marque',
                align: 'center',
                valign: 'middle',
                sortable: true,
                //   footerFormatter: totalTextFormatter
            },{
                title: 'Usage',
                field: 'usage',
                align: 'center',
                valign: 'middle',
                sortable: true,
                //   footerFormatter: totalTextFormatter
            },
            {
                title: 'Quantité',
                field: 'quantite',
                align: 'center',
                valign: 'middle',
                sortable: true,
            },
            {
                title: 'Price',
                field: 'price',
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
            }]
        })
    }

    initTable();

    $('.update').on('click', function(e) {
        var id = $(this).data("id");
        window.location.href = "/exproduct/update/" + id;
    });

    var token =  $('input[name="_token"]').attr('value'); 

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
            url: "/deleteExproduct",
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

</script>
@stop
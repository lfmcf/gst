@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Dashboard</h4>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="border rounded dashtabs">
            <p>{{ $cntpin }} Produits interne</p>
        </div>
    </div>
    <div class="col-3">
        <div class="border rounded dashtabs">
            <p> {{ $cntpex }} Produits externe</p>
        </div>
    </div>
    <div class="col-3">
        <div class="border rounded dashtabs">
            <p>{{ $clits }} Clients</p>
        </div>
    </div>
    <div class="col-3">
        <div class="border rounded dashtabs">
            <p> {{ $vnts }} Ventes</p>
        </div>
    </div>
</div>
<div class="row mt-2 p-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Echeance</h5>
            <table id="table" data-search="true" data-pagination="true" data-toolbar="#toolbar" data-show-export="true" data-detail-formatter="detailFormatter">
            </table>
        </div>
    </div>
</div>
<div class="row mt-2 p-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crédit</h5>
            <table id="tablecli" data-search="true" data-pagination="true" data-toolbar="#toolbar" data-show-export="true" data-detail-formatter="detailFormatter">
            </table>
        </div>
    </div>
</div>
<div class="row mt-2 p-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Caise</h5>
            <div>
                <p>Total : {{ $total }} dh</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2 p-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Situation Mensuelle</h5>
            <div class="row">
                <div class="col-5">
                    <label>Du</label>
                    <input type="text" class="form-control datepickerfrom" name="from" id="datec">
                </div>
                <div class="col-5">
                    <label>Au</label>
                    <input type="text" class="form-control datepicker" name="to" id="datec">
                </div>
                <div class="col-2" style="margin-top: 23px ;">
                    <button class="btn btn-sm btn-primary" id="situation">
                        Chercher
                    </button>
                </div>
            </div>
            <table id="tablesm" data-search="true" data-pagination="true" data-toolbar="#toolbar" data-show-export="true" data-detail-formatter="detailFormatter">
            </table>
        </div>
    </div>
</div>

<script>
    function getFirstDayOfMonth(year, month) {
        return new Date(year, month, 1);
    }

    $(document).ready(function() {
        var date = new Date();

        const firstDayCurrentMonth = getFirstDayOfMonth(
            date.getFullYear(),
            date.getMonth(),
        );
        $('.datepickerfrom').datepicker("setDate", firstDayCurrentMonth);
        $('.datepicker').datepicker("setDate", date);

    });

    var $table = $('#table');
    var $tablecli = $('#tablecli');
    var $tablesm = $('#tablesm');

    var data = '{!! $echeance !!}';
    var datacli = '{!! $clt !!}';
    var datasi = '{!! $situation !!}'

    var res;
    res = JSON.parse(datasi);

    var siarr = [];
    for (const key in res) {

        var som = 0;
        res[key].forEach(item => {
            som += parseInt(item.produit.somme[0])
        });
        var prix = parseInt(res[key][0].produit.prix_u[0]);
        siarr.push({
            'name': key,
            'ventes': res[key].length,
            'somme': som,
            'prix': prix,
            'benifice': som - (prix * res[key].length)
        })
    }

    // function ajaxRequest(params) {
    //     var fr = $('.datepickerfrom').val();
    //     var to = $('.datepicker').val();
    //     var siarr = [];
    //     $.ajax({
    //         type: "POST",
    //         url: "getsituation",
    //         data: {
    //             'from': fr,
    //             'to': to,
    //             "_token": "{{ csrf_token() }}",
    //         },
    //         success: function(data) {
    //             res = data
    //             for (const key in res) {
    //                 var som = 0;
    //                 res[key].forEach(item => {
    //                     som += parseInt(item.produit.somme[0])
    //                 });
    //                 var prix = parseInt(res[key][0].produit.prix_u[0]);
    //                 siarr.push({
    //                     'name': key,
    //                     'ventes': res[key].length,
    //                     'somme': som,
    //                     'prix': prix,
    //                     'benifice': som - (prix * res[key].length)
    //                 })
    //             }
    //             tablesm.bootstrapTable('load', siarr);
    //         },
    //     })
    // }

    $('#situation').on('click', function() {
        var fr = $('.datepickerfrom').val();
        var to = $('.datepicker').val();
        var siarr = [];
        $.ajax({
            type: "POST",
            url: "getsituation",
            data: {
                'from': fr,
                'to': to,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                res = data
                for (const key in res) {
                    var som = 0;
                    res[key].forEach(item => {
                        som += parseInt(item.produit.somme[0])
                    });
                    var prix = parseInt(res[key][0].produit.prix_u[0]);
                    siarr.push({
                        'name': key,
                        'ventes': res[key].length,
                        'somme': som,
                        'prix': prix,
                        'benifice': som - (prix * res[key].length)
                    })
                }
                $('#tablesm').bootstrapTable('load', siarr);
            },
        })
    })



    function avanceFormatter(value, row) {
        return value.montant.reduce((a, b) => parseInt(a) + parseInt(b), 0)
    }

    function initTable() {
        $table.bootstrapTable({
            // height: 300,
            data: JSON.parse(data),
            columns: [{
                    field: 'state',
                    checkbox: true,
                    align: 'center',
                    valign: 'middle',
                },
                {
                    title: 'Client',
                    field: 'client',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Bon n°',
                    field: 'bon',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Payment',
                    field: 'payment',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Numero',
                    field: 'numerotc',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Date payment',
                    field: 'datetc',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    // formatter: 'avanceFormatter'
                },
                {
                    title: 'Reste',
                    field: 'reste',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
            ]
        });

        $tablecli.bootstrapTable({
            // height: 300,
            data: JSON.parse(datacli),
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
                },
                {
                    title: 'Client',
                    field: 'client',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Payment',
                    field: 'payment',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
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
                },
            ]
        });

        $tablesm.bootstrapTable({
            data: siarr,
            columns: [{
                    field: 'state',
                    checkbox: true,
                    align: 'center',
                    valign: 'middle',
                },
                // {
                //     title: 'Date',
                //     field: 'date',
                //     align: 'center',
                //     valign: 'middle',
                //     sortable: true,
                // },
                {
                    title: 'Produit',
                    field: 'name',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Total ventes',
                    field: 'ventes',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Somme ventes',
                    field: 'somme',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Prix d\'achat',
                    field: 'prix',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
                {
                    title: 'Bénifices',
                    field: 'benifice',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                },
            ]
        });
    }

    initTable();
</script>
@stop
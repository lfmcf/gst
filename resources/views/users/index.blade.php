@extends('layouts.master')

@section('title', 'Page Title')



@section('content')

<div class="row">
    <div class="col-12">
        <h4 class="page-title">Tableau des utilisateurs</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            @csrf
            <div class="card-body">
                <div class="card-body-head mb-3">
                    <!-- <h4 class="header-title">Tableau produits internes</h4> -->
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
            window.location.href = "{{route('createUser')}}"
        });
    });

    var $table = $('#table');
    var data = '{!! $users !!}';

    console.log(data);
    function initTable() {
        $table.bootstrapTable('destroy').bootstrapTable({
            data: JSON.parse(data),
            columns: [{
                field: 'state',
                checkbox: true,
                align: 'center',
                valign: 'middle',
            },
            {
                title: 'Nom',
                field: 'name',
                align: 'center',
                valign: 'middle',
                sortable: true,
            },
            {
                title: 'Email',
                field: 'email',
                align: 'center',
                valign: 'middle',
                sortable: true,
            },
            {
                title: 'Role',
                field: 'role',
                align: 'center',
                valign: 'middle',
                sortable: true,
            },
            ]
        })
    }

    initTable();

</script>

@stop
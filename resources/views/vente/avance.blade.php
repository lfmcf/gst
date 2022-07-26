@extends('layouts.master')

@section('title', 'Page Title')



@section('content')

<div class="row">
    <div class="col-12">
        <h4 class="page-title">Avance</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div>
            <h6> Bon N° : {{$vent->bon}}</h6>
            <h6> Payement : {{$vent->payment}}</h6>
            <h6> Reste : {{$vent->reste}} DH</h6>
        </div>

    </div>
    <div class="w-100 mt-1">
        <table class="table table-borderless avance" style="width: 40%;">
            <thead>
                <tr>
                    <th scope="col">Avance</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($vent->avance['montant']); $i++) { ?>
                    <tr>
                        <td>{{ $vent->avance['montant'][$i] }} DH</td>
                        <td>{{ date_format(new DateTime($vent->avance['date'][$i]), 'd - m - Y') }}</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-12 mt-1">
        <form method="POST" action="{!! route('addAvance') !!}">
            <h6>Ajoute une avance</h6>
            @csrf
            <input style="display: none;" name="id" value="{{$vent->id}}" />
            <div class="row">
                <div class="col-6">
                    <div class="mb-4">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" class="form-control" name="montant" placeholder="Montant" />
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control datepicker" name="date" id="date">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });
</script>

@stop
@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Modifier charge</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Modifier charge</h4> -->
                <form action="{!! route('updateCharge') !!}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$charge->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="operation" class="form-label">Opération</label>
                                <input type="text" class="form-control" name="operation" id="operation" placeholder="Opération" value="{{$charge->operation}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control datepicker" name="date" id="date">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="montant" class="form-label">Montant</label>
                                <input type="text" class="form-control" name="montant" id="montant" placeholder="Montant" value="{{$charge->montant}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
     $(document).ready(function() {
        
        $('.datepicker').datepicker(
            'setDate', new Date('{{$charge->date}}')
        );
    });
</script>

@stop
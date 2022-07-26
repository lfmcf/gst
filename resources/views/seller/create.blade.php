@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Ajouter vendeur</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Ajouter vendeur</h4> -->
                <form action="{!! route('storeseller') !!}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="nom">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="lastName" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="prenom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="sector" class="form-label">Secteur</label>
                                <input type="text" class="form-control" name="sector" id="sector" placeholder="secteur">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="tel" class="form-label">Tél</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="tel">
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
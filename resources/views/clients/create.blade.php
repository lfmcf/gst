@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Ajouter client</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title mb-5">Ajouter nouveau client</h4> -->
                <form  action="{!! route('storeClient') !!}" method="POST">
                    @csrf
                    <input style="display: none;" name="created_by" value="{{Auth::user()->id}}" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" id="nom" placeholder="nom">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="lastName" id="prenom" placeholder="prenom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="tel" class="form-label">Tél</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="télephone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="activite" class="form-label">Activité</label>
                                <input type="text" class="form-control" name="activite" id="activite" placeholder="Activité">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="adresse">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="local" class="form-label">Localisation</label>
                                <input type="text" class="form-control" name="localisation" id="local" placeholder="localisation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Entreprise </label>
                                </div>
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
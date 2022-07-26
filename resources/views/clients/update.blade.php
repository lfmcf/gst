@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Modifier client</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title mb-5">Modifier client</h4> -->
                <form  action="{!! route('updateClient') !!}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="id" value="{{$client->id}}" style="display:none">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" id="nom" placeholder="nom" value="{{$client->name}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="lastName" id="prenom" placeholder="prenom" value="{{$client->lastName}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="tel" class="form-label">Tél</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="télephone" value="{{$client->tel}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="activite" class="form-label">Activité</label>
                                <input type="text" class="form-control" name="activite" id="activite" placeholder="Activité" value="{{$client->activite}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="adresse" value="{{$client->adresse}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="local" class="form-label">Localisation</label>
                                <input type="text" class="form-control" name="localisation" id="local" placeholder="localisation" value="{{$client->localisation}}">
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
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="page-title">Modifier vendeur</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="header-title">Modifier vendeur</h4> -->
                <form action="{!! route('updateseller') !!}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$seller->id}}" style="display:none" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="nom" value="{{$seller->name}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="lastName" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="prenom" value="{{$seller->lastName}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="sector" class="form-label">Secteur</label>
                                <input type="text" class="form-control" name="sector" id="sector" placeholder="secteur" value="{{$seller->sector}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="tel" class="form-label">Tél</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="tel" value="{{$seller->tel}}">
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
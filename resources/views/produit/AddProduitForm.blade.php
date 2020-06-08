@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <div class="dropdown">
                    <h3>Formulaire d'Ajout</h3>
                    <hr>
                    @include('nav')
                    </div>
                    <form method="post" action="{{route('AddProduitAction')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <input type="text" class="form-control" name="libelle" placeholder="Libelle">
                                </div>
                                <div class="col">
                                    <select name="cat" class="form-control">
                                    @foreach($all as $p)
                                    <option value="{{$p->_id}}">{{$p->libelle}}</option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                <input type="text" class="form-control" name="pu" placeholder="Prix Unitaire">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="qte" placeholder="Quantité">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col-6">
                                   <input type="text" class="form-control" name="desc" placeholder="Description">
                                </div>
                                <div class="col-6">
                                   <input type="file" class="form-control" name="image" placeholder="">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                                <div class="col">
                                   <input type="reset" class="btn btn-danger" value="Annuler" />
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

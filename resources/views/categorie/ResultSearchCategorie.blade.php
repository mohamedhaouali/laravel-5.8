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
                    <h3>Resultat de Recherche:</h3>
                    <hr>
                    @include('nav')
                    <?php $i = 1; $message= "vide";?>
                    @if (!$categorie->isEmpty())
                    @foreach($categorie as $categorie)
                    <h5 style="margin-top:2%;"> Categorie Numéro {{$i}} </h5>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <input type="text" class="form-control" name="nom" value="{{$categorie->libelle}}">
                                </div>
                        </div>
                        
                        
                       
                    
                </div>
                <?php $i++; ?>
                @endforeach
                @else <div class="row" style="margin-top:1%;">
                                <div class="alert alert-danger col">
                                {{$message}} 
                                </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

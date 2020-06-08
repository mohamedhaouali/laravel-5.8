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
                    <h3>Formulaire de recherche</h3>
                    <hr>
                    @include('nav')
                    </div>
                    <form method="get" action="{{route('SearcheCategorieAction')}}">
                        <div class="row" style="margin-top:1%;">
                        <div class="col-6">
                                    <input type="text" class="form-control" name="libelle" placeholder="Libelle">
                               </div>
                        </div>
                       
                        
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <button type="submit" class="btn btn-success">Rechercher</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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

                    @if (count($errors))
                        <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="dropdown">
                    <h3>Formulaire d'Ajout</h3>
                    <hr>
                    @include('nav')
                    </div>
                    <form method="post" action="{{route('AddClientAction')}}">
                    {{csrf_field()}}
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <select name="ville" class="form-control">
                                    <option value="sfax">Sfax</option>
                                    <option value="tunis">Tunis</option>
                                    <option value="benarous">Ben arouss</option>
                                    <option value="manouba">Manouba</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="cp" placeholder="Code postal">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <input type="text" class="form-control" name="tel" placeholder="Téléphone">
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

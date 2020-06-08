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
                    <h3>Formulaire de Modification: <u><span style="color:red;">{{$client->nom." ".$client->prenom}}</span></u></h3>
                    <hr>
                    @include('nav')
                    <form method="get" action="{{route('EditClientAction',['id'=>$client->_id])}}">
                    {{csrf_field()}}
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <input type="text" class="form-control" name="nom" value="{{$client->nom}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="prenom" value="{{$client->prenom}}">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <select name="ville" class="form-control">
                                    <option @if($client->ville == "sfax") selected @endif value="sfax">Sfax</option>
                                    <option @if($client->ville == "tunis") selected @endif value="tunis">Tunis</option>
                                    <option @if($client->ville == "benarous") selected @endif value="benarous">Ben arouss</option>
                                    <option @if($client->ville == "manouba") selected @endif value="manouba">Manouba</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="cp" value="{{$client->cp}}">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <input type="text" class="form-control" name="tel" value="{{$client->tel}}">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

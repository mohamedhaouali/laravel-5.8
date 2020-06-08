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
                    <h3>Liste des Commandes</h3>
                    <hr>
                 @include('nav')
                    <table class="table" style="margin-top:1%;">
                    <thead>
                    <tr>
                    <th>Client</th>
                    <th>Caissier</th>
                    <th>Total</th>
                    <th>Action</th>           
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $c)
                    <tr>
                    <td>{{App\Client::find($c->client)->nom}}</td>
                    <td>{{App\User::find($c->caissier)->name}}</td>
                    <td>{{$c->total}}</td>
                    <td><a href="pdf/{{$c->_id}}"><input type="submit" class="btn btn-primary" value="Imprimer" /></a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$all->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <h3>Liste des clients</h3>
                    <hr>
                   @include('nav')
                    <table class="table" style="margin-top:1%;">
                    <thead>
                    <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ville</th>
                    <th>Code Postal</th>
                    <th>Téléphone</th>
                    <th>Action</th>           
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $c)
                    <tr>
                    <td>{{$c->nom}}</td>
                    <td>{{$c->prenom}}</td>
                    <td>{{$c->ville}}</td>
                    <td>{{$c->cp}}</td>
                    <td>{{$c->tel}}</td> 
                    
                    <td><a href="EditClientForm/{{$c->_id}}"><input type="submit" class="btn btn-success" value="Edit" /> </a>
                    <a href="supprimer/{{$c->_id}}"><input onclick="return confirm('voulez vous vraiment supprimer ce client?')" type="submit" class="btn btn-danger" value="Supprimer" /> </a>
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

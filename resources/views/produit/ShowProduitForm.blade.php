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
                    <h3>Liste des produits</h3>
                    <hr>
                 @include('nav')
                    <table class="table" style="margin-top:1%;">
                    <thead>
                    <tr>
                    <th>Libelle</th>
                    <th>Categorie</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>           
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pro as $p)
                    <tr>
                    <td>{{$p->libelle}}</td>
                    <td>{{App\Categorie::find($p->cat)->libelle}}</td>
                    <td>{{$p->pu}}</td>
                    <td>{{$p->qte}}</td>
                    <td>{{$p->desc}}</td> 
                    <td><img src="{{asset('images_produits')}}/{{$p->image}}" width="100px"></td> 
                    <td><a href="{{asset('images_produits')}}/{{$p->image}}" download="{{$p->image}}">Devis</a></td>
                    <td><a href="EditProduitForm/{{$p->_id}}"><input style="width:15px !impotant;" type="submit" class="btn btn-primary" value="Edit" /> </a>
                    <a href="supprimerProduit/{{$p->_id}}"><input style="width:15px !impotant;" onclick="return confirm('voulez vous vraiment supprimer ce produit?')" type="submit" class="btn btn-danger" value="Supprimer" /> </a>
                    <a href="/add/{{$p->_id}}"><input style="width:15px !impotant;" type="submit" class="btn btn-success" value="Ajouter au panier" /> </a>
                    <a href="/cart"><input style="width:15px !impotant;" type="submit" class="btn btn-success" value="Afficher" /> </a>
                    </td>   
                        
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$pro->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

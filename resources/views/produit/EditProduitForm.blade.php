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
                    <h3>Formulaire de modification</h3>
                    <hr>
                    @include('nav')
                    </div>
                    
                    <center><img src="{{asset('images_produits')}}/{{$pro->image}}" width="150px" title="{{$pro->desc}}"></center>
                   
                    
                    <form method="post" action="{{route('EditProduitAction',['id'=>$pro->_id])}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                
                                    <input type="text" class="form-control" name="libelle" placeholder="Libelle" value="{{$pro->libelle}}">
                                </div>
                                <div class="col">
                                    <select name="cat" class="form-control">
                                    @foreach($cat as $c)
                                    <option @if($pro->cat == $c->_id ) selected @endif value="{{$c->_id}}">{{$c->libelle}}</option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                <input type="text" class="form-control" name="pu" placeholder="Prix Unitaire" value="{{$pro->pu}}">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="qte" placeholder="Quantité" value="{{$pro->qte}}">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <input type="text" class="form-control" name="desc" placeholder="Description" value="{{$pro->desc}}">
                                </div>

                                <div class="col">
                                   <input type="file" class="form-control" name="image" placeholder="Description" value="{{$pro}}">
                                </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                   <button type="submit" class="btn btn-success">Modifier</button>
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

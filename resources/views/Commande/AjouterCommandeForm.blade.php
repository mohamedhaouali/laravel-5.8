@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
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
                    <form method="post" action="{{route('AddCommandeAction')}}">
                    {{csrf_field()}}
                        <div class="row" style="margin-top:1%;">
                                <div class="col">
                                    <select name="client" class="form-control">
                                    
                                    @foreach($client as $c)
                                    <option value="{{$c->_id}}">{{$c->nom}} {{$c->prenom}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nomutilisateur" disabled value="{{Auth::user()->name}}">
                                </div>
                        </div>
                        
                        <div class="row" style="margin-top:1%;" id="lignecommande">
                                <div class="col">
                                    <select name="produit[]" class="form-control">
                                    <option>Nom produits</option>
                                    @foreach($pro as $p)
                                    <option value="{{$p->_id}}">{{$p->libelle}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="pu" disabled name="pu[]" placeholder="Prix Unitaire">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="qte[]" min="1" value="1">
                                </div>
                                <div class="col">
                                    <a onClick="duplicer()" >ligne+</a><a onClick="supprimer(this)"> ligne-</a>
                                </div>
                        </div>
                        <div id="nouveaulignecommande">
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
<script type="text/javascript">
function supprimer(x){
  console.log(x.parentElement.parentElement);
  var element=x.parentElement.parentElement;
  element.remove();
}

function duplicer(){
    clone = document.getElementById("lignecommande").cloneNode(true);
document.getElementById("nouveaulignecommande").appendChild (clone);
}




let getHttpRequest = function () {
    let httpRequest = false;
  
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
      httpRequest = new XMLHttpRequest();
      if (httpRequest.overrideMimeType) {
        httpRequest.overrideMimeType('text/xml');
      }
    }
    else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {}
      }
    }
  
    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance XMLHTTP');
      return false;
    }
  
    return httpRequest;
  }

function list_prix(str) {
  var xhttp;
  let httpRequest= getHttpRequest();
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let results=this.responseText;
    	document.getElementById("pu").value = results;
    
    }
  };
  xhttp.open("GET", "http://127.0.0.1:8000/prixunitaire/"+str, true);
  xhttp.send(); 
  
}
</script>

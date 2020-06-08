<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">   
            table{    border:1px solid #DCDCDC; margin-top:1%; margin-left:3%; width:95%;  border-collapse:collapse;  }  
            td, th{    border:0.5px solid #DCDCDC;   }  
            thead{ background-color: #e5e5ff; }
    </style>
</head>
<body>
<span style="margin-left:2%"><u>Réference Facture:</u> <br>{{$commande->_id}}</span>
<div style="margin-top: -5%;"><center><img src="{{asset('images')}}/lamborghini.png" width="100px" ></center></div>
<div style="margin-left:2%; display:inline-block;">
        <div style="float : left; width : 200px">
                <h3>A:</h3>
                <b>Nom:</b> {{$client->nom}}<br>
                <b>Prénom:</b> {{$client->prenom}}<br>
                <b>Téléphone:</b> {{$client->tel}}
        </div>
        <div style=" float : left; margin-left:45%">
                <BR><BR><BR>
                <b>Ville:</b> {{$client->ville}}<br>
                <b>Code Postal:</b> {{$client->cp}}<br>
        </div>
</div>

                <table class="table" style="margin-top: 15%;">
                            <thead>
                                <tr>
                                    <th><center>Produit</center></th>
                                    <th><center>Prix Unitaire</center></th>
                                    <th><center>Quantité</center></th>
                                    <th><center>Total Ligne</center></th>           
                                </tr>
                            </thead>
                            <tbody>
                                
                     @foreach($details as $detail)
                <tr>
                        <td><center>{{App\Produit::find($detail->produit)->libelle}}</center></td>
                        <td><center>{{$detail->pu}}</center></td>
                        <td><center>{{$detail->qte}}</center></td>
                        <td><center><?php $totalligne = intval($detail->pu) * intval($detail->qte); echo $totalligne; ?></center></td>
                </tr>
                     @endforeach
                </table>
<div style="margin-left:70.4%; border:0.3px solid #DCDCDC; width:21.9%;  border-collapse:collapse;"><center> Total: {{$commande->total}}</center></div>
<div style="margin-left:70.4%; border:0.3px solid #DCDCDC; width:21.9%;  border-collapse:collapse;"><center> TVA: 13%</center></div>
<div style="margin-left:70.4%; border:0.3px solid #DCDCDC; width:21.9%;  border-collapse:collapse;"><center> TTC: {{$commande->total * 1.13}}</center></div>
</body>
</html>

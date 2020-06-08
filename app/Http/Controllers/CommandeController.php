<?php

namespace App\Http\Controllers;

use App\Commande;
use App\DeatilsCommande;
use Auth;
use Cart;
use App\Produit;
use App\Client;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        $pro = Produit::all();

        return view('Commande/AjouterCommandeForm',compact('pro','client'));
    }

    public function prix($id){
        $prix = Produit::find($id)->pu;
        return $prix;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pro = Produit::where('_id', $id)->firstOrFail();
        Cart::add([
            'id' =>$pro->_id,
            'name' => $pro->libelle,
            'price' => 210,
            'quantity' => 2
        ]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->client;
        $user = Auth::user()->id;
        $tab = count($request->produit);
        $prixunitaire = [];
        $total = 0;
        for ($i=0; $i<$tab;$i++){
            $prixunitaire[$i] =  Produit::find($request->produit[$i])->pu;
        }
        for ($j=0; $j<$tab;$j++){
            $total = $total + (intval($prixunitaire[$j]) * intval($request->qte[$j]));
        }
        $commande = new Commande;
        $commande->client = $client;
        $commande->total = $total;
        $commande->caissier = $user;
        $commande->save();
        $identifient = $commande->_id;
        for ($k=0; $k<$tab;$k++){
            $detail = new DeatilsCommande;
            $detail->numcommande = $identifient;
            $detail->produit = $request->produit[$k];
            $detail->pu = $prixunitaire[$k];
            $detail->qte = $request->qte[$k];
            $detail->save();
        }
        
        return redirect()->route('ShowCommande');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $all = Commande::paginate(5);
        return view('Commande/listeCommande')->with('all',$all);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}

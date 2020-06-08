<?php

namespace App\Http\Controllers;
use PDF;
use App\Commande;
use App\Client;
use App\DeatilsCommande;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function downloadPDF($id)
    {
        $commande = Commande::find($id);
        $client = Client::find($commande->client);
        $details = DeatilsCommande::where('numcommande', $id)->get();
        $pdf = PDF::loadView('Commande/pdfView', compact('commande','details','client'));
        return $pdf->download('commande_details.pdf');
    }

    public function statistiques(){
        for ($i=1; $i<=12;$i++){
            $commandes_count[$i]=0;
            foreach (Commande::select('created_at')->get() as $p){
                if((int)($p->created_at)->format('m') ==$i){
                    $commandes_count[$i] =$commandes_count[$i]+1;
                    //echo 'ok<br>';
                }
            }
        }
        return view('statistiques',compact('commandes_count'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function AddClientForm(){
        return view('client/AddClientForm');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddClientAction(Request $request)
    {
        request()->validate(['nom'=>'required|max:20|min:3','prenom'=>'required|max:20|min:3','tel'=>'unique:clients']);
        Client::create($request->all());
        return redirect()->route('ShowClients')->with('status','client ajouter avec succées');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowClients()
    {
        $clts=Client::OrderBy('created_at','DESC')->paginate(4);
        return view('client/ShowClients')->with('all',$clts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditClientAction($id,Request $request)
    {

        $client = Client::where('_id', $id)->firstOrFail();
        $client->update($request->all());
  return redirect()->route('ShowClients')->with('status','modification términer avec succées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return back()->with('status','suppression términer avec succées');
    }

    public function EditClientForm($id)
    {$client = Client::where('_id', $id)->firstOrFail();
        return view('client/EditClient')->with('client',$client);
    }

    public function searchClientForm(){
        $v = Client::distinct()->get(['ville']);
      $taille = count($v);
        return view('client/SearchClienForm')->with('ville',$v);
    }

    public function SearcheClientAction(Request $request){
       /* $client = Client::where([['nom','like','%'.$request->nom.'%'],['ville',$request->ville]])->paginate(5);
        */
        $client = Client::where('nom','like','%'.$request->nom.'%')
        ->orWhere('ville','=',$request->ville)
        ->paginate(5);
        return view('client/ResultSearchClient')->with('client',$client);
    }

    public function ReadAPIClients(){
        $url='http://localhost/laravel1/public/api/clients';
        $data= file_get_contents($url);
        // compteur des clients
        $data=json_decode($data,true);
        $total=count($data);
        echo "<h2>j'ai ".count($data)." Clients</h2>";
       // echo "J'ai ".$total. "  clients";
        echo "<table border='1'>";
        echo "<tr>
         <td>Nom</td>
         <td>PRENOM</td>
</tr>";
        foreach ($data as $k=>$v){
            echo "<tr><td>".$v['nom']."</td><td>".$v['nom']."</td></tr>";
        }
        echo "</table>";
    }

}

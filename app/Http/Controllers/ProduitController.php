<?php

namespace App\Http\Controllers;
use App\Produit;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    public function AddProduitForm(){
        $cat = Categorie::all();
        return view('produit/AddProduitForm')->with('all',$cat);
    }

    public function AddProduitAction(Request $request){
        $image="";
       if ($request->hasFile('image')) {
           $image= rand(1, 10000).'_'.$request->file('image')->getClientOriginalName();
           $request->file('image')->move("images_produits", $image);
       }
       $produit = new Produit();
       $produit->libelle=$request->libelle;
       $produit->image=$image;
       $produit->qte=$request->qte;
       $produit->pu=$request->pu;
       $produit->desc=$request->desc;
       $produit->cat=$request->cat;
       $produit->save();
        $pro=Produit::OrderBy('created_at','DESC')->paginate(5);
        return redirect()->route('ShowProduit')->with('status','Catégorie ajouter avec succées');

    }

    public function ShowProduit()
    {
        $pro=Produit::OrderBy('created_at','DESC')->paginate(4);
        $cat = Categorie::all();
        return view('produit/ShowProduitForm', compact('pro','cat'));
    }

    public function destroy($id)
    {
        $image='images_produits/'.Produit::find($id)->image;
        //dd($image);
        File::delete($image);
        Produit::destroy($id);
        return back()->with('status','suppression términer avec succées');
    }

    public function EditProduitForm($id)
    { 
        $pro = Produit::where('_id', $id)->firstOrFail();
        $cat = Categorie::all();
        return view('produit/EditProduitForm',compact('pro','cat'));
    }

    public function EditProduitAction($id,Request $request)
    {
        $produit=Produit::find($id);
        $image_old=$produit->image;
        $image_new="";
        if ($request->hasFile('image')) {
            File::delete('images_produits/'.$image_old);
            $image_new= rand(1, 1000000) . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move("images_produits", $image_new);
        }
        if($image_new!=""){
            $produit->image= $image_new;
        }else{
            $produit->image= $image_old;
        }
        
        $produit->libelle=$request->libelle;
        $produit->cat=$request->cat;
        $produit->qte=$request->qte;
        $produit->pu=$request->pu;
        $produit->save();
        return redirect()->route('ShowProduit')->with('status','Modification términer avec succées');
    }
}

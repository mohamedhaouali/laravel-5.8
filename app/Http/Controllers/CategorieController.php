<?php

namespace App\Http\Controllers;
use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function AddCategorieForm(){
        return view('categorie/AddCategoriesForm');
    }

    public function AddCategorieAction(Request $request){
       /* $liste = Categorie::where('libelle',$request->libelle)->get();
        if ($liste->isEmpty()){
            
        request()->validate(['libelle'=>'required']);
        Categorie::create($request->all());
        return redirect()->route('ShowCategories')->with('status','Catégorie ajouter avec succées');
    }
    else {
        return redirect()->route('AddCategorieForm')->with('status','Catégorie déjà existe'); }*/

        request()->validate(['libelle'=>'required|unique:categories|max:20|min:3',]);
        Categorie::create($request->all());
        return redirect()->route('ShowCategories')->with('status','Catégorie ajouter avec succées');

    
}

    public function ShowCategories()
    {
        $cat=Categorie::OrderBy('created_at','DESC')->paginate(4);
        return view('categorie/ShowCategorie')->with('all',$cat);
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        return back()->with('status','suppression términer avec succées');
    }

    public function EditCategorieForm($id)
    { 
        $cat = Categorie::where('_id', $id)->firstOrFail();
        return view('categorie/EditCategorieForm')->with('cat',$cat);
    }

    public function EditcatAction($id,Request $request)
    {
        
        $cat = Categorie::where('_id', $id)->firstOrFail();
        $cat->update($request->all());
        return redirect()->route('ShowCategories')->with('status','Modification términer avec succées');
    }

    public function searchCategorieForm(){
        return view('categorie/SearchCategoriForm');
    }

    public function SearcheCategorieAction(Request $request){
       /* $client = Client::where([['nom','like','%'.$request->nom.'%'],['ville',$request->ville]])->paginate(5); 
        */
        $categorie = Categorie::where('libelle','like','%'.$request->libelle.'%')->paginate(5);
        return view('categorie/ResultSearchCategorie')->with('categorie',$categorie);
    }
}

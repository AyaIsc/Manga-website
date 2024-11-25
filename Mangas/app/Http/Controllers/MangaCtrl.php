<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Serie;

use DateTime;

class MangaCtrl extends Controller
{
    public function getMangaCtrl()
    {
        $mangas = Manga::getManga();
        $arrayMangas = []; 
        $arrayPerso = [];

        foreach ($mangas as $manga) {
            $informations = [];

            $allId = $manga->id;
            $persos = Manga::getallPerso($allId);

            $arrayPerso[$manga->id] = $persos;

            foreach ($manga as $key => $value) {
                if ($key == "date_premiere_parution") {
                    $date = new DateTime($value);
                    $informations["date_premiere_parution"] = $date->format('d/m/Y');
                    
                } else {
                    $informations[$key] = $value;
                }
            }
            $arrayMangas[] = $informations;
        }
        return view("home", compact("arrayMangas", "arrayPerso"));
    }



        public function createSerie(Request $request)
    {       
        $request->validate([
            'titre' => 'required|string|max:100',
            'auteur' => 'required|string|max:100',
            'nombre_volumes' => 'required|integer|min:1',
            'date_premiere_parution' => 'required|date',
            'serie_finie' => 'nullable|boolean',
            'couverture' => 'required|string|max:100',
        ]);
    
        $serie = new Serie();
        $serie->titre = $request->input('titre');
        $serie->auteur = $request->input('auteur');
        $serie->nombre_volumes = $request->input('nombre_volumes');
        $serie->date_premiere_parution = $request->input('date_premiere_parution');
        $serie->couverture = $request->input('couverture');
        $serie->serie_finie = $request->input('serie_finie') ?? false; // If the checkbox is not checked, the default value is false.
        $serie->save();
    
        $successMessage = 'La série "' . $request->input('titre') . '" a été enregistrée avec succès.';
        Session::flash('success', $successMessage);

        // Redirect back to the same page with the success message
        return redirect()->back();
    }

    public function getCharactersBySeries(Request $request, $id)
    {
        $characters = Manga::getPersonnagesAPI($id);

        return response()->json($characters);
    }
    
    
}

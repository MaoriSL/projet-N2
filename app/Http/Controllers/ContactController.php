<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required',
        ]);

        // Traiter les données du formulaire (par exemple, les enregistrer dans une base de données)

        // Renvoyer la vue de confirmation avec les données du formulaire
        return view('contact-confirm', $validatedData);
    }
}

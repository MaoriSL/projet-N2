<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'value' => 'required|integer|min:0|max:5'
        ]);
        $note = Note::where([
            ['user_id', '=', Auth::id()],
            ['scene_id', '=', $id]
        ])->first();

        if($note){
            $note->delete();
        }
        $note = new Note();
        $note->user_id = Auth::id();
        $note->scene_id = $id;
        $note->value = $validatedData['value'];

        $note->save();
        return redirect()->route('liste.show', ['id' => $id]);
    }
}

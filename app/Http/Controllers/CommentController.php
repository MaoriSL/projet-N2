<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($id){
        $scene = Scene::find($id);

        if(!$scene){
            return redirect()->route('liste.show')->with('error', 'Scene not found');
        }
        return view('comment.create', ['scene' => $scene]);
    }

    public function edit($id){
        $comment = Comment::find($id);
        return view('comment.edit', ['comment' => $comment]);
    }

    public function store(Request $request){
        $request->validate([
            'titre' => 'required|max:255',
            'text' => 'required',
            'auteur_id' => 'required|exists:users,id',
            'scene_id' => 'required|exists:scenes,id',
        ]);

        Comment::create([
            'titre' => $request->input('titre'),
            'text' => $request->input('text'),
            'auteur_id' => $request->input('auteur_id'),
            'scene_id' => $request->input('scene_id'),
        ]);

        return redirect()->route('liste.show', ['id' => $request->input('scene_id')]);
    }

    public function update(Request $request, $id){
        $comment = Comment::find($id);

        $this->validate($request, [
            'titre' => 'required|max:255',
            'text' => 'required',
        ]);

        $comment->titre = $request->titre;
        $comment->text = $request->text;

        $comment->save();

        return redirect()->route('liste.show', ['id' => $comment->scene_id])
            ->with('success', 'Commentaire mis à jour avec succès');
    }

    public function destroy(Request $request, int $id)
    {
        $comment = Comment::find($id);
        $sceneId = $comment->scene_id;
        $comment->delete();
        if ($request->delete == 'valide') {

            return back()->with('success', 'Commentaire supprimé avec succès');
        }

        return back()->with('error', 'Commentaire non supprimé');
    }
}

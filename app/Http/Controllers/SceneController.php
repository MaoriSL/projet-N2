<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SceneController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $cat = $request->input('cat', 'All');

        switch ($filter) {
            case 'recent':
                $scenes = Scene::orderBy('created_at', 'desc')->take(5)->get();
                break;
            case 'note':
                $scenes = Scene::select('scenes.*')
                    ->leftJoin('notes', 'scenes.id', '=', 'notes.scene_id')
                    ->groupBy('scenes.id')
                    ->orderByRaw('AVG(notes.value) DESC')
                    ->take(5)
                    ->get();
                break;
            case 'team':
                $scenes = Scene::where('equipe', $cat)->get();
                break;
            default:
                $scenes = Scene::all();
                break;
        }

        $teams = Scene::select('equipe')->distinct()->get();

        return view('liste', ['scenes' => $scenes, 'teams' => $teams, 'cat' => $cat]);
    }

    public function recentScenes()
    {
        $scenes = Scene::orderBy('created_at', 'desc')->take(5)->get(['nom', 'equipe', 'created_at', 'vignette_link']);
        return view('liste', compact('scenes'));
    }

    public function topRatedScenes()
    {
        $scenes = Scene::with('notes')
            ->get()
            ->sortByDesc(function ($scene) {
                return $scene->notes->avg('pivot.value');
            })
            ->take(5)
            ->values();

        return view('liste', compact('scenes'));
    }

    public function show($id)
    {
        $scenes = Scene::findOrFail($id);
        $noteMoy = Note::where('scene_id', $id)->avg('value');
        $comments = $scenes->comments()->orderBy('created_at', 'desc')->get();
        if(Auth::check()){
            $isFavorite = Auth::user()->favorites()->where('scene_id', $id)->exists();
            return view('show', ['scenes' => $scenes, 'noteMoy' => $noteMoy, 'comments' => $comments, 'isFavorite' => $isFavorite]);
        }
        return view('show', ['scenes' => $scenes, 'noteMoy' => $noteMoy, 'comments' => $comments]);
    }
    public function removeFavoris($id){
        $user = Auth::user();
        $user->favorites()->detach($id);

        return back();
    }
    public function addFavoris($id){
        $user = Auth::user();
        $user->favorites()->attach($id);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index()
    {
        $scenes = Scene::all(['nom', 'equipe', 'created_at', 'vignette_link']);
        return view('scenes.index', compact('scenes'));
    }

    public function filterByTeam($team)
    {
        $scenes = Scene::where('equipe', $team)->get(['nom', 'equipe', 'created_at', 'vignette_link']);
        return view('scenes.index', compact('scenes'));
    }

    public function recentScenes()
    {
        $scenes = Scene::orderBy('created_at', 'desc')->take(5)->get(['nom', 'equipe', 'created_at', 'vignette_link']);
        return view('scenes.index', compact('scenes'));
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

        return view('scenes.index', compact('scenes'));
    }
}

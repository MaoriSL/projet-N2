<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SceneController extends Controller
{
    public function index(Request $request)
    {
        $cat = $request->input('cat', 'All');
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $scenes = Scene::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $scenes = Scene::where('equipe', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $scenes = Scene::all();
                Cookie::expire('cat');
            } else {
                $scenes = Scene::where('equipe', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $teams = $this->getTeams();
        return view('liste', ['scenes' => $scenes, 'teams' => $teams, 'cat' => $cat]);
    }

    public function getTeams()
    {
        $teams = Scene::select('equipe')->distinct()->get();
        return $teams;
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('profile')->with('success', 'Avatar updated successfully');
    }
    public function deleteAvatar()
    {
        $user = Auth::user();

        if ($user->avatar != null && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = null;

        $user->save();

        return back()->with('success', 'Avatar supprimé avec succès');
    }

}

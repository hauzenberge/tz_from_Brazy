<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function store($user_id, Request $request)
    {
        $user = User::find($user_id);

        $avatar_path = $request->file('avatar')->store('avatars', 'public', $request->file('avatar')->getClientOriginalName());
    
        if ($user->avatar != null ) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $avatar_path;
        $user->save();


        return redirect()->back()->with('success', 'Avatar uploaded successfully!');
    }
}

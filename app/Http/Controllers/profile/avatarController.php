<?php

namespace App\Http\Controllers\profile;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;


class avatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){

        $path = $request->File('avatar')->store('avatars');
        auth()->user()->update(['avatar'=>storage_path('app')."/$path"]);
        // dd(auth()->user());
        return redirect(route('profile.edit'))->with('message', 'updated'); 
        
    }
}

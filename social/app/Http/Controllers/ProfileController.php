<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    public function getProfile($username){
        $user = User::where('username', $username)->first();
        
        if (!$user) {
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();

        return view('profile.index', [
            'user' => $user,
            'statuses' => $statuses,
            'authUserIsFriend' => Auth::user()->isFriendWith($user)
        ]);
    }

    public function getEdit(){
        return view('profile.edit');
    }

    public function postEdit(Request $request){
        $this->validate($request, [
            'first_name' =>'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'city' => 'alpha|max:20',
            'age' => 'max:3'
        ]);

        Auth::user()->update([
            'first_name' =>$request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'city' => $request->input('city'),
            'age' => $request->input('age')
        ]);

        return redirect()
            ->route('profile.edit')
            ->with('info', 'Профиль успешно обновлён');
    }

    public function postUploadAvatar(Request $request, $username){
        $user = User::where('username', $username)->first();

        if (! Auth::user()->id === $user->id) {
            return redirect()->route('home');
        }

        if ($request->hasFile('avatar')) {

            $user->clearAvatars($user->id);

            $avatar = $request->file('avatar');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(100,100)
                ->save(public_path($user->getAvatarsPath($user->id) ) . $filename );
            
            # запись в бд
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return redirect()->back();
        }
        return redirect()->back();
    }
}

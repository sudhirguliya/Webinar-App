<?php

namespace App\Http\Services;

use Storage;
use Hash;

class UserService
{

    /**
     * @param $request
     * @param $user
     */
    public function uploadAvatar($request, $user)
    {
        $fileName = str_random(30);
        $extension = $request->avatar->extension();
        $fullFileName = "{$fileName}.{$extension}";

        if ($request->avatar->storeAs('public/avatars', $fullFileName)) {
            $user->avatar = $fullFileName;
        }
    }

    /**
     * @param $user
     */
    public function deleteCurrentAvatar($user)
    {
        $currentAvatar = $user->avatar;

        if($currentAvatar) {
            $file = "public/avatars/{$currentAvatar}";

            if(Storage::exists($file)) {
                Storage::delete($file);
            }
        }
    }

    /**
     * @param $request
     * @param $user
     */
    public function saveUser($request, $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        /*$password = $request->password;
        $user->password = $hashedPassword = Hash::make($password);
        echo $hashedPassword;*/
        //$user->birth_date = $request->birth_date;
        $user->save();
    }

}
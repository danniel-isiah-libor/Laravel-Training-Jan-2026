<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function getGrade(Request $request)
    {
        $grade = $request->grade ?? 75; // default grade if not provided

        return view('grade', ['grade' => $grade]);
    }

    public function getProfile(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;

        $user = User::getData(); // perform query...

        if (empty($name) && empty($email) && empty($username)) {
            $name = $user->fullName;
            $email = $user->email;
            $username = $user->userName;
            $render = $user->render;
        }



        // return 'Name: ' . $name . '<br> Email: ' . $email . '<br> Username: ' . $username;

        return view('user-profile', [
            'fullName' => $name,
            'email' => $email,
            'userName' => $username,
            'render' => $render,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email:dns,rfc',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'string',
                'confirmed',
                Password::min(8)
                    ->max(12)
                    ->required()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
                    ->uncompromised()
            ],

        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        dd($request);
    }
}

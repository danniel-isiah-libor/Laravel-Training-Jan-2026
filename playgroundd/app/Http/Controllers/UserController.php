<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthenticateRequest;
use App\Http\Requests\UserStoreRequest;
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

    public function store(UserStoreRequest $request)
    {
        $validatedForm = $request->validated();

        dd($validatedForm);
    }

    public function authenticate(UserAuthenticateRequest $request)
    {
        $validatedForm = $request->validated();

        dd($validatedForm);
    }
}

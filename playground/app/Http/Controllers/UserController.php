<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function getGrade(Request $request)
    {
        $score = $request->score;

        $output = '';

        if ($score < 75) {
            $output = 'Failed';
        } else if ($score >= 75 && $score < 80) {
            $output = 'Passed';
        } else if ($score >= 80 && $score < 95) {
            $output = 'Good';
        } else {
            $output = 'Excellent';
        }

        return view('get-grade', ['grade' => $output]);
    }

    public function getProfile(Request $request)
    {
        $fullName = $request->fullName;
        $email = $request->email;
        $userName = $request->userName;

        if (empty($fullName) && empty($email) && empty($userName)) {
            $user = User::getData(); // perform query....

            $fullName = $user->fullName;
            $email = $user->email;
            $userName = $user->userName;
        }

        // $output = "Full Name: $fullName <br> Email: $email <br> Username: $userName";

        return view('user-profile', [
            'fullName' => $fullName,
            'email' => $email,
            'userName' => $userName,
            'render' => '<h1 style="color:red">Test</h1>',
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $validatedForm = $request->validated();

        // DB::insert("INSERT INTO users (fullName, email, userName, password) VALUES (?, ?, ?, ?)", [
        //     $validatedForm['fullName'],
        //     $validatedForm['email'],
        //     $validatedForm['userName'],
        //     bcrypt($validatedForm['password']),
        // ]);

        // option 1
        User::create($validatedForm);

        // option 2
        // $user = new User();
        // $user->name = $validatedForm['name'];
        // $user->email = $validatedForm['email'];
        // $user->userName = $validatedForm['userName'];
        // $user->password = $validatedForm['password'];
        // $user->save();

        // option 3
        // User::insert([
        //     [
        //         'name' => $validatedForm['name'],
        //         'email' => $validatedForm['email'],
        //         'userName' => $validatedForm['userName'],
        //         'password' => bcrypt($validatedForm['password']),
        //     ],
        // ]);
    }
}

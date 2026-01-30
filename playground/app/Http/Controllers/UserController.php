<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getGrade(Request $request)
    {
        $grade = $request->grade;

        if ($grade < 75) {
            return "Failed";
        } elseif ($grade >= 75 && $grade <= 80) {
            return "Passed";
        } elseif ($grade > 80 && $grade <= 95) {
            return "Good";
        } elseif ($grade > 95) {
            return "Excellent";
        }
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
}

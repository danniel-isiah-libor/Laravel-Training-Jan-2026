<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function getDetails(Request $request)
    {
        $fullName = $request->fullName;
        $email    = $request->email;
        $username = $request->username;
        // $render   = $request->render;

        $userClass = User::getData();

        if ((empty($fullName) && empty($email) && empty($username))) {
            $fullName = $userClass->fullName;
            $email    = $userClass->email;
            $username = $userClass->username;
            $render   = $userClass->render;
        }

        $output = "Full Name: $fullName<br />Email: $email<br />Username: $username";
        return view('user-profile', ['fullName' => $fullName, 'email' => $email, 'username' => $username, 'render' => $render]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => [
                'required',
                'string',
                'max:255',
            ],
            'email'    => [
                'required',
                'string',
                'email:dns,rfc',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'string',
                'confirmed',
                Password::min(8)->
                    max(12)->
                    required()->
                    letters()->
                    numbers()->
                    symbols()->
                    mixedCase()->
                    uncompromised(),
            ],
        ]);
        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;
    }
}
{
}

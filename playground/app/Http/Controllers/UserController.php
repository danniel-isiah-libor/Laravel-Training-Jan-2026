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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => [
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->required()
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
                    ->max(25)
                    ->uncompromised()
            ],
        ]);

        redirect()->route('register.show');
    }
}

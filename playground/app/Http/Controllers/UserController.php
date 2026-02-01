<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(UserStoreRequest $request)
    {
        $validatedForm = $request->validated();

        // Option 1
        $user = User::created($validatedForm);
        dd($user);
        // Option 2
        // $user           = new User();
        // $user->name     = $validatedForm['name'];
        // $user->email    = $validatedForm['email'];
        // $user->password = $validatedForm['password'];
        // $user->save();

    }
}
{
}

<?php
namespace App\Http\Controllers;

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

        return $output;
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
}
{
}

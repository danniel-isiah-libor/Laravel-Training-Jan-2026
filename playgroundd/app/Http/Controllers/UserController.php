<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
public function getGrade(Request $request)
{   
    $score = $request->score;
    $output = '';

    if ($score < 75) {
        $output = 'Failed';
    } else if ($score >= 75 && $score <= 80) {
        $output = 'Passed';
    } else if ($score >= 81 && $score <= 90) {
        $output = 'Good';
    } elseif ($score >= 91 && $score <= 100) {
        $output = 'Excellent';
    }

    return $output;
}

    public function getProfile(Request $request)
    {

        $fullName = $request->fullName; 
        $email = $request->email;       
        $userName = $request->userName; 

        $user = User::getData();

        if (empty($fullName) && empty($email) && empty($userName)) {
            $fullName = $user->fullName;
            $email = $user->email;
            $userName = $user->userName;
        }

       // return "Full Name: " . $fullName . "<br>Email: " . $email . "<br>Username: " . $userName;   

        return view('user-profile', [
            'fullName' => $fullName,
            'email' => $email,
            'userName' => $userName 
        ]);
    }



}
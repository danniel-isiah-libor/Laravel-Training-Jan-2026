<?php
namespace App\Http\Controllers;

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

        $output = "Full Name: $fullName<br />Email: $email<br />Username: $username";
        return $output;
    }
}

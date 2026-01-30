<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
public function getGrade(Request $request) {
    $grade = $request->grade;    
    
    $result = '';

    if ($grade >= 91 && $grade <= 100) {
            $result = 'EXCELLENT!';
        } else if ($grade >= 81 && $grade <= 90) {
            $result = 'GOOD!';
        } else if ($grade >= 75 && $grade <= 80) {
            $result = 'PASSED!';
        } else if ($grade >= 101) {
            $result = 'You have entered a Wrong Number';
        } else {
            $result = 'FAILED!';
        }
    return $result;
    }



public function getProfile(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;



        if (empty($fullName) && empty($email) && empty($username)){
            $user = User::getData();
            $name = $user->name;
            $email = $user->email;
            $username = $user->username; 
        }

    //    $output = "Full Name: $name <br> Email: $email <br> Username: $username <br>";

        return view('user-profile', [
            'name'=> $name,
            'email'=> $email,
            'username'=> $username,
        ]);
    }
}

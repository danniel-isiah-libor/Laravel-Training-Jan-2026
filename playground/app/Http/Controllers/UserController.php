<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function getGrade(Request $request, ?int $grade = null): void
    {
        $grade = $request->grade;

        if ($grade < 75) {
            dd('Failed');
        } elseif ($grade < 81) {
            dd('Passsed');
        } elseif ($grade < 96) {
            dd('Good');
        } else {
            dd('Excellent');
        }
    }

    public function getInfo(Request $request): View
    {
        $fullName = $request->fullname;
        $email = $request->email;
        $username = $request->username;
        if (empty($fullName) && empty($email) && empty($username)) {
            $user = User::getData();
            $fullName = $user->fullName;
            $email = $user->email;
            $username = $user->userName;
        }
        return view('user-profile', [
            'fullName' => $fullName,
            'email' => $email,
            'userName' => $username,
            'render' => '<h1 style="color: red;">Test</h1>',
        ]);
    }
}

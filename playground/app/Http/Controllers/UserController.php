<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Pest\Concerns\Retrievable;

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
    public function store(UsersStoreRequest $request)
    {
        $validatedForm = $request->validated();

        dd($validatedForm);
        //option 1
        User::create($validatedForm);


        //option 2
        // user::insert($validatedForm);
        //$user = new User();
        //$user->name = $validatedForm['name'];
        //$user = new User(); 
        //$user->email = $validatedForm['email'];
        //$user->password = $validatedForm['password'];
        //$user->save();

    }
}


//updating
//User::where('id', '=',1)->update([
//'name' => 'Updated Name',
//]);
//select *from users where id=1

//deleting
//User::where('id', '=',1)->delete();

// retrieve
//$users = User::where('id', '=', 1)->first();
//dd($users);
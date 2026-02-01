<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthenticateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function getGrade(Request $request)
    {
        $grade = $request->grade ?? 75; // default grade if not provided

        return view('grade', ['grade' => $grade]);
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

    public function store(UserStoreRequest $request)
    {
        $validatedForm = $request->validated();

        //option 1
        // auto adapt to new column
        // $user = User::create($validatedForm);
        dd($user);

        // option 2
        // $user = new User();
        // $user->name = $validatedForm['name'];
        // $user->email = $validatedForm['email'];
        // $user->save();

        // option 3
        // accepts multidimensional array
        // User::insert([
        //     'name' => $validatedForm['name'],
        //     'email' => $validatedForm['email'],
        // ]);

        // // updating
        // // User::where('id', '=', 1)->update([
        // //     'name' => 'Updated Name',
        // // ]); // select * from users where id = 1

        // // deleting
        // // User::where('id', '=', 1)->delete();

        // // User::where('id', '=', 1)->first(); // select * from users where id = 1 LIMIT 1
        // $user = User::where('id', '=', 1)->get(); // collection of multiple user model
        // dd($user);
    }

    public function authenticate(UserAuthenticateRequest $request)
    {
        $validatedForm = $request->validated();

        dd($validatedForm);
    }
}

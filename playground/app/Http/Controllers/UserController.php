<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getGrade(Request $request)
    {
        $score = $request->score;

        $output = '';

        if ($score < 75) {
            $output = 'Failed';
        } elseif ($score >= 75 && $score < 80) {
            $output = 'Passed';
        } elseif ($score >= 80 && $score < 95) {
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

    public function home()
    {
        $posts = Post::latest()->get();

        return view('home', ['posts' => $posts]);
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Auth::login($user);
        }

        return redirect()->route('home');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}

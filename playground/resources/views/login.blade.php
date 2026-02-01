<x-guest-layout title="Login Page">
    <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
        <x-slot:header>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" class="mx-auto h-10 w-auto dark:hidden" />
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company" class="mx-auto h-10 w-auto not-dark:hidden" />
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-white">Sign in
                    to your account</h2>
            </div>
        </x-slot:header>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
                @csrf
                <x-form.input-field label="Email" name="email" type="email" />
                <x-form.input-field label="Password" name="password" type="password" />

                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6
        font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2
        focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400
        dark:focus-visible:outline-indigo-500">Log
                    In</button>
            </form>
            <p class="mt-10 text-center text-sm/6 text-gray-500 dark:text-gray-400">
                Not a member?
                <a href="{{ route('register.page') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Register
                    now</a>
            </p>
        </div>
    </div>
</x-guest-layout>

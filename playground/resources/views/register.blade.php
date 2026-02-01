<<<<<<< HEAD
<x-guess-layout>
    <section class="py-6">
        <div class="max-w-md mx-auto">
            <h1 class="text-center font-bold text-4xl mb-6">Register</h1>
            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="flex flex-col">
                    <x-register-form label="Name" type="text" placeholder="Name" name="name" />

                    <x-register-form label="Email" type="email" placeholder="Email" name="email" />

                    <x-register-form label="Password" type="text" placeholder="Password" name="password" />

                    <x-register-form label="Confirm Password" type="text" placeholder="Confirm Password"
                        name="password_confirmation" btn="submit" />

                    <button
                        class="py-2 px-3 font-bold bg-violet-800 hover:bg-violet-700 text-white rounded-lg mt-3 cursor-pointer">Register
                    </button>
                </div>
                <p class="text-center">
                    Already have an account? <a href={{ route('login') }}><span
                            class="font-bold text-violet-700 underline">Login</span></a>
                </p>
            </form>
        </div>
    </section>
</x-guess-layout>
=======
<x-guest-layout title="Register Page">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <x-slot:header>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" class="mx-auto h-10 w-auto dark:hidden" />
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company" class="mx-auto h-10 w-auto not-dark:hidden" />
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-white">Register
                    to your account</h2>
            </div>
        </x-slot:header>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                @csrf

                <x-form.input-field label="Name" name="name" />

                <x-form.input-field label="Email" name="email" type="email" />

                <x-form.input-field label="Password" type="text" name="password" />

                <x-form.input-field label="Confirm Password" type="text" name="password_confirmation" />

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500 dark:text-gray-400">
                Already a member?
                <a href="#"
                    class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Login</a>
            </p>
        </div>
    </div>
</x-guest-layout>
>>>>>>> 49d2a3351118769ba4c914b03815f1ea8256cc12

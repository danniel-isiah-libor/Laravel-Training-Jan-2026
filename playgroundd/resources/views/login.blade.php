<x-guess-layout>
    <section class="py-6">
        <div class="max-w-md mx-auto">
            <h1 class="text-center font-bold text-4xl mb-6">Login</h1>
            <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-6">
                @csrf
                <div class="flex flex-col">
                    <x-register-form label="Email" type="email" placeholder="Email" name="email" />

                    <x-register-form label="Password" type="password" placeholder="Password" name="password" />

                    <button
                        class="py-2 px-3 font-bold bg-violet-800 hover:bg-violet-700 text-white rounded-lg mt-3 cursor-pointer mb-3">Login
                    </button>
                </div>
            </form>
            <div class="text-center">
                Don't have an account? <a href={{ route('register.page') }}><span
                        class="text-violet-700 font-bold underline">Register</span></a>
            </div>
        </div>
    </section>
</x-guess-layout>

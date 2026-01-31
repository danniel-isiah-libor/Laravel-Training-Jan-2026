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
                        class="py-2 px-3 font-bold bg-violet-800 hover:bg-violet-700 text-white rounded-lg mt-3 cursor-pointer">Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-guess-layout>

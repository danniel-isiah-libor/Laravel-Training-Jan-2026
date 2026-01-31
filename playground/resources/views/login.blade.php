<x-layout title="Login Page">
    <main>
        <div class="container mx-auto">
            <form class="lg:w-[30%] flex flex-col mx-auto p-5 gap-5 mt-5" method="post" action="{{ route('login.post') }}">
                {{ csrf_field() }}

                <x-forms.form-header header="Login">
                    Post your thoughts and see what others are saying.
                </x-forms.form-header>

                <div class="flex flex-col gap-5 text-sm">
                    <x-forms.input-field placeholder="Email" id="email" type="email" />
                    <x-forms.input-field placeholder="Password" id="password" type="password" />
                </div>

                <x-forms.submit-button>Login</x-forms.submit-button>

                <div class="text-center">
                    <p class="text-sm text-neutral-500">No account yet? <a href="{{ route('register.page') }}" class="text-white">Register</a></p>
            </form>
        </div>
    </main>
</x-layout>

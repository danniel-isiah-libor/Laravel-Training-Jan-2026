<x-layout title="Register Page">
    <main>
        <div class="container mx-auto">
            <form class="lg:w-[30%] flex flex-col mx-auto p-5 gap-5 mt-5" method="post">
                @csrf

                <x-forms.form-header header="Create Account">
                    Post your thoughts and see what others are saying.
                </x-forms.form-header>

                <div class="flex flex-col gap-5 text-sm">
                    <x-forms.input-field placeholder="First Name" id="first-name" />
                    <x-forms.input-field placeholder="Last Name" id="last-name" />
                    <x-forms.input-field placeholder="Email" id="email" type="email" />
                    <x-forms.input-field placeholder="Password" id="password" type="password" />
                    <x-forms.input-field placeholder="Confirm Password" id="confirm-password" type="password" />
                </div>

                <x-forms.checkbox-field id="terms-agreements">By creating an account, you agree to our <a href="#"
                        class="text-white">[Terms of Use]</a> and <a class="text-white" href="#">[Privacy
                        Policy]</a>.</x-forms.checkbox-field>

                <x-forms.submit-button>Create Account</x-forms.submit-button>

                <div class="text-center">
                    <p class="text-sm text-neutral-500">Already have an account? <a href="login" class="text-white">Login</a></p>
            </form>
        </div>
    </main>
</x-layout>

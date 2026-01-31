<x-guest-layout title="Register Page">
    <x-slot:header>
        <h1>This is a header</h1>
    </x-slot:header>
    <x-page-title title="Register Page" subtitle="Register your account now." />
    <x-input-field :firstName="$first_name" :lastName="$last_name" />
    <x-slot:footer>
        <h1>This is a footer</h1>
    </x-slot:footer>
</x-guest-layout>
